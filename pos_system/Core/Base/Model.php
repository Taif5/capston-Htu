<?php

namespace Core\Base;

class Model
{
    public $connection;
    protected $table;

    public function __construct()
    {
        $this->connection(); // connection is ready
        $this->relate_table();
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function get_all_items(): array
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table WHERE quantity!=0");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_all(): array
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table ");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;

    }
    public function get_admin_transaction(): array
    {
        $data = array();
        $id=$_SESSION['user']['user_id'];
        $result = $this->connection->query("SELECT * FROM $this->table  where user_id=$id  AND DATE(`created_at`) = CURDATE()");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }


    public function get_by_id($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id=?"); // prepare the sql statement
        $stmt->bind_param('i', $id); // bind the params per data type (https://www.php.net/manual/en/mysqli-stmt.bind-param.php)
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
        $stmt->close();
        // $result = $this->connection->query("SELECT * FROM $this->table WHERE id=$id");
        return $result->fetch_object();
    }


    public function top5(): array
    {
        $data = array();
        $result = $this->connection->query("select * from items order by price desc limit 5");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function total_selling()
    {
        $stmt = $this->connection->prepare("SELECT sum(total) as total FROM transactions");
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
         while ($row = $result->fetch_assoc()) {
            $total= $row['total'];
        }

        return $total;
    }


    public function update_quantity($id,$quantity)
    {
        $stmt = $this->connection->prepare("UPDATE items SET quantity=quantity-$quantity WHERE id=$id;");
        $stmt->execute(); // execute the statement on the DB
        // $result = $stmt->get_result(); // get the result of the execution
        //  while ($row = $result->fetch_assoc()) {
        //     $price= $row['price'];
        // }

        // return $true;
    }

    public function get_price($id)
    {
        $stmt = $this->connection->prepare("SELECT price FROM items WHERE id=$id");
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
         while ($row = $result->fetch_assoc()) {
            $price= $row['price'];
        }

        return $price;
    }


 
    public function delete($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE id=?"); // prepare the sql statement
        $stmt->bind_param('i', $id); // bind the params per data type
        $stmt->execute(); // execute the statement on the DB
        $result = $stmt->get_result(); // get the result of the execution
        $stmt->close();
     
        return $result;
    }

    public function create($data)
    {
        // Get dynamic keys title, contenta
        // $keys: string
        // Get dynamic values coresponds to the key '$data->title','$data->content'
        // $values: string

        $keys = '';
        $values = '';
        $data_types = '';
        $value_arr = array();

        foreach ($data as $key => $value) {

            if ($key != \array_key_last($data)) {
                $keys .= $key . ', ';
                $values .= "?, ";
            } else {
                $keys .= $key;
                $values .= "?";
            }

            switch ($key) {
                case 'id':
                case 'user_id':
                case 'item_id':
             

               
                    $data_types .= "i";
                    break;

                default:
                    $data_types .= "s";
                    break;
            }

            $value_arr[] = $value;
        }

        // $stmt = $this->connection->prepare("INSERT INTO posts (title, content, user_id) VALUES (?,?,?)");
        // $stmt->bind_param('ssi', 'test sql in.', 'testing content', '1');
        // $stmt->execute();
        // $stmt->close();

        $sql = "INSERT INTO $this->table ($keys) VALUES ($values)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param($data_types, ...$value_arr); // ...$value_arr == 'test sql in.', 'testing content', '1'
        $stmt->execute();
        $stmt->close();
    }

    public function update($data)
    {

        $set_values = '';
        $id = 0;

        foreach ($data as $key => $value) {
            if ($key == 'id') {
                $id = $value;
                continue;
            }
            if ($key != \array_key_last($data)) {
                $set_values .= "$key='$value', ";
            } else {
                $set_values .= "$key='$value'";
            }
        }
        $sql = "UPDATE $this->table 
            SET $set_values
            WHERE id=$id
        ";
        $this->connection->query($sql);
    }
    public function update_transaction($data)
    {

        $quantity=$data["quantity"];
        $total=$data["quantity"]*$data["price"];
        $set_values = '';
        $id = 0;

        foreach ($data as $key => $value) {
            if ($key == 'id') {
                $id = $value;
                continue;
            }
            if ($key != \array_key_last($data)) {
                $set_values .= "$key='$value', ";
            } else {
                $set_values .= "$key='$value'";
            }
        }
        $sql = "UPDATE `transactions` SET `quantity` = $quantity,`total`=$total WHERE `transactions`.`id` =$id;";
        $this->connection->query($sql);
    }


  

    protected function connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "php";

        // Create connection
        $this->connection = new \mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    protected function relate_table()
    {
        $table_name = \get_class($this);
        $table_name_arr = \explode('\\', $table_name);
        $class_name = $table_name_arr[\array_key_last($table_name_arr)]; // $table_name_arr[2]
        $final_clas_name = \strtolower($class_name) . "s";
        $this->table = $final_clas_name;
    }
}
