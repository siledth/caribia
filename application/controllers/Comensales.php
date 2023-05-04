<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comensales extends CI_Controller
{
   
    public function registrar_comensales()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
       // $data['contratista'] =	$this->Comensales_model->llenar_contratista_exonerado();
        $data['comensales'] = $this->Comensales_model->consultar_comensales();
        $data['cargo'] 	 = $this->Comensales_model->consulta_cargos();
        $data['adscrito'] 	 = $this->Comensales_model->consulta_adscrito();
        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('administrador/comensales/registro_comensales.php', $data);
        $this->load->view('templates/footer.php');
    }
  


    public function registrar_b() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = array(
            'cedula' => $this->input->POST('cedula'),
            'nombre' => $this->input->POST('nombre'),
            'id_und_adscripcion' => $this->input->POST('id_und_adscripcion'),
            'id_cargo' => $this->input->POST('id_cargo'),
            'id_usuaio' => $this->session->userdata('id_user'),
            // 'fecha_creacion' => date("Y-m-d"), 
        );
        $data = $this->Comensales_model->registrar_b($data);
        echo json_encode($data);
    }
     //LLENAR MODAL PARA EDITAR
     public function consulta_b() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Comensales_model->consulta_b($data);
        echo json_encode($data);
    }

    //EDITAR
    public function editar_b() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();

        $data = array(
            'id_exonerado' => $data['id_banco'],
            'rif' => $data['codigo_b'],
            'descripcion' => $data['nombre_b'],
            'id_usuaio' => $this->session->userdata('id_user')
        );

        $data = $this->Comensales_model->editar_b($data);
        echo json_encode($data);
    }

    //ELIMINAR
    public function eliminar_b() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Comensales_model->eliminar_b($data);
        echo json_encode($data);
    }
  //////////////////////////cargos
    public function registrar_cargos()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
       // $data['contratista'] =	$this->Comensales_model->llenar_contratista_exonerado();
       
        $data['cargo'] 	 = $this->Comensales_model->consulta_cargos();
      
        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('administrador/cargo_und/registro_cargo.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function registrar_carg() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = array(
            'tarifa' => $this->input->POST('tarifa'),
            'nombre' => $this->input->POST('nombre'),
            'id_usuaio' => $this->session->userdata('id_user'),
            'fecha_creacion' => date("Y-m-d"), 
            'fecha_update' => date("Y-m-d"),
        );
        $data = $this->Comensales_model->registrar_carg($data);
        echo json_encode($data);
    }
     //LLENAR MODAL PARA EDITAR
     public function consulta_cargos() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Comensales_model->consulta_car($data);
        echo json_encode($data);
    }

    //EDITAR
    public function editar_cargos() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();

        $data = array(
            'id_exonerado' => $data['id_banco'],
            'rif' => $data['codigo_b'],
            'descripcion' => $data['nombre_b'],
            'id_usuaio' => $this->session->userdata('id_user')
        );

        $data = $this->Comensales_model->editar_cargos($data);
        echo json_encode($data);
    }

    //ELIMINAR
    public function eliminar_cargos() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Comensales_model->eliminar_cargos($data);
        echo json_encode($data);
    }
   

   
}