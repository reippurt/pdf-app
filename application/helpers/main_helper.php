<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	


	if( !function_exists('_redirect') ) {

		function _redirect(){			
			
			$ci =& get_instance();
			
			if($ci->input->post('referer') != ""){
				$redirect = $ci->input->post('referer');
			} else {
				$redirect = $ci->session->userdata('referer');
			}

			redirect($redirect);
		
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



	