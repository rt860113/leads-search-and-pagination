<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$lead=new lead();
		$count=$lead->count();
		// var_dump($count);
		$total_pages=ceil($count/15);
		// var_dump($total_pages);
		$lead1=new lead();
		$lead1->limit(15,0);
		$result=$lead1->get()->all_to_array();
		// var_dump($result);
		$this->load->view("lead_view",array("result"=>$result,"total_pages"=>$total_pages));
	}
	public function load_page($array)
	{
		$this->load->view("lead_view",$array);
	}
	public function display_page($page,$total_pages)
	{
		$lead=new lead();
		$offset=($page-1)*10;
		$lead->limit(15,$offset);
		$result=$lead->get()->all_to_array();
		$this->load_page(array("total_pages"=>$total_pages,"result"=>$result));
	}
	public function filter()
	{
		$lead=new lead();
		if(strlen(trim($this->input->post('name')))>0)
		{
			$array=explode(" ", $this->input->post('name'));
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
			$first_name=$array[0];
			$last_name=$array[1];
			$lead->where();
			$lead->where();
			$lead->select();
			$count=$lead->count();
			$total_pages=ceil($count/15);
			$result=$lead->get()->all_to_array();
			$this->load->view("lead_view",array("result"=>$result,"total_pages"=>$total_pages));

		}
	}
	
}