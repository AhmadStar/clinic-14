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
    public $reading;
    
    
    
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
    
    public function get_all_articles()
    {
        $this->db->select('*');
        $this->db->order_by('reading','desc');
        $this->db->from('articles');
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_less_article_reading(){
        $this->db->select('*');
        $this->db->order_by('reading','asc');
        $this->db->from('articles');
        $this->db->limit(3);
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_articles_count()
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('articles');
        $query = $this->db->get();
        
        return $query->result_array()[0]['count']; 
        
    }
    
    
    function update_counter($slug) {
    // return current article views 
        $this->db->where('id', urldecode($slug));
        $this->db->select('reading');
        $count = $this->db->get('articles')->row();
    // then increase by one 
        $this->db->where('id', urldecode($slug));
        $this->db->set('reading', ($count->reading + 1));
        $this->db->update('articles');
    }
    
}