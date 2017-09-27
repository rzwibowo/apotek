<?php
class Login extends CI_Controller
{
    function __construct()
    {
        # code...
        parent::__construct();
        $this->load->model('md_login');
    }

    function index()
    {
        # code...
        $this->load->view('vw_login');
    }

    function login_action()
    {
        # code...
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $where=array(
            'username' => $username ,
            'password' => md5($password) 
        );

        $check=$this->md_login->login_check("user",$where)->num_rows();
        if($check>0){
            // $level=$this->md_login->get_level("user",$where);
            $data_session = array(
                'nama' => $username ,
                // 'level' => $level ,
                'status' => 'login'
            );

            $this->session->set_userdata($data_session);
            
            redirect(base_url("user"));
        } else {
            echo "Username or Password invalid";
        }
    }

    // function ambil_data_level()
    // {
    //     # code...
    //     $username=$this->input->post('username');
    //     $password=$this->input->post('password');
    //     $where=array(
    //         'username' => $username ,
    //         'password' => md5($password) 
    //     );
    //     echo $level=$this->md_login->get_level("user",$where);
    // }

    function logout()
    {
        # code...
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}


?>