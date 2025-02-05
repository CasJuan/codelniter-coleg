<?php

class Site_model extends CI_Model {

    public function loginUser($data){
        $this->db->select("*");
        $this->db->from("profesores");
        $this->db->where("username",$data['username']);
        $this->db->where("password",md5($data['password']));

        $query = $this->db->get();
        if($query-> num_rows()>0){
            return $query->result();
        }else{

            $this->db->select("*");
            $this->db->from("alumnos");
            $this->db->where("username",$data['username']);
            $this->db->where("password",md5($data['password']));

            $queryalumno = $this->db->get();

            if($queryalumno-> num_rows()>0){
                return $queryalumno->result();
            }

            return NULL;
        }
    }

    public function insertProfesor(){

        $array= array(
            "nombre" => "Juan",
            "apellido" => "Castro",
            "curso" => 3
        );

        $this->db->insert("profesores", $array);

    }

    public function getProfesores(){

        $this->db->select("*");
        $this->db->from("profesores");

        $query = $this->db->get();
        if($query-> num_rows()>0){
            return $query->result();
        }else{
            return NULL;
        }

    }

    public function updateProfesore(){
        
        $array= array(
            "nombre" => "Juan",
            "apellido" => "Ignacio",
            "curso" => 1
        );

        $this->db->where("id",1);
        $this->db->update("profesores",$array);

    }


}
