<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller{


    public function index(){
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }


    public function login(){
        if($_POST['username'] && $_POST['password']){
            $login = $this->Site_model->loginUser($_POST);
            if($login){
                $array= array(
                    "id" => $login[0] ->  id,
                    "nombre" => $login[0] ->  nombre,
                    "apellido" => $login[0] ->  apellido,
                    "username" => $login[0] ->  username,
                    "curso" => $login[0] -> curso  ,
    
                );

                $this->session->userdata($array);

                print_r($_SESSION);

            }


        }
        $this->load->view('login');
    }

}