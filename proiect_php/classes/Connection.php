<?php

class Connection
{
    protected $connection;
    private const SERVER = 'localhost';
    private const DATABASE = 'proiect_php';
    private const USER = 'root';
    private const PASSWORD = '';

    protected function connect()
    {
        $this->connection = new mysqli(
            self::SERVER,
            self::USER,
            self::PASSWORD,
            self::DATABASE
        );
    }

    protected function select($select)
    {
        $results = $this->connection->query($select);

        if ($results->num_rows > 0) {
            $data = [];
            while ($row = $results->fetch_assoc()) {
                array_push($data, $row);
            }
            return $data;
        }
        return [];
    }

    protected function delete($delete)
    {
        if ($this->connection->query($delete)) {
            return true;
        }
        return false;
    }

    protected function connectionClose()
    {
        $this->connection->close();
    }

    
}
