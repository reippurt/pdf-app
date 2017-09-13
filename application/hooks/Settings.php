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

        $this->ci->session->set_userdata('referer', current_url());

        $needle = $this->ci->uri->segment(2);

        $haystack = array('set-user', 'setSignature');

        if($this->ci->session->userdata('logged_in') && get_cookie('signature_name') == NULL && !in_array($needle, $haystack))
        {

            //redirect('admin/set-user');

        }

    }

}