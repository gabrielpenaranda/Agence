<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CaoUsuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function usuarios_activos()
    {
        $this->db->select('*');
        $this->db->from('cao_usuario');
        $this->db->join('permissao_sistema', 'permissao_sistema.co_usuario=cao_usuario.co_usuario');
        $this->db->where('permissao_sistema.in_ativo', 'S');
        $this->db->where('permissao_sistema.co_sistema', '1');
        $this->db->where('permissao_sistema.co_tipo_usuario', '0');
        $this->db->or_where('permissao_sistema.co_tipo_usuario', '1');
        $this->db->or_where('permissao_sistema.co_tipo_usuario', '2');
        $this->db->order_by('cao_usuario.no_usuario', 'asc');
        $usuarios_activos = $this->db->get();
        if ($usuarios_activos->num_rows() > 0) {
          return $usuarios_activos;
        } else {
      }
    }

}
