<?php

class NhomKhachHang {

    // database connection and table name
    private $conn;
    private $table_name = "nhomkhachhang";
    // object properties
    public $id;
    public $tennhom;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        // query to select all
        $query = "SELECT * FROM " . $this->table_name;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function create() {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET TenNhom=:TenNhom";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->TenNhom = htmlspecialchars(strip_tags($this->TenNhom));

        // bind values
        $stmt->bindParam(":TenNhom", $this->TenNhom);

        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // update the nhomkhachhang
    function update() {
        // update query
        $query = "UPDATE " . $this->table_name . " SET TenNhom = :TenNhom WHERE ID = :ID";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->TenNhom = htmlspecialchars(strip_tags($this->TenNhom));
        $this->ID = htmlspecialchars(strip_tags($this->ID));

        // bind new values
        $stmt->bindParam(':TenNhom', $this->TenNhom);
        $stmt->bindParam(':ID', $this->ID);
        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete the nhomkhachhang
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = :ID";

        $stmt = $this->conn->prepare($query);

        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $stmt->bindParam(':ID', $this->ID);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}