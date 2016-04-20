<?php

class Plan_Record {

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
        $this->name = $row['Plan'];
        $this->cost = $row['cost'];
    }
    function __construct() {
        
    }

}
