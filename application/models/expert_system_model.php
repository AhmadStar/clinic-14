<?php

class Expert_System_Model extends MY_Model {
    
    
    
    public function count_positive() 
    {
        $this->db->select('COUNT(disease)');
        $this->db->where('disease', 'positive');
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result();      
         
    }

     public function count_negative() 
    {
        $this->db->select('COUNT(*)');
        $this->db->where('disease', 'negative');
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result();      
         
    }
    
     public function sample_prob_positive($col,$sample)
    {
       $this->db->select('COUNT('.$col.')');
        $this->db->where($col, $sample);
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result();    
        
    }
    
     public function sample_prob_negative($col,$sample)
    {
       $this->db->select('COUNT('.$col.')');
        $this->db->where($col, $sample);
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result()/count_negative();    
        
    }
    
     public function train()
    {
        $this->db->select('COUNT(disease)');
        $this->db->where('disease', 'negative');
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result();      
         
    }
     
    
    
}
