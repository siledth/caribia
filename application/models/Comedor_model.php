<?php
class Comedor_model extends CI_model {

   
    public function consultar_comensales(){
        $this->db->select('c.id_comensales,c.id_und_adscripcion, c.id_cargo, c.nombre as comensales, c.autorizado');
      
        $query = $this->db->get('public.comensales c');
         return $response = $query->result_array();
         
    }
    public function consulta_adscrito(){
        $this->db->select('*');
        $query = $this->db->get('public.und_adscripcion');
         return $response = $query->result_array();
    }


    ////////////////////////////
    public function listar_info($data){
        $this->db->select('p.nombre as descrp, r.nombre as cargo, b.id_cargo, r.tarifa, b.autorizado');
        $this->db->where('b.id_comensales', $data['comensales']);
        $this->db->join('public.und_adscripcion p', 'p.id_und_adscripcion = b.id_und_adscripcion', 'left');
        $this->db->join('public.cargo r', 'r.id_cargo = b.id_cargo', 'left');
        $query = $this->db->get('public.comensales b');
        return $query->row_array();
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

function registrar_comida($data,$data2)
{
    $this->db->select('max(e.id_comedor) as id1');
    $query1 = $this->db->get('public.comedor e');
    $response4 = $query1->row_array();
    $id1 = $response4['id1'] + 1 ;

    $data1 = array(
        'id_comedor'		    => $id1,
        'id_comensales'		    => $data['id_comensales'],
        'und_adscripcion'		=> $data['und_adscripcion'],
        'cargo'		            => $data['cargo'],
        'tarifa'		        => $data['tarifa'],
        'total'                 => $data['total'],
        'invitado'              => $data['invitado'],
        'autorizado'		    => $data['autorizado'],
        'fecha_creacion'	 	            => $data['fecha'],
        'id_usuaio' 		    => $data['id_usuaio']

    );
    $quers =$this->db->insert("public.comedor", $data1);
    if ($quers){
        $data3 = array('autorizado' => 0);
        $this->db->where('id_comensales', $data['id_comensales']);
        $update = $this->db->update('public.comensales', $data3);
        
    }
    
    return true;


}
///////////////////consultar comedor
public function consultar_comedor(){
    $this->db->select('p.nombre as descrp, p.cedula, b.und_adscripcion');
    //$this->db->where('b.id_comensales', $data['comensales']);
    $this->db->join('public.comensales p', 'p.id_comensales = b.id_comensales', 'left');
   // $this->db->join('public.cargo r', 'r.id_cargo = b.id_cargo', 'left');
    $query = $this->db->get('public.comedor b');
    return $response = $query->result_array();

    
}
}