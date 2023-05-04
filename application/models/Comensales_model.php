<?php
class Comensales_model extends CI_model {
    function consultar_comensales(){
        $this->db->select('c.*, un.nombre as descrip');
        $this->db->join('public.und_adscripcion un', 'un.id_und_adscripcion = c.id_und_adscripcion' );    
        $this->db->from('public.comensales c');
    
       // $this->db->order_by("codigo_b", "Asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function consulta_cargos(){
        $this->db->select('*');
        $query = $this->db->get('public.cargo');
         return $response = $query->result_array();
    }
    public function consulta_adscrito(){
        $this->db->select('*');
        $query = $this->db->get('public.und_adscripcion');
         return $response = $query->result_array();
    }
    
    //GUARDAR
    function registrar_b($data){
        $this->db->insert('public.comensales',$data);
        return true;
    }
    //VER PARA EDITAR
    function consulta_b($data){
        $this->db->select('*');
        $this->db->from('certificacion.exonerado');
        $this->db->where('id_exonerado', $data['id_exonerado']);
       // $this->db->order_by("codigo_b", "Asc");
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    //EDITAR
    function editar_b($data){
        $this->db->where('id_exonerado', $data['id_exonerado']);
        $update = $this->db->update('certificacion.exonerado', $data);
        return true;
    }
    //ELIMAR
    function eliminar_b($data){
        $this->db->where('id_exonerado', $data['id_exonerado']);
        $query = $this->db->delete('certificacion.exonerado');
        return true;
    }


    /////////////////////GUARDAR CARGos
    function registrar_carg($data){
        $this->db->select('max(e.id_cargo) as id1');
        $query1 = $this->db->get('public.cargo e');
        $response4 = $query1->row_array();
        $id1 = $response4['id1'] + 1;  
        $data1 = array(
            'id_cargo'		    => $id1,
            'nombre'		=> $data['nombre'],
            'fecha_creacion'		=> $data['fecha_creacion'],
            'fecha_update'		    => $data['fecha_update'],
            'id_usuaio'        => $data['id_usuaio'],
            
            'tarifa'        => $data['tarifa'],
         

        );
        $quers =$this->db->insert("public.cargo", $data1);

        return true;
    }
    //VER PARA EDITAR
    function consulta_car($data){
        $this->db->select('*');
        $this->db->from('public.cargo');
        $this->db->where('id_cargo', $data['id_cargo']);
       // $this->db->order_by("codigo_b", "Asc");
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    //EDITAR
    function editar_cargos($data){
        $this->db->where('id_cargo', $data['id_cargo']);
        $update = $this->db->update('public.cargo', $data);
        return true;
    }
    //ELIMAR
    function eliminar_cargos($data){
        $this->db->where('id_cargo', $data['id_cargo']);
        $query = $this->db->delete('public.cargo');
        return true;
    }
}