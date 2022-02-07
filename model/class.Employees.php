<?php
class Employees{
  
    // database connection and table name
    private $conn;
    private $table_name = "employees";
  
    // object properties
    public $employee_id;
    public $image;
    public $date_of_birth;
    public $title;
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $country;
    public $bio;
    public $rating;
    public $created_at;



  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    

    function getAllEmployees(){
  
        // select all query
        $query = "SELECT
                   *
                FROM
                    " . $this->table_name . "
                    ORDER BY created_at DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    
    // ако има аларм ($flag=='1') се запишува само тој запис и status - open се додека не се исклучи алармот
    function create(){

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                employee_id=:employee_id, image=:image, date_of_birth=:date_of_birth,title=:title, firstname=:firstname
                ,lastname=:lastname,email=:email,address=:address,country=:country,bio=:bio,rating=:rating, created_at=:created_at";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
//         $this->firstname=htmlspecialchars(strip_tags($this->employee_id));
//         $this->image=htmlspecialchars(strip_tags($this->image));
//         $this->date_of_birth=htmlspecialchars(strip_tags($this->date_of_birth));
//         $this->title=htmlspecialchars(strip_tags($this->title));
//         $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    
        // bind values
        $stmt->bindParam(":employee_id", $this->employee_id);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":bio", $this->bio);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":created_at", $this->created_at);


    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }
 
    
}




?> 
