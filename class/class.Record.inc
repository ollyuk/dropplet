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
        $output .= ' ' . $this->last_name; 
        
        return $output;
        
    }
    function __construct() {
        
    }

}
