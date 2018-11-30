<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expert_System extends CI_Controller {
  
  
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('site');  
    
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }

  
  
  public function index($limit = 15,$page = 1)
  {
    
    $this->load->helper('url');
    $this->load->helper('form');
      
    $this->load->model('expert_system_model','bayes');

    $data['chest_pain_type_options'] = $this->chest_pain_type_options();
    $data['blood_sugar_options'] = $this->blood_sugar_options();
    $data['rest_electro_options'] = $this->rest_electro_options();
    $data['exercice_angina_options'] = $this->exercice_angina_options();
    $data['title'] = tr('ExpertSystem');
    $path='expert_system/new';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array($path);
        $this->load->view('header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer',$data);
    }
  }
    
  public function predicate()
  {
      $this->load->model('expert_system_model','bayes');
      
      $data = $this->bayes->disease();
      

      $output = array(						
						"data" => $data,
				);
      
		//output to json format
      echo json_encode($output);
  }
 
  /**
   * _id_type_options()
   * returns the array of type
   */
  public function chest_pain_type_options()
  {
    return array(NULL=>tr('chest_pain_type'),
                 'asympt'=>'asympt',
                 'atyp_angina'=>'atyp_angina',
                 'non_anginal'=>'non_anginal',
                 'typ_angina'=>'typ_angina',);
                 
  }
     public function blood_sugar_options()
  {
    return array(NULL=>tr('blood_sugar'),
                 'true'=>'true',
                 'false'=>'false',);
  }
     public function rest_electro_options()
  {
    return array(NULL=>tr('rest_electro'),
                 'normal'=>'normal',
                 'st_t_wave_abnormality'=>'st_t_wave_abnormality',
                 'left_vent_hyper'=>'left_vent_hyper',);
  }
     public function exercice_angina_options()
  {
    return array(NULL=>tr('exercice_angina'),
                 'yes'=>'yes',
                 'no'=>'no',);
  }
       
    
}
