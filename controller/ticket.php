<?php

require_once "classes/SeatsValidation.php";

class Ticket extends Controller
{

    public function add()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }

    public function showStatsOfSeates() {

        $id = $_GET['id'];

        $seates = $this->count_available_seates( $id);

         if(empty($seates)){
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
            // $validation->key('match_id')->value($_POST['match_id'])->required();
            // $validation->key('user_id')->value($_POST['user_id'])->required();
            // $validation->key('cat1')->value($_POST['1'])->required();
            // $validation->key('cat2')->value($_POST['2'])->required();
            // $validation->key('cat3')->value($_POST['3'])->required();


        } catch (Exception $e) {
            error_log("Invalid Input: " . $e->getMessage() . "\n", 3, "errors.log");

            $message = "Ticket inserted successfully!";
            http_response_code(400);
            echo json_encode([
                "message" => "Invalid Input: " . $e->getMessage(),
            ]);
        }

        $matchId =  $validation->sanitize($_POST['match_id']);
        $userId =  $validation->sanitize($_POST['user_id']);
        $category_1 =  $validation->sanitize($_POST['1']);
        $category_2 =  $validation->sanitize($_POST['2']);
        $category_3 =  $validation->sanitize($_POST['3']);


        // check availabel tickets
        $this->check_available_seates($matchId, $category_3, $category_2, $category_1);



        $prefix = $matchId . $userId;
        $serialNumber = uniqid($prefix, true);
        $number_Of_Tickets_Per_Category = array_combine([1, 2, 3], [$category_1, $category_2, $category_3]);


        $ticketmodel = new TicketModel();

        $insertedids = [];

        foreach ($number_Of_Tickets_Per_Category as $key => $value) {
            for ($i = 0; $i < $value; $i++) {
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

    private function check_available_seates($matchId, $category_3, $category_2, $category_1)
    {
        // check if seates available 
        $seates = $this->count_available_seates($matchId);

        try {

            $basic_seates = ($seates['reserved_basic'] + $category_3) <=  $seates['basic'] ? true : throw new SeatsValidation(["category" => "Basic", "seates_left" => $seates['basic'] - $seates['reserved_basic']], "");
            $premium_seates = ($seates['reserved_premium'] + $category_2) <=  $seates['premium']  ? true : throw new SeatsValidation(["category" => "Premium", "seates_left" => $seates['premium'] - $seates['reserved_premium']], "");
            $vip_seates = ($seates['reserved_vip'] + $category_1 <=  $seates['vip'])  ? true : throw new SeatsValidation(["category" => "Vip", "seates_left" => $seates['vip'] - $seates['reserved_vip']], "");

        } catch (SeatsValidation $e) {

            error_log( $e->getCustomMessage() . "\n", 3, "errors.log");
            $message = "Ticket inserted successfully!";
            http_response_code(200);
            echo json_encode([
                "message" =>  $e->getCustomMessage(),
            ]);
            exit;
        }
    }
    
    public function count_available_seates($matcheId)
    {

        $ticketmodel = new TicketModel();

        $staduim_seates = $ticketmodel->selectstaduimBasedOnMatchId($matcheId);

        $reserved_seates = $ticketmodel->customeSelectQuery('ticket', "category, count(category) AS count",  "matche = $matcheId", "category");

        $ticketmodel->closeConnection();

        if (empty($staduim_seates)) {
            http_response_code(400);
            echo json_encode([
                "message" => "Match not found"
            ]);
            exit;
        }

        return array(
            "Match_id" => $staduim_seates[0]['Match_id'],
            "basic" => $staduim_seates[0]['basic_seats'],
            "premium" => $staduim_seates[0]['premuim_seats'],
            "vip" => $staduim_seates[0]['vip_seats'],
            "reserved_basic" => empty($reserved_seates) ? 0 :   $reserved_seates[2]['count'],
            "reserved_premium" => empty($reserved_seates) ? 0 : $reserved_seates[1]['count'],
            "reserved_vip" => empty($reserved_seates) ? 0 : $reserved_seates[0]['count'],
        );
    }

}


// []