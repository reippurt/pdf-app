<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	function __construct()
	{
		parent::__construct();
	}

	public function _init()
	{
		$this->output->set_template('default');
	}
	
	public function index()
	{
		$this->_init();
		$this->load->view('main');
	}

	public function sessions()
	{
		$this->_init();

		$this->load->view('sessions');
	}

	public function convert($table)
	{
		$this->_init();


		$this->$table();

	}

	public function dentist()
	{

		$query = $this->db->select('*')
						  ->from('dentist')
						  ->get();

		$dentist = $query->result();
		$data['dentist'] = $dentist;
		
		$this->load->view('convert-dentist', $data);
	}

	public function action()
	{
		
		$old_dentist = $this->db->get('product')->result();
			

		$this->_init();

		foreach ($old_dentist as $key => $value) {
			
				
				$new_data = array(
				
					'productId' => $value->product_id,
					'name'=> $value->product_name,
					'description' => $value->product_description,
					'lot' => $value->lot_number,
					'active'=> $value->active

				);

				//$this->db->insert('products', $new_data);

			
		}

	}

}
