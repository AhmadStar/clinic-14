<?php

class Expert_System_Model extends MY_Model {
    
    public $categories ;
    public $attributes_prob;
    
    
    public function count_all($category) 
    {
        $this->db->select('COUNT(*) as count');
        $this->db->where('disease', $category);
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result_array();      
         
    }
    
    public function count_rows($col, $sample, $category) 
    {
        $this->db->select('COUNT(*) as count');
        $this->db->where($col, $sample);
        $this->db->where('disease', $category);
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result_array();      
         
    }
    
    public function caculate_mean($col, $category) 
    {
        $this->db->select('AVG('.$col.') as mean');
        $this->db->where('disease', $category);
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result_array()[0]['mean'];      
         
    }
    
    public function caculate_STD($col, $category) 
    {
        $this->db->select('STD('.$col.') as std');
        $this->db->where('disease', $category);
        $this->db->from('disease');
        $query = $this->db->get();
        
        return $query->result_array()[0]['std'];      
         
    }
    
     public function calculate_train_samples_prob($col, $sample, $category)
    {
        return $this->count_rows($col, $sample, $category)[0]['count'] / $this->count_all($category)[0]['count'];
    }
    
    
     public function calculate_numerical_predicate_samples_prob($std, $mean, $val)
    {
        return (1 / sqrt(2*pi()*$std))*exp(-(pow(($val-$mean),2))/(2*pow($std,2)));
    }
    
     public function train($DB_name, $table_name, $categories_col_name)
    {
         
         $categories = array();
         $attributes_prob = array();
        
         /*
          * first we found the category
          */
         
         $this->db->select('COLUMN_NAME, DATA_TYPE');
         $this->db->from('INFORMATION_SCHEMA.COLUMNS');
         $this->db->where('TABLE_SCHEMA', $DB_name);
         $this->db->where('TABLE_NAME', $table_name);
         $query = $this->db->get(); 
         $columns = $query->result_array();
         
         foreach ($columns as $col){
             if ($col['COLUMN_NAME'] == $categories_col_name){
                 $this->db->select($col['COLUMN_NAME']);
                 $this->db->from($table_name);
                 $this->db->group_by($col['COLUMN_NAME']);
                 $query = $this->db->get();
                 $attributes = $query->result_array();
                 
                 foreach ($attributes as $attribute){
                     $categories[] = $attribute[$col['COLUMN_NAME']];
                 }
             }
         }
         
         /* 
          * for each column we found the attribute in its and calculate the attribute probability
          */
         
         foreach ($columns as $col){
             if ($col['DATA_TYPE'] != 'int' and $col['COLUMN_NAME'] != $categories_col_name){
                 $this->db->select($col['COLUMN_NAME']);
                 $this->db->from($table_name);
                 $this->db->group_by($col['COLUMN_NAME']);
                 $query = $this->db->get();
                 $attributes = $query->result_array();
                 
                 foreach ($attributes as $attribute){
                     foreach ($categories as $category){
                         $attributes_prob['_'.$attribute[$col['COLUMN_NAME']].'_'.$category] = $this->calculate_train_samples_prob($col['COLUMN_NAME'], $attribute[$col['COLUMN_NAME']], $category);
                     } 
                 }
                 
             }elseif ($col['DATA_TYPE'] == 'int'and $col['COLUMN_NAME'] != 'id') {
                 foreach ($categories as $category){
                     $attributes_prob['_'.$col['COLUMN_NAME'].'_mean_'.$category] = $this->caculate_mean($col['COLUMN_NAME'], $category);
                 } 
                 foreach ($categories as $category){
                     $attributes_prob['_'.$col['COLUMN_NAME'].'_std_'.$category] = $this->caculate_std($col['COLUMN_NAME'], $category);
                 } 

             }
             
         }
         
         $this->categories = array_slice($categories,0,count($categories));
         $this->attributes_prob = array_slice($attributes_prob,0,count($attributes_prob));
         
        //Encode $example array into a JSON string.
         $categoriesEncoded = json_encode($this->categories);
         $attributes_probEncoded = json_encode($this->attributes_prob);
         
//         $a=json_decode($categoriesEncoded, true);
//         print_r($a);

    }
     
    
    
}
