<?php

class Settings
{
    var $ci;

    public function __construct(){

        $this->ci =& get_instance();

    }


    function initSettings() {

        $this->ci->load->library('session');
        $this->ci->load->helper('cookie');
        $this->ci->load->helper('url');

            
        $prevent_refer = array('makePdf', 'autocomplete');
        $active_refer = $this->ci->uri->segment(2);
       
        if(!in_array($active_refer, $prevent_refer)){
            $this->ci->session->set_userdata('referer', current_url());
        }

       

        $needle = $this->ci->uri->segment(2);

        $haystack = array('set-user', 'setSignature');

        if($this->ci->session->userdata('logged_in') && get_cookie('signature_name') == NULL && !in_array($needle, $haystack))
        {

            //redirect('admin/set-user');

        }

    }

}