<?php

namespace BugTracking\Models;
class ContactUs
{
    public $name, $email, $company, $mobile, $message;
    private $table = 'contacts';
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createContact()
    {
        $sql = "INSERT INTO {$this->table}(name, company,email, mobile, message) VALUES(:name, :company, :email, :mobile, :message)";
        $stmt = $this->conn->prepare($sql);
        $bindingValues = [
            ":name" => $this->name,
            ":company" => $this->company,
            ":email" => $this->email,
            ":mobile" => $this->mobile,
            ":message" => $this->message
        ];

        foreach($bindingValues as $k => $v){
            $stmt->bindValue($k, $v);
        }
        $stmt->execute();
        return $stmt;
    }
}
