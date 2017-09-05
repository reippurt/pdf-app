<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	


	if( !function_exists('_redirect') ) {

		function _redirect(){			
			$ci =& get_instance();
			redirect($ci->session->userdata('referer'));
		}


	}

if( !function_exists('_is_logged') ) {

		function _is_logged(){			
			$ci =& get_instance();
			if(!$ci->session->userdata('logged_in')){
				redirect(base_url());
			}
		}


	}



	