<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
  
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/home
   *	- or -  
   * 		http://example.com/index.php/home/index
   *	- or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/home/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
 
  /**
   * this is the index of home page
   * this should load the main panel for user
   */
  public function index($limit = 8,$page = 1)
  {
    //initialize and load header
    $data['title'] = 'موقع الاستشارات الطبية';
    $data['navActiveId']='navbarLiHome';
    $this->load->helper('site');  
    $this->load->helper('text');
    $this->load->model('articles','articles');
    $this->load->model('consultings','consultings');
    $data['guestCount']=count($this->bitauth->get_users_by_role('guest'));
    $data['unAnsweredConsulting'] = $this->consultings->get_Count_un_answered_Consultings();
    $data['articlesCount'] = $this->articles->get_articles_count();
    $data['articles'] = $this->articles->get_all_articles();
    $data['lessreading']=$this->articles->get_less_article_reading();
    if ($this->bitauth->logged_in() && $this->bitauth->is_admin()){
        $data['includes']=array('home/admin');
    }else{
        $data['includes']=array('home/articlesgallery');
    }
      
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('home/index/'.$data['per_page']);
    $config['total_rows'] = count($data['articles']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    $this->load->view('header',$data);
    $this->load->view('index',$data);
    $this->load->view('footer',$data);
  }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */