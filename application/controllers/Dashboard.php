<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller{


    public function index(){
        $this->loadViews('home');
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

                //GUARDAR TIPO USUARIO
                if(isset($login[0] -> is_profesor)){
                    $array['tipo'] = 'profesor';
                } else if (isset($login[0] -> is_alumno)){
                    $array['tipo'] = 'alumnos';
                }


                $this->session->userdata($array);

            }
        }
        $this->load->view('login');
    }


    function loadViews ($view, $data=null) {
        //si tengo sesion creada
        if($_SESSION['username']){

            //si la vista es login me redirige a la home
            if($view =="login"){
                redirect(base_url()."Dashboar","location")
            }
            //si es una vista cualquiera carga la inforacion
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('home');
            $this->load->view('includes/footer');
        }else {
            //si la vista es login se carga
            if($view =="login"){
                $this->load->view($view);
            }else{
                redirect(base_url()."Dashboar/login","location")
            }
        }
    }





}