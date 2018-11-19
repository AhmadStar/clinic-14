<?php

class Articles extends MY_Model {
    
    const DB_TABLE = 'articles';
    const DB_TABLE_PK = 'id';
    
    /**
     * Table unique identifier.
     * @var int
     */
    public $id;
    
    /**
     * Article Title.
     * @var string
     */
    public $title;
    
    /**
     * Body
     * @var int
     */
    public $body;
    
    /*
     * Image
     * @var int
     */
    public $image;
    
    
    /*
     * Author id
     * @var int
     */
    public $author_id;
    
    /*
     * Date of created
     * @var Date
     */
    public $created_date;
    
    
    
    public function get_title($id=0) 
    {
        $this->db->select('title');
        $this->db->where('id', $id);
        $this->db->from('articles');
        $query = $this->db->get();
        
        return $query->result();      
         
    }
    
     public function get_article($id=0) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get('articles');
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;  
         
    }
    
    function get_article_name($article_id)
    {
        $this->db->select('name');
        $this->db->where('id', $article_id);
        $this->db->from('articles');
        $query = $this->db->get();
        
        return $query->result(); 
        
    }
    
}