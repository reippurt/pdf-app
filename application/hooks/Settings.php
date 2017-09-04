<?php
class Settings
{
    function initSettings() {
        $ci =& get_instance();
        $ci->load->library('session');
        $ci->load->helper('url');
       	
        if(1==1)
        {
            $ci->session->set_userdata('referer', current_url());   
        }
     
    }

}