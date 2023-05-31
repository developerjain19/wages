<?php
defined('BASEPATH') or exit('no direct access allowed');
class Employee  extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     if (sessionId('farmer_id') == "") {
    //         redirect(base_url('farmer-login'));
    //     }
    //     date_default_timezone_set("Asia/Kolkata");
    //     $setting  =  $this->CommonModal->getRowById('contactdetails', 'cid', '1');
    //     $this->site_title  = $setting[0]['site_title'];
    // }
    public function dashboard()
    {
        $data['title'] = ucfirst(sessionId('name')).' Profile';
        $this->load->view('farmer/dashboard', $data);
    }
    public function profile()
    {
        $data['title'] = ucfirst(sessionId('name')).' Profile';
        $this->load->view('farmer/profile', $data);
    }
}
