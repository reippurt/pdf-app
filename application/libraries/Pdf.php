<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$file = getcwd() . "/assets/TCPDF-master/tcpdf.php";

require_once $file;

class Pdf extends TCPDF
{

    function __construct()
    {
        parent::__construct();
    }

    

}