<?php

class Consultings extends MY_Model {
    
    const DB_TABLE = 'consulting';
    const DB_TABLE_PK = 'id';
    
    /**
     * Table unique identifier.
     * @var int
     */
    public $id;
    
    /*
     * User id
     * @var int
     */
    public $user_id;
    
    /*
     * Doctor id
     * @var int
     */
    public $doctor_id;
    
    /**
     * Consulting Title.
     * @var string
     */
    public $consulting_title;
    
    /**
     * Question.
     * @var string
     */
    public $question;
    
    /**
     * Status
     * @var int
     */
    public $status;
    
    /*
     * Answer
     * @var int
     */
    public $Answer;
    
    
    /*
     * Date of created
     * @var Date
     */
    public $date;
    
 
     public function get_cosulting($id=0) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get('consultings');
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;  
         
    }
    
     public function get_patient_information($id=0) 
    {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('userdata');
        return $query->result_array();  
         
    }
    
    
}