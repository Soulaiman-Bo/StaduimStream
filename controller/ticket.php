<?php

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
    public function show()
    {
    }

    public function addaction()
    {
        extract($_POST);
        $validation = new Validation();

        try {
            $validation->key('match_id')->value($_POST['match_id'])->required();
            $validation->key('user_id')->value($_POST['user_id'])->required();
            $validation->key('cat1')->value($_POST['1'])->required();
            $validation->key('cat2')->value($_POST['2'])->required();
            $validation->key('cat3')->value($_POST['3'])->required();
            
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

    public function check_available_tickets($matchId)
    {
        $ticketmodel = new TicketModel();
        $staduim_seates = $ticketmodel->selectRecords("stadiums", "`capacity`, `vip_seats`, `premuim_seats`, `basic_seats`");

        $ticketmodel = new TicketModel();
        $reserved_seates = $ticketmodel->customeSelectQuery(`ticket`, "category, count(category) AS count",  "matche = 1", "category");
    }
}

// []