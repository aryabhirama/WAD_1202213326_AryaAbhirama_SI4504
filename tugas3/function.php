<?php
class Database {
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->conn = new mysqli($host, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query, $params = array()) {
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            die("Error in query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        $result = $stmt->get_result();
        $rows = [];

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $stmt->close();

        return $rows;
    }

    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_fill(0, count($data), "?"));
        $params = array_values($data);

        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        return $this->query($query, $params);
    }

    public function update($table, $data, $where) {
        $set = [];
        $params = [];

        foreach ($data as $key => $value) {
            $set[] = "$key = ?";
            $params[] = $value;
        }

        $set = implode(", ", $set);
        $params[] = $where;

        $query = "UPDATE $table SET $set WHERE no = ?";

        return $this->query($query, $params);
    }

    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE no = ?";
        return $this->query($query, [$where]);
    }
}

$database = new Database("localhost:3306", "root", "", "tugas3wad");
?>
