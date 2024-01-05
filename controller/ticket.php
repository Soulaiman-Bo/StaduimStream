<?php

require_once "classes/SeatsValidation.php";
require_once "classes/TimeException.php";


use Carbon\Carbon;

class Ticket extends Controller
{


    protected function show()
    {
        $ticketModel = new TicketModel();
        $rows = $ticketModel->selectAllTickets();

        // var_dump($rows);
        // exit;
   
        $view = $this->getView();
        require_once $view;
    }


    public function showStatsOfSeates()
    {

        $id = $_GET['id'];

        $seates = $this->count_available_seats($id);

        if (empty($seates)) {
            http_response_code(400);
            echo json_encode([
                "message" => "Match not found"
            ]);
            exit;
        }

        http_response_code(200);
        echo json_encode([
            $seates
        ]);
    }


    public function addaction()
    {
        extract($_POST);
        $validation = new Validation();

        try {
            $validation->key('match_id')->value($_POST['match_id'])->required()->isNumber();
            $validation->key('user_id')->value($_POST['user_id'])->required()->isNumber();
            $validation->key('vip_category')->value($_POST['1'])->required()->isNumber()->between(0, 50, true)->lengthBetween(0, 3, true);
            $validation->key('premuim_category')->value($_POST['2'])->required()->isNumber()->between(0, 50, true)->lengthBetween(0, 3, true);
            $validation->key('basic_category')->value($_POST['3'])->required()->isNumber()->between(0, 50, true)->lengthBetween(0, 3, true);

            if (empty(ltrim($_POST['1'], 0)) && empty(ltrim($_POST['2'], 0))  && empty(ltrim($_POST['3'], 0))) {
                throw new InvalidInput("Number of Tickets is Required ");
            }


        } catch (Exception $e) {

            error_log("Invalid Input: " . $e->getMessage() . "\n", 3, "errors.log");
            $message = "Ticket inserted successfully!";
            http_response_code(400);
            echo json_encode([
                "message" => "Invalid Input: " . $e->getMessage(),
            ]);
            exit;
        }

        $matchId =  $validation->sanitize($_POST['match_id']);
        $userId =  $validation->sanitize($_POST['user_id']);
        $category_1 =  $validation->sanitize($_POST['1']);
        $category_2 =  $validation->sanitize($_POST['2']);
        $category_3 =  $validation->sanitize($_POST['3']);


        // check if match is with in 30 hours
        try {
            $this->isnear($matchId);
        } catch (TimeException $e) {
            error_log($e->getMessage() . "\n", 3, "errors.log");
            http_response_code(400);
            echo json_encode([
                "message" =>  $e->getMessage(),
            ]);
            exit;
        }

        // check availabel tickets
        $this->check_available_seats($matchId, $category_3, $category_2, $category_1);

        $number_Of_Tickets_Per_Category = array_combine([1, 2, 3], [$category_1, $category_2, $category_3]);

        $ticketmodel = new TicketModel();

        $insertedids = [];

        foreach ($number_Of_Tickets_Per_Category as $key => $value) {
            for ($i = 0; $i < $value; $i++) {
                
                $prefix = $matchId . $userId;
                $serialNumber = uniqid($prefix, true);

                $data = [
                    'matche' => $matchId,
                    'user' => $userId,
                    'serialnumber' =>  "$serialNumber",
                    'category' => $key
                ];

                $insertedId =  $ticketmodel->createTicket('ticket', $data);

                $insertedids[] =  $insertedId;
            }
        }

        $ticketmodel->closeConnection();

        if ($insertedId) {
            $message = "Ticket inserted successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "Id" => $insertedids
            ]);
        }
    }

    //  =============================================

    public function isnear($matchId)
    {

        $matchModel = new MatchesModel();
        $match =  $matchModel->selectSingleRecords('matche', "*", "id = $matchId");
        $date =  $match['date'];

        $match_day_time = Carbon::parse($date);
        $currentDate = Carbon::now();
        $hoursDifference =  $currentDate->diffInHours($match_day_time) * ($match_day_time->isPast() ? -1 : 1);

        if ($hoursDifference < 30) {
            throw new TimeException("Sorry, tickets cannot be purchased within $hoursDifference  hours of the event");
        }
        return true;
    }

    private function check_available_seats($matchId, $category_3, $category_2, $category_1)
    {
        try {
            $seats = $this->count_available_seats($matchId);

            $this->checkSeatAvailability('Basic', $seats['basic'], $seats['reserved_basic'], $category_3);
            $this->checkSeatAvailability('Premium', $seats['premium'], $seats['reserved_premium'], $category_2);
            $this->checkSeatAvailability('Vip', $seats['vip'], $seats['reserved_vip'], $category_1);
            
        } catch (SeatsValidation $e) {
            $this->handleValidationException($e);
        }
    }

    private function checkSeatAvailability($category, $totalSeats, $reservedSeats, $requestedSeats)
    {
        if (($reservedSeats + $requestedSeats) > $totalSeats) {
            throw new SeatsValidation([
                "category" => $category,
                "seats_left" => $totalSeats - $reservedSeats,
            ], "");
        }
    }

    private function handleValidationException(SeatsValidation $e)
    {
        error_log($e->getCustomMessage() . "\n", 3, "errors.log");
        http_response_code(200);
        echo json_encode([
            "message" =>  $e->getCustomMessage(),
        ]);
        exit;
    }

    public function count_available_seats($matchId)
    {
        $ticketModel = new TicketModel();

        $stadiumSeats = $ticketModel->select_stadium_based_on_match_id($matchId);

        if (empty($stadiumSeats)) {
            http_response_code(400);
            echo json_encode([
                "message" => "Match not found"
            ]);
            exit;
        }

        $reservedSeats = $ticketModel->custom_select_query('ticket', "category, count(category) AS count",  "matche = $matchId", "category");
        $ticketModel->closeConnection();

        return [
            "Match_id" => $stadiumSeats[0]['Match_id'],
            "basic" => $stadiumSeats[0]['basic_seats'],
            "premium" => $stadiumSeats[0]['premuim_seats'],
            "vip" => $stadiumSeats[0]['vip_seats'],
            "reserved_basic" => $this->getReservedCount($reservedSeats, 2),
            "reserved_premium" => $this->getReservedCount($reservedSeats, 1),
            "reserved_vip" => $this->getReservedCount($reservedSeats, 0),
        ];
    }

    private function getReservedCount($reservedSeats, $index)
    {
        return empty($reservedSeats) || !isset($reservedSeats[$index]) ? 0 : $reservedSeats[$index]['count'];
    }
}


// []