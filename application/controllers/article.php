<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
  
  /**
   * Drug::__construct()
   *
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('site');  
    
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }

  
  /**
   * Drug::index()
   */
  public function index($limit = 15,$page = 1)
  {
    
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }  
      
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }  
    
    $this->load->helper('url');
    $this->load->helper('form');

    $data['title'] = tr('ArticlesList');
    $path='article/list';
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
    
  public function ajax_list()
  {
        $this->load->model('articles_model','articles');
		$list = $this->articles->get_datatables();
		$data = array();
		$no = $_POST['start'];        
		foreach ($list as $articles) {
			$no++;
            $actions = '';
			$row = array();
			$row[] = $no;
			$row[] = $articles->title;		
			$row[] = $articles->created_date;
            
            $actions .= anchor('article/edit/'.$articles->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditArticle')));
            $actions .= anchor('article/delete/'.$articles->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Article'));
            $actions .= anchor('article/show/'.$articles->id, '<span class="glyphicon glyphicon-check"></span>',array('title'=>'Show Article'));
            
            $row[] = $actions;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->articles->count_all(),
						"recordsFiltered" => $this->articles->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}    
    
    public function total()
  {      
        $this->load->model('Consumes','consumes');
        $this->load->model('Articles_model','articles');        
		$data = $this->consumes->get_total();
		
		$output = array(						
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}    
  
  /**
   * Patient::search()
   */
  public function search(/*$q=''*/)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    //if($q!='')
    if($this->input->post())
    {
        $this->load->model('drugs');
        $q=$this->input->post('q');
        //$drugs=$this->drugs->search(array('drug_name_en'=>$q,'drug_name_fa'=>$q));
        $drugs=$this->drugs->search(array('drug_name_en'=>$q,'drug_name_fa'=>$q));
        $data['drugs']=$drugs;
        $this->load->view('drug/result',$data);
        return TRUE;
    }
    $data['title']=tr('DrugSearch');
    $this->load->view('drug/search');
  }
  
  /**
   * Patient::edit()
   */
  public function edit($article_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }
      
    $this->load->model('articles');
    $this->articles->load($article_id);
    
    if($this->input->post())
    {
        
      $this->form_validation->set_rules(array(        
        array( 'field' => 'title', 'label' => 'Article Title', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'body', 'label' => 'Article body', 'rules' => 'trim', ),
      ));    
              
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$article_id)
        {
            unset($_POST['submit']);
            $article=$this->input->post();
            $this->load->model('articles');
            foreach($article as $key => $value)
              $this->articles->$key = $value;
            $this->articles->save();
            unset($_POST);
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.html_escape($this->articles->title).' '.tr('successfuly').'");</script>';
//            redirect('article');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }
    $this->session->set_userdata(current_url(),array($article_id));
    $data['title'] = tr('EditArticle');    
    $data['article']=$this->articles;
    $path='article/edit';
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

  /**
   * Patient::edit()
   */
  public function delete($article_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }
      
    $this->load->model('articles');
    $this->articles->load($article_id);
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id')==$article_id)
      {
          
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$article_id)
        {
                $this->articles->delete();
                echo 'ok';
                return;

        }else{
          
          $data['error'] = 'mismatch';
          return;
        }
      }else{
        $data['error']='invalid';
        return;
      }
    }
    $this->session->set_userdata(current_url(),array($article_id));
    $data['article']=$this->articles;

    $this->load->view('article/confirm_delete',$data);
  }
  
  /*
   * 
   */
  public function new_article()
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(        
        array( 'field' => 'title', 'label' => 'Article Title', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'created_date', 'label' => 'Article created date', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'body', 'label' => 'Article bode', 'rules' => 'trim', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $article=$this->input->post();
        $this->load->model('articles');
        foreach($article as $key => $value)
          $this->articles->$key = $value;
        $this->articles->save();
        unset($_POST);

          $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.html_escape($this->articles->title).' '.tr('successfuly').'");</script>';
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewArticle');    
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='article/new';
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
    
    public function userlist($limit = 8,$page = 1)
  {
    //initialize and load header
    $data['title'] = tr('Articles');
    $this->load->helper('text');
    $this->load->model('articles','articles');
    $data['articlesCount'] = $this->articles->get_articles_count();
    $data['articles'] = $this->articles->get_all_articles();
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('article/userlist/'.$data['per_page']);
    $config['total_rows'] = count($data['articles']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    $this->load->view('header',$data);
    $path='article/userlist';
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
  
  public function show($article_id=0)
  {
    $this->load->model('articles');
    $this->articles->load($article_id);
    
    if($this->input->post())
    {
        
      $this->form_validation->set_rules(array(
        array( 'field' => 'body', 'label' => 'Article body', 'rules' => 'trim', ),
      )); 
    }
      
      
    $data['title'] = tr('ShowArticle');
    $data['article']=$this->articles;
    $path='article/show';
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

  public function _no_access()
  {
    $data['title']=tr('UnauthorizedAccess');
    $path='account/no_access';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array($path);
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }
  }
    
  
    
    /**
   * _id_type_options()
   * returns the array of type
   */
  public function type_options()
  {
    return array('0'=>tr('IncomeType'),
                 'static'=>'معاينة ثابتة',
                 'normal'=>'معاينة عادية',);
  }    
    
    
}
