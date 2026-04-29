<?php
class Database { 
    public $conn;

    public function __construct($config) {
        $dns= "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->conn = new PDO($dns, $config['username'], $config['password'], $options);
            echo "Database connection successful!";
        } catch (PDOException $e) {
           throw new Exception("Database connection failed: " . $e->getMessage());
        }

    }

    public function query($query) {
        try {
            $sth = $this->conn->prepare($query);
            $sth ->execute();
            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }

}
 
?>