<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->load->model('note_model');
		$result=array(
			"note"=>$this->note_model->display_note()
			);	
		$this->load->view('note_view',$result);
	}
	public function create()
	{
		if ($this->form_validation->run('note')==false) 
		{
			$data['error']=validation_errors();
			// redirect('/');
		}else
		{
			// echo "here";
			$this->load->model('note_model');
			$this->note_model->add_note($this->input->post('description'));	
			// redirect('/');
			$data['note']=$this->input->post('description');
		}
		echo json_encode($data);
	}

}
?>