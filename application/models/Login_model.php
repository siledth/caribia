<?php

class Login_model extends CI_model
{
    public function iniciar($usuario, $contrasena)
    {
        $this->db->select('f.*,
        c.id_perfil, c.menu_rnce, c.menu_progr, c.menu_eval_desem, c.menu_reg_eval_desem, c.menu_soli_anular_eval_desem, 
        c.menu_proc_anular_eval_desem, c.menu_comprobante_eval_desem, c.menu_estdi_eval_desem, 
        c.menu_noregi_eval_desem, c.menu_llamado, c.consultar_llamado, c.reg_llamado, anul_llamado, 
        c.ver_anul_llamado, c.ver_rnc, c.ver_conf, c.ver_parametro, 
        c.ver_conf_publ, c.ver_user, c.ver_user_exter, c.ver_user_desb, c.ver_user_lista, c.ver_user_perfil, c.menu_anulacion, c.menu_repor_evalu, c.certificacion, c.certi_externo, c.menu_certi');

        $this->db->from('seguridad.usuarios f');
        $this->db->join('seguridad.perfil c', 'c.id_perfil = f.perfil', 'left');
        $this->db->where('nombre', $usuario);
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            $id_estatus = $result->row('id_estatus');
            if ($id_estatus == 1) {
                $db_clave = $result->row('password');
                $unidad = $result->row('unidad');
                if (password_verify(base64_encode(hash('sha256', $contrasena, true)), $db_clave)) {
                    $this->db->set('intentos', 0);
                    $this->db->where('nombre', $usuario);
                    $this->db->update('seguridad.usuarios');
                    return $result->row_array();
                } else {
                    $intento = $result->row('intentos');
                    if ($intento <= 6) {
                        $intento = $intento + 1;
                        $this->db->set('intentos', $intento);
                        $this->db->where('nombre', $usuario);
                        $this->db->update('seguridad.usuarios');
                        return 'FALLIDO';
                    } else {
                        $this->db->set('id_estatus', 4);
                        $this->db->where('nombre', $usuario);
                        $this->db->update('seguridad.usuarios');
                        return 'FALLIDO';
                    }
                }
            } else {
                return 'BLOQUEADO';
            }
        } else {
            return 'FALSE';
        }
    }
    
    public function consultar_empresa($id_unidad)
    {
        $this->db->select('id, descripcion, rif');
        $this->db->where('rif', $id_unidad);
        $this->db->from('empresa');
        $result = $this->db->get();
        return $result->row_array();
    }


    public function consultar_organo($id_unidad)
    {
        $this->db->select('o.id_organo,
                               o.codigo,
                               o.cod_onapre,
                               concat(tr.desc_rif, \' - \' ,o.rif) as rif,
                               o.desc_organo');
        $this->db->join('tipo_rif tr', 'tr.id_rif = o.tipo_rif');
        $this->db->where('o.codigo', $id_unidad);
        $this->db->from('organos o');
        $result = $this->db->get();

        if ($result->num_rows() != 1) {
            $this->db->select('e.id_organo,
                                   e.id_entes,
                                   e.codigo,
                            	   e.rif,
                            	   e.desc_entes as desc_organo,
                            	   e.cod_onapre,
                            	   e.siglas,
                            	   e.direccion_fiscal');
            $this->db->where('e.codigo', $id_unidad);
            $this->db->from('entes e');
            $result = $this->db->get();

            if ($result->num_rows() != 1) {
                $this->db->select('ea.id_entes,
                                       ea.id_entes_ads,
                                       ea.codigo,
                                       ea.rif,
                                       ea.desc_entes_ads as desc_organo,
                                       ea.cod_onapre,
                                       ea.siglas,
                                       ea.direccion_fiscal');
                $this->db->where('ea.codigo', $id_unidad);
                $this->db->from('entes_ads ea');
                $result = $this->db->get();
                return $result->row_array();
            } else {
                return $result->row_array();
            }
        } else {
            return $result->row_array();
        }
    }

    public function cambiar_clave($id_usuario, $data)
    {
        $this->db->where('id', $id_usuario);
        $update = $this->db->update('seguridad.usuarios', $data);
        return $update;
    }
    public function guardar_prp($inf_usu, $inf_prop, $if_emp)
    {
        $this->db->select('max(e.id_entes) as id');
        $query = $this->db->get('public.entes e');
        $response3 = $query->row_array();
        $id = $response3['id'] + 1 ;
        $data = array(
                'id'		    => $id,
                'nombre'		=> $inf_usu['nombre'],
                'password'		=> $inf_usu['password'],
                'email'		=> $inf_usu['email'],
                'perfil'            => 8,
                'foto'            => 1,
                'estado'            => 1,

                'ultimo_login'            => $inf_usu['ultimo_login'],
                'fecha'		=> $inf_usu['fecha'],
                'intentos'	 	=> $inf_usu['intentos'],
                'unidad' 			=> $inf_usu['unidad'],
                'fecha_update' 			=> $inf_usu['fecha_update'],
                'id_estatus' 			=> $inf_usu['id_estatus'],
                'rif_organoente' 			=> $inf_usu['rif_organoente'],

            );
            $quers =$this->db->insert("seguridad.usuarios", $data); //colo nombre de la tabla
            if ($quers) { 
            $id = $id;
           
            $data2 = array(
                'id_usuario'		    => $id,
                'id'		    => $id,
                'nombrefun'		=> $inf_prop['nombrefun'],

                'apellido'		=> $inf_prop['nombrefun'],
                'cedula'	 	=> $inf_prop['cedula'],
                'email' 			=> $inf_prop['email'],
                'fecha'          => $inf_prop['fecha'],
            );
           
            $this->db->insert('seguridad.funcionarios', $data2);
            $id = $id;
            $data3 = array(
                'id_entes'		    => $id,

                'id_organo'		=> 0,
                'rif'		=> $if_emp['rif'],
                'codigo'		=> $if_emp['codigo'],
                'desc_entes'	 	=> $if_emp['desc_entes'],
                'correo' 			=> $if_emp['correo'],
                'usuario'          => $id,
                'fecha'          => $if_emp['fecha'],
            );

            $this->db->insert('public.entes', $data3);   
            return true;      
        }
       
    }
    public function valida_correo($email){
        $this->db->select('nombre');
        $this->db->where('nombre ', $email);
        //$this->db->order_by('id desc');
        $query = $this->db->get('seguridad.usuarios');
        $response = $query->row_array();
        return $response;
    }
    public function valida_ced($cedula_prop){
        $this->db->select('codigo');
        $this->db->where('codigo ', $cedula_prop);
        //$this->db->order_by('id desc');
        $query = $this->db->get('public.entes');
        $response = $query->row_array();
        return $response;
    }


}

?>