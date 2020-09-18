<?php
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "product";
  
    // object properties
    public $id;
    public $tensanpham;
    public $soluong;
    public $gia;
    public $type;
    public $type_name;
    public $content;
    public $created_at;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
// read products
function read(){
  
    // select all query
    $query = "SELECT
                t.name as type_name, p.id, p.tensanpham, p.soluong, p.price, p.type, p.content, p.created_at
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    type t
                        ON p.type = t.id
            ORDER BY
                p.created_at DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
// create product
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                tensanpham=:tensanpham, gia=:gia, type=:type, content=:content, created_at=:created_at";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->tensanpham=htmlspecialchars(strip_tags($this->tensanpham));
    $this->gia=htmlspecialchars(strip_tags($this->gia));
    $this->type=htmlspecialchars(strip_tags($this->type));
    $this->content=htmlspecialchars(strip_tags($this->content));
    $this->created_at=htmlspecialchars(strip_tags($this->created_at));
  
    // bind values
    $stmt->bindParam(":tensanpham", $this->tensanpham);
    $stmt->bindParam(":gia", $this->gia);
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":content", $this->content);
    $stmt->bindParam(":created_at", $this->created_at);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
// used when filling up the update product form
function readOne(){
  
    // query to read single record
    $query = "SELECT
                t.name as type_name, p.id, p.tensanpham, p.gia, p.type, p.content, p.created_at
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    type t
                        ON p.type = t.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->tensanpham = $row['tensanpham'];
    $this->gia = $row['gia'];
    $this->content = $row['content'];
    $this->type = $row['type'];
    $this->type_name = $row['type_name'];
}
// update the product
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                tensanpham = :tensanpham,
                gia = :gia,
                content = :content,
                type = :type
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->tensanpham=htmlspecialchars(strip_tags($this->tensanpham));
    $this->gia=htmlspecialchars(strip_tags($this->gia));
    $this->type=htmlspecialchars(strip_tags($this->type));
    $this->content=htmlspecialchars(strip_tags($this->content));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind new values
    $stmt->bindParam(':tensanpham', $this->tensanpham);
    $stmt->bindParam(':gia', $this->gia);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
// delete the product
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
// search products
function search($keywords){
  
    // select all query
    $query = "SELECT
                t.name as type_name, p.id, p.name, p.gia, p.type, p.content, p.created_at
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    type t
                        ON p.type = t.id
            WHERE
                p.name LIKE ? OR p.content LIKE ? OR t.name LIKE ?
            ORDER BY
                p.created_at DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
  
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
// read products with pagination
public function readPaging($from_record_num, $records_per_page){
  
    // select query
    $query = "SELECT
                t.name as type_name, p.id, p.tensanpham, p.gia, p.type, p.content, p.created_at
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    type t
                        ON p.type = t.id
            ORDER BY p.created_at DESC
            LIMIT ?, ?";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind variable values
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
  
    // execute query
    $stmt->execute();
  
    // return values from database
    return $stmt;
}
// used for paging products
public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $row['total_rows'];
}
}
?>