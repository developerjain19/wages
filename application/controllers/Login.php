<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function index()
    {
        $get['title'] = "Login - Wages";
        if ($this->session->userdata('id')) {
            redirect(base_url('dashboard'));
        } else {

            // echo password_hash('12345', PASSWORD_DEFAULT);
            $this->load->view('admin/login', $get);
        }
    }
    public function adminlogin()
    {
        $data['title'] = "Login";
        $this->form_validation->set_rules('email', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        if ($this->form_validation->run()) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data =  $this->CommonModal->getRowById('staff', 'email', $email);
            if ($data) {
                $id = $data[0]['uid'];
                $f_email = $data[0]['email'];
                $f_password = $data[0]['password'];
                if (!password_verify($password, $f_password)) {
                    flashData('login_error', 'Enter a valid Password.');
                } else if ($data[0]['status'] == '0') {
                    flashData('login_error', 'You are blocked.');
                } else {
                    $this->session->set_userdata(array('id' => $id, 'email' => $email, 'name' => $data[0]['name'], 'position' => $data[0]['position'], 'switch' => $data[0]['swich_permission']));

                    if ($data[0]['position'] == '3') {
                        redirect('select-division');
                    } elseif ($data[0]['position'] == '5') {
                        redirect('select-division');
                    } else {
                        redirect('dashboard');
                    }
                }
            } else {
                flashData('login_error', 'Enter a valid Username ');
            }
        }
        redirect(base_url('login'));
    }
    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('position');
        redirect(base_url());
    }
}
