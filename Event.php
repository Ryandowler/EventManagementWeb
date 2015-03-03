<?php
//creating a class for event, this is like an ingrediants list for a cake, i use this to make events (cake)
//updated 
//sort out the ID !!!!!!!!!!!!!
class Event {
    private $eventID;
    private $title;
    private $description;
    private $startDate;
    private $endDate;
    private $time;
    private $maxAttendees;
    private $cost;
    private $managerID;
   // private $organiserName;
   // private $organiserEmail;
   // private $organiserAddress;
   // private $organiserMobileNumber;
    
    //creating the constructor, needed as my above variables are private, so this is how i access them
    public function __construct($t, $d, $sd, $ed, $tm, $ma, $c,$mID) {
        $this->title = $t;
        $this->description = $d;
        $this->startDate = $sd;
        $this->endDate = $ed;
        $this->time = $tm;
        $this->maxAttendees = $ma;
        $this->cost = $c;
        $this->managerID = $mID;
       // $this->organiserName = $on;
       // $this->organiserEmail = $oe;
        //$this->organiserAddress = $oa;
        //$this->organiserMobileNumber = $omn;
    }
    //creating the gets 
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getStartDate() { return $this->startDate; }
    public function getEndDate() { return $this->endDate; }
    public function getTime() { return $this->time; }
    public function getMaxAttendees() { return $this->maxAttendees; }
    public function getCost() { return $this->cost; }
    public function getManagerID() { return $this->managerID; }
   // public function getOrganiserName() { return $this->organiserName; }
   // public function getOrganiserEmail() { return $this->organiserEmail; }
   // public function getOrganiserAddress() { return $this->organiserAddress; }
   // public function getOrganiserMobileNumber() { return $this->organiserMobileNumber; }
}
