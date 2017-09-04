<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	


	if( !function_exists('_redirect') ) {

		function _redirect(){			
			$ci =& get_instance();
			redirect($ci->session->userdata('referer'));
		}


	}



	