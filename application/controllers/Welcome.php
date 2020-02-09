<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('upload');
//		$this->load->model('admin_model');
		$this->load->model('pages_model');
	}

	public function login(){
		$this->session->unset_userdata('error_msg');
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		if($this->pages_model->aut_login($user, $pass))
		{
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/index');
			$this->load->view('template/foot');
		}else{
			$this->load->view('pages/login');
		}

	}

	public function edit_user(){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log)
		{
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/edit_user', $user_data_array);
			$this->load->view('template/foot');
		}else{
			redirect(base_url());
		}
	}

	public function erro_login(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('pass');
		$this->session->set_userdata('error_msg', 'Dados inseridos inválidos');
		$this->load->view('pages/login');
	}

	public function autenticate(){
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$query = $this->pages_model->aut_login($user, $pass);
		if($query){
			$this->session->set_userdata('user', $query->usuario);
			$this->session->set_userdata('pass', $query->senha);
			redirect(base_url());
		}else{
			redirect(base_url("invalid"));
		}
	}

	public function index()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('pass');
		redirect(base_url());
	}

	public function imoveis()
	{
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log){
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$data = array(
				'imoveis' => $this->pages_model->consulta_imoveis(),
				'fotos' => $this->pages_model->consulta_fotos()
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/imoveis', $data);
			$this->load->view('template/foot');
		}else{
			redirect(base_url());
		}
	}

	public function add_images($id_imovel_false){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$id_imovel = $id_imovel_false - 1000;
		$user_data_array = array(
			'user_data' => $this->pages_model->aut_login($user, $pass)
		);
		$data = array(
			'fotos' => $this->pages_model->consulta_fotos($id_imovel),
			'imovel' => $id_imovel
		);
		$this->load->view('template/head');
		$this->load->view('template/leftnav', $user_data_array);
		$this->load->view('template/topnav', $user_data_array);
		$this->load->view('pages/add_fotos', $data);
		$this->load->view('template/foot');
	}

	public function processamento_status($id){
		$status = $this->input->post('status-imovel');
		echo $status;
		if($status == "active"){
			$status = "inactive";
		}else{
			$status = "active";
		}
		$data = array(
			'id_imovel' => $id,
			'status' => $status
		);
		$this->pages_model->change_status($data);
		redirect('imoveis');
	}

	public function bookpost_cliente($emp_insta)
	{
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		if ($user && $pass) {
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$data = array(
				'emp_insta' => $this->pages_model->consulta_empresas($emp_insta),
				'posts' => $this->pages_model->consulta_posts_cliente($emp_insta),
				'rs' => $this->pages_model->consultas_rs_cliente($emp_insta),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/bookpost_cliente', $data);
			$this->load->view('template/foot', $data);
		}
	}

	public function add_post($emp_insta){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log->id_emp == 0){
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$data = array(
				'emp' => $this->pages_model->consulta_empresas($emp_insta)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/add_post', $data);
			$this->load->view('template/foot');
		}
		else{
			redirect(base_url());
		}
	}

	public function edit_post($emp_insta, $id){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log->id_emp == 0){
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$data = array(
				'emp' => $this->pages_model->consulta_empresas($emp_insta),
				'post' => $this->pages_model->consulta_id_post($this->pages_model->consulta_empresas($emp_insta)->id_emp * 1000 + $id),
				'rs' => $this->pages_model->consultas_rs_id($this->pages_model->consulta_empresas($emp_insta)->id_emp * 1000 + $id),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/edit_post', $data);
			$this->load->view('template/foot');
		}else{
			redirect(base_url());
		}
	}

	public function edit_post_cliente($emp_insta, $id){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		if ($user && $pass) {
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$data = array(
				'emp' => $this->pages_model->consulta_empresas($emp_insta),
				'post' => $this->pages_model->consulta_id_post_cliente($this->pages_model->consulta_empresas($emp_insta)->id_emp * 1000 + $id),
				'rs' => $this->pages_model->consultas_rs_id_cliente($this->pages_model->consulta_empresas($emp_insta)->id_emp * 1000 + $id)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/edit_post_cliente', $data);
			$this->load->view('template/foot');
		}
	}

	public function processamento(){
		$radical_emp = $this->input->post('id_emp');
		$id_post = $radical_emp*1000 + 1;
		while ($this->pages_model->consulta_id_post($id_post)){
			$id_post++;
		}
		$id_post_cliente = $radical_emp*1000 + 1;
		while ($this->pages_model->consulta_id_post($id_post_cliente)){
			$id_post_cliente++;
		}
		$date_post = $this->input->post('date_post');
		$link = $this->input->post('link');
		$post = $this->input->post('post');
		$texto = $this->input->post('texto');
		$comentarios = $this->input->post('comentarios');
		$nome_arquivo = substr($this->input->post('nome_arquivo'), 12);
		$rs = $this->input->post('rs');
		$empresa = $this->pages_model->consulta_id_empresas($radical_emp)->user_insta;
		$target_dir = './static/uploads/'.$empresa;
		$instagram = 0;
		$youtube = 0;
		$facebook = 0;


		if(!file_exists($target_dir)){
			mkdir($target_dir,0777);
		}
		$config['upload_path']          = $target_dir;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->upload->initialize($config);
		$this->upload->do_upload('userfile');

//		if ( ! $this->upload->do_upload('userfile'))
//		{
//			$errors = array('error' => $this->upload->display_errors());
//
//			foreach ($errors as $error){
//				echo $error;
//			}
//		}
//		else
//		{
//			$data = array('upload_data' => $this->upload->data());
//
//			echo "sucesso<br>";
//			echo $this->input->post('nome_arquivo').'<br>';
//			echo $nome_arquivo;
//		}
		$data = array(

			'id_post' => $id_post,
			'id_emp' =>  $radical_emp,
			'data_publicacao' => $date_post,
			'img_post' => $nome_arquivo,
			'post_details' => $post,
			'post_text' => $texto,
			'post_coments' => $comentarios,
			'link_briefing' => $link,
			'status' => 'nsee',

		);

		$data_2 = array(

			'id_post_cliente' => $id_post_cliente,
			'id_emp' =>  $radical_emp,
			'data_publicacao' => $date_post,
			'img_post' => $nome_arquivo,
			'post_details' => $post,
			'post_text' => $texto,
			'post_coments' => $comentarios,
			'link_briefing' => $link,
			'status' => 'nsee',

		);
		switch (strlen($rs)){
			case 1 :
				if($rs[0] == 1){
					$instagram = "instagram";
				}
				break;
			case 2:
				if($rs[0] == 1){
					$facebook = "facebook";

				}
				if ($rs[1] == 1){
					$instagram = "instagram";
				}
				break;
			case 3:
				if($rs[0] == 1){
					$youtube = "youtube";
				}
				if ($rs[1] == 1){
					$facebook = "facebook";
				}
				if ($rs[2] == 1){
					$instagram = "instagram";
				}
		}
		$this->pages_model->add_post($data);
		$this->pages_model->add_post_cliente($data_2);
		$this->pages_model->add_rs($id_post,$instagram, $facebook, $youtube);
		$this->pages_model->add_rs_cliente($id_post,$instagram, $facebook, $youtube);
		redirect(base_url($empresa.'/'.'bookpost'));

	}


	public function processamento_imgs(){
		$num_imgs = $this->input->post('num_imgs');
		$id_imovel = $this->input->post('id_imovel');
		$target_dir = './static/uploads/'.$id_imovel;
		for($i = 1; $i<=$num_imgs; $i++){
			$nome_arquivo = substr($this->input->post('nome_arquivo_'.$i), 12);
			if(!file_exists($target_dir)){
				mkdir($target_dir,0777);
			}
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['max_width']            = 2000;
			$config['max_height']           = 2000;
			$this->upload->initialize($config);
			$this->upload->do_upload('userfile_'.$i);
			$data = array(
				'id_foto' => '',
				'nome_foto' =>  $nome_arquivo,
				'id_imovel' => $id_imovel,
			);
			$this->pages_model->add_fotos($data);
		}

//		if ( ! $this->upload->do_upload('userfile'))
//		{
//			$errors = array('error' => $this->upload->display_errors());
//
//			foreach ($errors as $error){
//				echo $error;
//			}
//		}
//		else
//		{
//			$data = array('upload_data' => $this->upload->data());
//
//			echo "sucesso<br>";
//			echo $this->input->post('nome_arquivo').'<br>';
//			echo $nome_arquivo;
//		}

	}

	public function processamento_edit_cliente(){
		$radical_emp = $this->input->post('id_emp');
		$id_post = $this->input->post('id_post');
		$date_post = $this->input->post('date_post');
		$link = $this->input->post('link');
		$post = $this->input->post('post');
		$texto = $this->input->post('texto');
		$comentarios = $this->input->post('comentarios');
		$nome_arquivo = substr($this->input->post('nome_arquivo'), 12);
		$rs = $this->input->post('rs');
		$last_edit = $this->input->post('user_change');
		$empresa = $this->pages_model->consulta_id_empresas($radical_emp)->user_insta;
		$target_dir = './static/uploads/'.$empresa;
		$instagram = 0;
		$youtube = 0;
		$facebook = 0;


		if(!file_exists($target_dir)){
			mkdir($target_dir,0777);
		}
		$config['upload_path']          = $target_dir;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->upload->initialize($config);
		$this->upload->do_upload('userfile');

//		if ( ! $this->upload->do_upload('userfile'))
//		{
//			$errors = array('error' => $this->upload->display_errors());
//
//			foreach ($errors as $error){
//				echo $error;
//			}
//		}
//		else
//		{
//			$data = array('upload_data' => $this->upload->data());
//
//			echo "sucesso<br>";
//			echo $this->input->post('nome_arquivo').'<br>';
//			echo $nome_arquivo;
//		}
		$data = array(

			'id_post_cliente' => $id_post,
			'id_emp' =>  $radical_emp,
			'data_publicacao' => $date_post,
			'img_post' => $nome_arquivo,
			'post_details' => $post,
			'post_text' => $texto,
			'post_coments' => $comentarios,
			'link_briefing' => $link,
			'status' => 'nsee',
			'last_edit' => $last_edit

		);
		switch (strlen($rs)){
			case 1 :
				if($rs[0] == 1){
					$instagram = "instagram";
				}
				break;
			case 2:
				if($rs[0] == 1){
					$facebook = "facebook";

				}
				if ($rs[1] == 1){
					$instagram = "instagram";
				}
				break;
			case 3:
				if($rs[0] == 1){
					$youtube = "youtube";
				}
				if ($rs[1] == 1){
					$facebook = "facebook";
				}
				if ($rs[2] == 1){
					$instagram = "instagram";
				}
		}

		$this->pages_model->edit_post_cliente($data);
		$this->pages_model->add_rs_cliente($id_post,$instagram, $facebook, $youtube);
		redirect(base_url($empresa.'/'.'bookpost_cliente'));

	}

	public function delete_post($emp, $post){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log->id_emp == 0) {
			$data = array(
				'id_post' => $this->pages_model->consulta_empresas($emp)->id_emp * 1000 + $post
			);
			$this->pages_model->delete_post($data);
		}
		redirect(base_url($emp."/bookpost"));
	}

	public function change_status($emp){
		$id_post = $this->input->post('id_post_s');
		$status = $this->input->post('status');
		$last_status_mod = $this->input->post('user_change');
		$data = array(
			'id_post' => $id_post,
			'status' => $status,
			'last_status_mod' => $last_status_mod
		);
		$this->pages_model->change_status($data);
//		echo $data['status'].'<br><a href="http://localhost/bookpost_convence/artsoldasobraloficial/bookpost"><button>voltar</button></a>';
		redirect(base_url($emp."/bookpost"));
	}

	public function change_status_cliente($emp){
		$id_post = $this->input->post('id_post_s');
		$status = $this->input->post('status');
		$last_status_mod = $this->input->post('user_change');
		$data = array(
			'id_post_cliente' => $id_post,
			'status' => $status,
			'last_status_mod' => $last_status_mod
		);
		$this->pages_model->change_status_cliente($data);
//		echo $data['status'].'<br><a href="http://localhost/bookpost_convence/artsoldasobraloficial/bookpost"><button>voltar</button></a>';
		redirect(base_url($emp."/bookpost_cliente"));
	}

	public function add_bookpost()
	{
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log->id_emp == 0){
			$emps = array(
				'emps' => $this->pages_model->consulta_empresas(),
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$user_data_array = array(
				'user_data' => $this->pages_model->aut_login($user, $pass)
			);
			$this->load->view('template/head');
			$this->load->view('template/leftnav', $emps);
			$this->load->view('template/topnav', $user_data_array);
			$this->load->view('pages/add_bookpost', $user_data_array);
			$this->load->view('template/foot');
		}else{
			redirect(base_url());
		}
	}

	public function processamento_bookpost(){
		$usuario_insta = $this->input->post('usuario_insta');
		$nome_empresa = $this->input->post('nome_empresa');
		$apelido = $this->input->post('apelido');
		$bio = $this->input->post('bio');
		$link = $this->input->post('link');
		$nome_arquivo = substr($this->input->post('nome_arquivo'), 12);
		$target_dir = './static/uploads/'.$usuario_insta;

		if(!file_exists($target_dir)){
			mkdir($target_dir,0777);
		}
		$config['upload_path']          = $target_dir;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->upload->initialize($config);
		$this->upload->do_upload('userfile');

		$data = array(

			'user_insta' => $usuario_insta,
			'nome_empresa' =>  $nome_empresa,
			'apelido' => $apelido,
			'bio' => $bio,
			'site' => $link,
			'foto_perfil' => $nome_arquivo

		);

		$this->pages_model->add_bookpost($data);
		redirect(base_url());
	}


	public function processamento_user(){
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$nome = $this->input->post('nome');

		$data = array(

			'usuario' => $user,

		);
		if($pass){
			$data['senha'] = $pass;
		}
		if($nome){
			$data['nome_user'] = $nome;
		}
		$this->pages_model->edit_user($data);

		redirect(base_url('login'));
	}

	public function delete_bookpost($bookpost){
		$user = $this->session->userdata('user');
		$pass = $this->session->userdata('pass');
		$user_log = $this->pages_model->aut_login($user, $pass);
		if($user_log->id_emp == 0) {
			$this->pages_model->delete_bookpost($bookpost);
		}
		redirect(base_url());
	}
}
