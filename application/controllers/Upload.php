<?php

defined('BASEPATH') or exit('No direct script acess allowed');

class Upload extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


	public function index()
	{
		$this->load->view('partes/header');
		$this->load->view('upload/index');
		$this->load->view('partes/footer');
	}

	public function subir()
	{
		$nome = $this->input->post('nome');
		$arquivo = $_FILES['arquivo'];

		log_message('error', json_encode($_FILES));

		$trim = trim($nome);
		$config = array(
			"upload_path" => "public/upload",
			"allowed_types" => "pdf|zip",
			"file_name" => rand(1, 98769) . $trim . '.pdf',
			"max_size" => "30000"
		);

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload('arquivo') == true) {

			$error = array('error' => $this->upload->display_errors());

			$this->load->library('zip');
			$this->zip->add_data('public/upload/' .$config['file_name']);
			$this->zip->archive('public/upload/' .$config['file_name'].'.zip');

			$this->load->view('upload_form', $error);

			$dados = array(
				"nome" => $nome,
				"arquivo" => $config['file_name'],
				"zip" => $config['file_name'] . '.zip'
			);

			$this->load->model('arquivos_model');
			$this->arquivos_model->inserir($dados);

			echo "Arquivo Upado";
		} else {
			echo $this->upload->display_errors();

			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}
