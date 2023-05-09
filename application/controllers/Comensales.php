<?php

defined('BASEPATH') or exit('No direct script access allowed');

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



    public function registrar_b()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data = array(
            'cedula' => $this->input->POST('cedula'),
            'nombre' => $this->input->POST('nombre'),
            'id_und_adscripcion' => $this->input->POST('id_und_adscripcion'),
            'id_cargo' => $this->input->POST('id_cargo'),
            'autorizado' => 0,
            'id_usuaio' => $this->session->userdata('id_user'),
            // 'fecha_creacion' => date("Y-m-d"),
        );
        $data = $this->Comensales_model->registrar_b($data);
        echo json_encode($data);
    }
        //LLENAR MODAL PARA EDITAR
        public function consulta_b()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = $this->input->post();
            $data = $this->Comensales_model->consulta_b($data);
            echo json_encode($data);
        }

        //EDITAR
        public function editar_b()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
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
        public function eliminar_b()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
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

        public function registrar_carg()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
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
        public function consulta_cargos()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = $this->input->post();
            $data = $this->Comensales_model->consulta_car($data);
            echo json_encode($data);
        }

        //EDITAR
        public function editar_cargos()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = $this->input->post();

            $data = array(
                'id_cargo' => $data['id_cargo'],
                'nombre' => $data['nombre'],
                'tarifa' => $data['tarifa'],
                'id_usuaio' => $this->session->userdata('id_user')
            );

            $data = $this->Comensales_model->editar_cargos($data);
            echo json_encode($data);
        }

        //ELIMINAR
        public function eliminar_cargos()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = $this->input->post();
            $data = $this->Comensales_model->eliminar_cargos($data);
            echo json_encode($data);
        }

        /////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////registro de Unidad de Adscripción


        public function registrar_und()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            // $data['contratista'] =	$this->Comensales_model->llenar_contratista_exonerado();

            $data['cargo'] 	 = $this->Comensales_model->consulta_adscrito();

            $usuario = $this->session->userdata('id_user');
            $this->load->view('templates/header.php');
            $this->load->view('templates/navigator.php');
            $this->load->view('administrador/cargo_und/registro_und.php', $data);
            $this->load->view('templates/footer.php');
        }

        public function registrar_undd()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = array(
                
                'nombre' => $this->input->POST('nombre'),
                'id_usuaio' => $this->session->userdata('id_user'),
                'fecha_creacion' => date("Y-m-d"),
                'fecha_update' => date("Y-m-d"),
            );
            $data = $this->Comensales_model->registrar_undd($data);
            echo json_encode($data);
        }
        //LLENAR MODAL PARA EDITAR
        public function consulta_und()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = $this->input->post();
            $data = $this->Comensales_model->consulta_car($data);
            echo json_encode($data);
        }

        //EDITAR
        public function editar_und()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            $data = $this->input->post();

            $data = array(
                'id_exonerado' => $data['id_banco'],
                'rif' => $data['codigo_b'],
                'descripcion' => $data['nombre_b'],
                'id_usuaio' => $this->session->userdata('id_user')
            );

            $data = $this->Comensales_model->editar_und($data);
            echo json_encode($data);
        }


    //////////////////////////////////////////////////////////////////////////////////////////////Autorizacion - apoyo
        public function registrar_apoyo()
        {
            if (!$this->session->userdata('session')) {
                redirect('login');
            }
            // $data['contratista'] =	$this->Comensales_model->llenar_contratista_exonerado();
            $data['comensales'] = $this->Comensales_model->consultar_comensales1();
            $data['cargo'] 	 = $this->Comensales_model->consulta_cargos();
            $data['adscrito'] 	 = $this->Comensales_model->consulta_adscrito();
            $usuario = $this->session->userdata('id_user');
            $this->load->view('templates/header.php');
            $this->load->view('templates/navigator.php');
            $this->load->view('administrador/autorizaciones/autorizacion.php', $data);
            $this->load->view('templates/footer.php');
        }
    //LLENAR MODAL PARA EDITAR
    public function consulta_autoriza()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data = $this->input->post();
        $data = $this->Comensales_model->consulta_autoriz($data);
        echo json_encode($data);
    }
    public function editar_autoriza()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data = $this->input->post();

        $data = array(
            'id_comensales' => $data['cedula'],
            'autorizado' => $data['autorizado'],
            'observacion' => $data['observacion'],
            'id_usuaio' => $this->session->userdata('id_user')
        );

        $data = $this->Comensales_model->editar_autoriza($data);
        echo json_encode($data);
    }

   //LLENAR MODAL PARA EDITAR comensal
   public function edi()
   {
       if (!$this->session->userdata('session')) {
           redirect('login');
       }
       $data = $this->input->post();
       $data = $this->Comensales_model->consulta_acomensales($data);
       echo json_encode($data);
   }

   public function comensal_editar() // para editar los usuarios
   {if(!$this->session->userdata('session')) {
       redirect('login');
   }
       //$id = $this->input->get('id');
       $data['id']  = $this->input->get('id');
       $data['time']=date("d-m-Y");

       $data['ver_comensales'] =$this->Comensales_model->single_comensal($data['id']);
     //  $data['ver_perfil'] = $this->User_model->consultar_perfiles(); //consultar todos los perfiles
       $data['cargo'] 	 = $this->Comensales_model->consulta_cargos();
       $this->load->view('templates/header.php');
       $this->load->view('templates/navigator.php');
       $this->load->view('administrador/comensales/modi_cargo.php', $data);
       $this->load->view('templates/footer.php');
   }
   /////////////////////este modifica comensales
   public function modi_comensales1()
{
    if(!$this->session->userdata('session')) {
        redirect('login');
    }

    $id = $this->input->post("id_comensales");
    $nombre = $this->input->post("nombre");
    $cedula = $this->input->post("cedula");
    $id_cargo = $this->input->post("id_cargo");
    $id_und_adscripcion = $this->input->post("id_und_adscripcion");

    $usua = array(
        "id_comensales"  => $id,
        "nombre"   => $nombre,
        "cedula"   => $cedula,
        "id_cargo"   => $id_cargo,
        "id_und_adscripcion"   => $id_und_adscripcion
    );
    $data = $this->Comensales_model->editar_modi_comensales($usua, $id);

    if ($data) {
        $this->session->set_flashdata('sa-success2', 'Se guardo los datos correctamente');
        redirect('Comensales/registrar_comensales');
    } else {
        $this->session->set_flashdata('sa-error', 'error');
        redirect('Comensales/registrar_comensales');
    }
}

}
