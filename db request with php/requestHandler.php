<?php

try {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if($_POST['entity'] == 'student') {

            if($_POST['endpoint'] == 'getAll') {

                include_once('./database.php');

                $database = new Database();
                $result = $database->getAllStudents();

                echo json_encode($result); 


            } else {
                throw new Exception('Not a valid endpoint', 501);
            }

        } else {
            throw new Exception('Not a valid entity', 501);
        }

    } else {
        throw new Exception('Not a valid request method', 405);
    }

} catch(Exception $e) {
    echo json_encode(array('Message' => $e->getMessage(), 'status' => $e->getCode()));
}


?>