<?php

class User_Record {

    public $user_id;
    public $first_name;
    public $second_name;
    public $join_date;
    public $cost;
    public $email_address;
    public $gender;
    
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
        $this->first_name = $row['first_name'];
        $this->second_name = $row['second_name'];
        $this->email_address = $row['email_address'];
        $this->gender = $row['gender'];
    }
    function __construct() {
        
    }

}
