<?php

class MySQLDriver {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        // Connect to MySQL database
        $this->connect();
    }

    private function connect() {
        // Create a connection
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        // Execute a query
        $result = $this->connection->query($sql);

        // Check for errors
        if ($this->connection->error) {
            die("Query failed: " . $this->connection->error);
        }

        return $result;
    }

    public function fetchAll($result) {
        // Fetch all results as an associative array
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchRow($result) {
        // Fetch a single row as an associative array
        return $result->fetch_assoc();
    }

    public function escapeString($string) {
        // Escape a string for safe use in a query
        return $this->connection->real_escape_string($string);
    }

    public function close() {
        // Close the connection
        $this->connection->close();
    }
}

// Usage example
$driver = new MySQLDriver('localhost', 'root', 'root', 'alypay');

// Perform a query
$result = $driver->query("SELECT * FROM domain_setings");

// Fetch all rows
$rows = $driver->fetchAll($result);

die(var_dump($rows));
// Close the connection
$driver->close();