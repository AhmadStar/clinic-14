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
                         $attributes_prob['_'.$col['COLUMN_NAME'].'_'.$attribute[$col['COLUMN_NAME']].'_'.$category] = $this->calculate_train_samples_prob($col['COLUMN_NAME'], $attribute[$col['COLUMN_NAME']], $category);
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
         
        //Encode $example array into a JSON string and store it in DB.
         $categoriesEncoded = json_encode($this->categories);
         $attributes_probEncoded = json_encode($this->attributes_prob);
         
         $data['categories'] = $categoriesEncoded;
         $data['attributes_prob'] = $attributes_probEncoded;
         
         $insert = $this->db->insert('bayes', $data);
         
        $a=json_decode($categoriesEncoded, true);
         print_r($a);

    }
    
    public function predicate($data){
        //print_r($data);
        $this->db->select('*');
        $this->db->from('bayes');
        $query = $this->db->get();
        
        $categories=json_decode($query->result_array()[0]['categories'], true);
        $attributes_prob=json_decode($query->result_array()[0]['attributes_prob'], true);
        $probs = array();
        $category_probs = array();
        
        foreach($categories as $category){
            $probs[$category] = 1;
        }
        //print_r($attributes_prob);
        foreach ($data as $item => $value){
            //print_r($value.' '.gettype($value).' ');
            if (gettype($value) == 'integer'){
                foreach($categories as $category){
                    $probs[$category] = $probs[$category]*$this->calculate_numerical_predicate_samples_prob($attributes_prob['_'.$item.'_std_'.$category], $attributes_prob['_'.$item.'_mean_'.$category], $value);
                }
            }
            else{
                foreach($categories as $category){
                    if($value == 'false'){$value = 0;}
                    elseif($value == 'true'){$value = 1;}
                    
                   // print_r(' '.$item.' '.$value.' ');
                    
                    $probs[$category] = $probs[$category]*$attributes_prob['_'.$item.'_'.$value.'_'.$category];
                }    
            }
        
        }
        
           
        foreach($categories as $category){
            $category_probs[$category] = 0;
        }
        
        foreach($categories as $category){
            $category_probs[$category] = $probs[$category]/array_sum($probs);
        }
        
        $result = array_keys($category_probs, max($category_probs));
        
        $data['disease'] = $result[0];
        $insert = $this->db->insert('disease', $data);
       
        return array_keys($category_probs, max($category_probs));

    }
    
    public function disease(){
        $user_data = array();
        $user_data['age'] = (integer)$this->input->post('age');
        $user_data['chest_pain_type'] = $this->input->post('chest_pain_type');
        $user_data['rest_blood_pressure'] = (integer)$this->input->post('rest_blood_pressure');
        $user_data['blood_sugar'] = $this->input->post('blood_sugar');
        $user_data['rest_electro'] = $this->input->post('rest_electro');
        $user_data['max_heart_rate'] = (integer)$this->input->post('max_heart_rate');
        $user_data['exercice_angina'] =$this->input->post('exercice_angina');
        $result = array();
        if ($this->predicate($user_data)[0] == 'positive'){
            $result[]='positive';
        }else{
            $result[]='negative';
        }
       
        return $result;
    }
     
    
    
}
