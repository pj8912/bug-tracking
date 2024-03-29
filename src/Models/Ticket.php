<?php

namespace BugTracking\Models;

class Ticket
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // public
    private $table = "tickets";

    public $ticket_name,
        $project_name, //name not id
        $ticket_type,
        $ticket_description,
        $ticket_assigned_to,
        $ticket_status,
        $ticket_priority;
    public $project_id;

    public $startDate, $endDate;
    public $ticket_id;

    public function createTicket()
    {
        $sql = "INSERT INTO {$this->table}(ticket_name,  project_name, ticket_type, ticket_description, ticket_assigned_to, ticket_status, ticket_priority, startDate, endDate) 
        
        VALUES(:ticket_name, :project_name, :ticket_type, :ticket_description, :ticket_assigned_to, :ticket_status, :ticket_priority, :startDate, :endDate)";

        $stmt = $this->conn->prepare($sql);
        $bindingValues = [
            ':ticket_name' =>  $this->ticket_name,
            ':project_name' =>  $this->project_name,
            ':ticket_type' =>  $this->ticket_type,
            ':ticket_description' =>  $this->ticket_description,
            ':ticket_assigned_to' =>  $this->ticket_assigned_to,
            ':ticket_status' =>  $this->ticket_status,
            ':ticket_priority' =>  $this->ticket_priority,
            ':startDate' =>  $this->startDate,
            ':endDate' =>  $this->endDate,

        ];

        foreach ($bindingValues as $k => $v) {
            $stmt->bindValue($k, $v);
        }

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll()
    {

        $sql = "SELECT * FROM tickets";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    public function readOne()
    {
        $sql = "SELECT * FROM {$this->table} WHERE ticket_id = :ticket_id";
        $stmt = $this->conn->prepare($sql);

        $this->ticket_id = (int) htmlspecialchars(strip_tags($this->ticket_id));
        $stmt->bindValue(':ticket_id', $this->ticket_id);
    }

    public function updateTicket()
    {
        $sql = "UPDATE {$this->table}
        SET
        ticket_name = :ticket_name,
        project_id = :project_id,
        ticket_type = :ticket_type,
        ticket_desctiption = :ticket_desctiption,
        ticket_assigned_to = :ticket_assigned_to,
        ticket_status = :ticket_status,
        ticket_priority = :ticket_priority;
        ";

        $this->ticket_name =  htmlspecialchars(strip_tags($this->ticket_name));
        $this->project_id =  htmlspecialchars(strip_tags($this->project_id));
        $this->ticket_type =  htmlspecialchars(strip_tags($this->ticket_type));
        $this->ticket_description =  htmlspecialchars(strip_tags($this->ticket_description));
        $this->ticket_assigned_to =  htmlspecialchars(strip_tags($this->ticket_assigned_to));
        $this->ticket_status =  htmlspecialchars(strip_tags($this->ticket_status));
        $this->ticket_priority =  htmlspecialchars(strip_tags($this->ticket_priority));

        $stmt = $this->conn->prepare($sql);

        $bindingValues = [
            ':ticket_name' => $this->ticket_name,
            ':project_id' => $this->project_id,
            ':ticket_type' => $this->ticket_type,
            ':ticket_description' => $this->ticket_description,
            ':ticket_assigned_to' => $this->ticket_assigned_to,
            ':ticket_status' => $this->ticket_status,
            ':ticket_priority' => $this->ticket_priority,


        ];

        foreach ($bindingValues as $k => $v) {
            $stmt->bindValue($k, $v);
        }
        $stmt->execute();
    }


    public function deleteTicket()
    {

        $sql  = "DELETE FROM {$this->table} WHERE ticket_id = :ticket_id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':ticket_id', $this->ticket_id);
        $stmt->execute();
    }
}
