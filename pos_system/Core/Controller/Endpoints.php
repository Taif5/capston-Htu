<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\Transaction;
use Exception;

class Endpoints extends Controller
{
        use Tests;

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true, // to provide the response status.
                "message_code" => "", // to provide message code for the front-end developer for a better error handling
                "body" => []
        );

        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));
        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }

        function transactions()
        {
                try {
                        $item = new Item;
                        $this->data['items'] = $item->get_all();
                        $transaction = new Transaction;
                        $transactions = $transaction->get_admin_transaction();


                        if (empty($transactions)) {
                                throw new \Exception('No transactions were found!');
                        }
                        $this->response_schema['body'] = $transactions;
                        $this->response_schema['message_code'] = "transactions_collected_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = $error->getMessage();
                        $this->http_code = 404;
                }


        }

              
        function transactions_create()
        {
                self::check_if_empty($this->request_body);
                try {
                        $transaction = new Transaction; 
                        $item = new Item;
                        $this->request_body["total"]=$this->request_body["quantity"]*$item->get_price($this->request_body["item_id"]);                          
                        $this->request_body["user_id"]=$_SESSION['user']['user_id'];
                        $this->request_body["price"]=$item->get_price($this->request_body["item_id"]);
                        $transaction->create($this->request_body);
                        $item->update_quantity($this->request_body["item_id"],$this->request_body["quantity"]);

                        $this->response_schema['message_code'] = "transaction_created_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "transaction_was_not_created";
                        $this->http_code = 421;
                }


               
        }

}
