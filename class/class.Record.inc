<?php

class User_Record {

    public $user_id;
    public $first_name;
    public $second_name;
    public $join_date;
    public $cost;
    public $email_address;
    public $gender;
    public $plans;
    
    /**
     * Display the users details.
     * @return string
     */
    function display_name() { 
        $output = '';
        
        // Name
        $output .= $this->first_name;
        $output .= ' ' . $this->second_name; 
        
        return $output;
        
    }
    function display_gender() {
        $output = '';
        
        $output .= $this->gender;
        return $output;
    }
    
    function display_email(){
        $output = '';
        $output .= $this->email_address;
        return $output;
    }
    
    function display_cost(){
        $output = '';
        $output .= $this->cost;
        return $output;
    }
    
    function add_record($row) {
        $this->user_id = $row['user_id'];
        $this->first_name = $row['first_name'];
        $this->second_name = $row['second_name'];
        $this->join_date = $row['join_date'];
        $this->email_address = $row['email_address'];
        $this->gender = $row['gender'];
    }
    function add_plans($plan) {
        $this->plan = $plan;
    }
    function return_plans() {
        $output = '';
        $output .= $this->plans;
    }
    function __construct() {
        
    }

}
