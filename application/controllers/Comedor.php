<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comedor extends CI_Controller
{
   
    public function registrar_comidas()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
       // $data['contratista'] =	$this->Comensales_model->llenar_contratista_exonerado();
        $data['comensales'] = $this->Comedor_model->consultar_comensales();
        $data['comedor'] = $this->Comedor_model->consultar_comedor();
        $data['cargo'] 	 = $this->Comensales_model->consulta_cargos();
        $data['adscrito'] 	 = $this->Comensales_model->consulta_adscrito();
        $data['time']=date("d-m-Y");
        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('administrador/comedor/registro_comida.php', $data);
        $this->load->view('templates/footer.php');
    }
  
    public function listar_info(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Comedor_model->listar_info($data);
        echo json_encode($data);
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
  
   ///////////////////////////////////////////
    public function registrar_comedor() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = array(
            'id_comensales' => $this->input->POST('comensales'),
            'und_adscripcion' => $this->input->POST('id_und_adscripcion'),
            'cargo' => $this->input->POST('id_cargo'),
            'tarifa' => $this->input->POST('tarifa'),
            'total' => $this->input->POST('total'),
            'invitado' => $this->input->POST('invitado'),
            'autorizado' => $this->input->POST('autorizado'),
            'fecha' => $this->input->POST('fecha'),
            'id_usuaio' => $this->session->userdata('id_user'),
            // 'fecha_creacion' => date("Y-m-d"), 
        );
        $data2 = array(
            'autorizado' => 0,
        
            // 'fecha_creacion' => date("Y-m-d"), 
        );
        $data = $this->Comedor_model->registrar_comida($data,$data2);
        echo json_encode($data);
    }
   
}