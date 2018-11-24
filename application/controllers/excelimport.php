<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excelimport extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
        $this->load->helper('site');  
	}

	function index()
	{
        if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    $this->load->helper('url');
    $this->load->helper('form');

    $data['title'] = tr('Import Excel');
    $path='excel/excel_import';
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
	
	function fetch()
	{
		$data = $this->excel_import_model->select();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>age</th>
				<th>chest_pain_type</th>
				<th>rest_blood_pressure</th>
				<th>blood_sugar</th>
				<th>rest_electro</th>
				<th>max_heart_rate</th>
				<th>exercice_angina</th>
				<th>disease</th>
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->age.'</td>
				<td>'.$row->chest_pain_type.'</td>
				<td>'.$row->rest_blood_pressure.'</td>
				<td>'.$row->blood_sugar.'</td>
				<td>'.$row->rest_electro.'</td>
				<td>'.$row->max_heart_rate.'</td>
				<td>'.$row->exercice_angina.'</td>
				<td>'.$row->disease.'</td>                
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=3; $row<=$highestRow; $row++)
				{
					$age = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$chest_pain_type = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$rest_blood_pressure = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$blood_sugar = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$rest_electro = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$max_heart_rate = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$exercice_angina = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$disease = $worksheet->getCellByColumnAndRow(7, $row)->getValue();					
					$data[] = array(
						'age'  =>	$age,
						'chest_pain_type'  =>	$chest_pain_type,
						'rest_blood_pressure'	=>	$rest_blood_pressure,
						'blood_sugar'		=>	$blood_sugar,
						'rest_electro'			=>	$rest_electro,
						'max_heart_rate'			=>	$max_heart_rate,
						'exercice_angina'			=>	$exercice_angina,
						'disease'			=>	$disease,
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}
}

?>