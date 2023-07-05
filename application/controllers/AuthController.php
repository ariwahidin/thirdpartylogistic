<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model(['user']);
    }

    public function index()
    {
        check_already_login();
        $this->load->view('login');
    }

    public function login()
    {
        $login = $this->user->get_login();
        $response = array();
        if ($login->num_rows() > 0) {
            $response['success'] = true;
            $user_id = $login->row()->id;
            $fullname = $login->row()->fullname;
            $username = $login->row()->username;
            $role = $login->row()->role;
            $this->session->set_userdata('tpl_user_id', $user_id);
            $this->session->set_userdata('tpl_fullname', $fullname);
            $this->session->set_userdata('tpl_username', $username);
            $this->session->set_userdata('tpl_role', $role);
        } else {
            $response['success'] = false;
        }
        echo json_encode($response);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
