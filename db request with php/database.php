<?php

class Database {
    function __construct() {
        $dsn = 'mysql:host=localhost;dbname=SchoolDatabase';
        $user = 'root';
        $password = 'root';

        try {
            $this->db = new PDO($dsn, $user, $password);
            $this->db->exec('set names utf8');
            error_log("created DB");
        } catch(PDOException $e) {
            error_log($e->getMessage());
            throw $e;

        }
    }

    public function getAllStudents() {
        $query = $this->db->prepare('SELECT * FROM student;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            throw new exception('No student found', 404);
            exit;
        }
        return $result; 
    }
}


?>