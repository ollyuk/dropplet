<?php

class Plan_Record {
    public $user_id;
    public $plan_id;
    public $name;
    public $cost;
    public $created_at;
 
    
    /**
     * Display the plans details.
     * @return string
     */
    function display_name() { 
        $output = '';
        
        // Name
        $output .= $this->name;
        
        return $output;
        
    }
    function display_cost() {
        $output = '';
        $output .= $this->cost;
        return $output;
    }
    

    
    function add_plans($row) {
        $this->user_id = $row['user_id'];
        $this->plan_id = $row['plan_id'];
        $this->name = $row['name'];
        $this->cost = $row['cost'];
        $this->created_at = $row['created_at'];
    }
    function __construct() {
        
    }

}
