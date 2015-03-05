<?php
//creating a class for user, this is like an ingrediants list for a cake, i use this to make events (cake)
class User {
    //creating variables
    private $username;
    private $password;
    private $fullname;
    private $age;
    private $emailaddress;
    private $maidenName;
    
    //creating the constructor, needed as my above variables are private, so this is how i access them
    public function __construct($u, $p, $fn, $a, $ea, $mn) {
        $this->username = $u;
        $this->password = $p;
        $this->fullname = $fn;
        $this->age = $a;
        $this->$emailaddress = $ea;
        $this->$maidenName = $mn;
    }
    //creating the get for username
    public function getUsername() {
        return $this->username;
    }
    //creating the get for password
    public function getPassword() {
        return $this->password;
    }    
    public function getFullName() {
       return $this->fullname;
   }   
    public function getAge() {
       return $this->age;
   }   
    public function getEmailAddress() {
       return $this->emailaddress;
   } 
    public function getMaidenName() {
       return $this->maidenName;
   }  
}
