<?php

class Arquivos_model extends CI_Model
{
	public function inserir($dados)
	{
		$this->load->database();
		$this->db->insert('arquivos', $dados);
	}

	public function listar(){
		$this->load->database();
		$query = $this->db->get('arquivos');
         return $query->result();
	}

}
