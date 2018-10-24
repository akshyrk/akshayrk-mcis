<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	public function index()
	{
		$this->load->view('home');
	}
	public function add_model()
	{
		$result['data'] = $this->Admin_model->manufacturers_data();
		$this->load->view('car_model',$result);
	}
	public function view_inventory()
	{
		$result['data'] = $this->Admin_model->inventory_data();
		$this->load->view('inventory',$result);
	}
	public function add_manufacturer()
	{
		$post = $this->input->post();
		$result = $this->Admin_model->add_manufacturer($post);
		return $result;	
	}
	public function add_car_model()
	{
		$post = $this->input->post();
		$result = $this->Admin_model->add_car_model($post);
		return $result;	
	}
	public function sold_item()
	{
		$post = $this->input->post();
		$result = $this->Admin_model->sold_item($post);
		return $result;
	}
}
