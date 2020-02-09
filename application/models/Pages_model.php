<?php
class pages_model extends CI_Model
{

	//Conectar ao banco de dados
	public function __construct()
	{
		$this->load->database();
	}


	public function consulta_empresas($emp = null){
		if(!$emp){
			$query = $this->db->query('SELECT * FROM empresas');
			return $query->result();
		}
		$query = $this->db->get_where('empresas', array('user_insta' => $emp));
		return $query->row();
	}

	public function consulta_posts($emp){
		$query = $this->db->query('SELECT * FROM post NATURAL JOIN empresas WHERE user_insta = "'.$emp.'" ORDER BY post.id_post DESC;');
		return $query->result();
	}

	public function consulta_posts_cliente($emp){
		$query = $this->db->query('SELECT * FROM post_client NATURAL JOIN empresas WHERE user_insta = "'.$emp.'" ORDER BY post_client.id_post_cliente DESC;');
		return $query->result();
	}

	public function consultas_rs($emp){
		$query = $this->db->query('SELECT * FROM post_has_social NATURAL JOIN post NATURAL JOIN empresas WHERE user_insta = "'.$emp.'";');
		return $query->result();
	}

	public function consultas_rs_cliente($emp){
		$query = $this->db->query('SELECT * FROM post_has_social_cliente NATURAL JOIN post_client NATURAL JOIN empresas WHERE user_insta = "'.$emp.'";');
		return $query->result();
	}

	public function consultas_rs_id($id_post){
		$query = $this->db->query('SELECT * FROM post_has_social NATURAL JOIN post NATURAL JOIN empresas WHERE id_post = "'.$id_post.'";');
		return $query->result();
	}

	public function consultas_rs_id_cliente($id_post){
		$query = $this->db->query('SELECT * FROM post_has_social NATURAL JOIN post_client NATURAL JOIN empresas WHERE id_post = "'.$id_post.'";');
		return $query->result();
	}

	public function consulta_id_empresas($emp){
		$query = $this->db->get_where('empresas', array('id_emp' => $emp));
		return $query->row();
	}

	public function consulta_id_post($id){
		$query = $this->db->get_where('post', array('id_post' => $id));
		return $query->row();
	}

	public function consulta_id_post_cliente($id){
		$query = $this->db->get_where('post_client', array('id_post_cliente' => $id));
		return $query->row();
	}

	public function add_post($data){
		$this->db->insert('post', $data);
	}

	public function add_post_cliente($data){
		$this->db->insert('post_client', $data);
	}

	public function add_rs($post_id, $instagram, $facebook, $youtube){
		if($instagram){
			$data = array(
				'nome' => $instagram,
				'id_post' => $post_id
			);
			$this->db->insert('post_has_social', $data);
		}
		if($facebook){
			$data = array(
				'nome' => $facebook,
				'id_post' => $post_id
			);
			$this->db->insert('post_has_social', $data);
		}
		if ($youtube){
			$data = array(
				'nome' => $youtube,
				'id_post' => $post_id
			);
			$this->db->insert('post_has_social', $data);
		}
	}

	public function add_rs_cliente($post_id, $instagram, $facebook, $youtube){
		if($instagram){
			$data = array(
				'nome' => $instagram,
				'id_post_cliente' => $post_id
			);
			$this->db->insert('post_has_social_cliente', $data);
		}
		if($facebook){
			$data = array(
				'nome' => $facebook,
				'id_post_cliente' => $post_id
			);
			$this->db->insert('post_has_social_cliente', $data);
		}
		if ($youtube){
			$data = array(
				'nome' => $youtube,
				'id_post_cliente' => $post_id
			);
			$this->db->insert('post_has_social_cliente', $data);
		}
	}

	public function delete_post($data){
		$this->db->delete('post_has_social', $data);
		$this->db->delete('post', $data);
	}

	public function delete_post_cliente($data){
		$this->db->delete('post_has_social_cliente', $data);
		$this->db->delete('post_client', $data);
	}

	public function edit_post($data){
		$id = $data['id_post'];
		$data_2 = array(
			'id_post' => $id
		);
		$this->delete_post($data_2);
		$this->add_post($data);
	}

	public function edit_post_cliente($data){
		$id = $data['id_post_cliente'];
		$data_2 = array(
			'id_post_cliente' => $id
		);
		$this->delete_post_cliente($data_2);
		$this->add_post_cliente($data);
	}

	public function change_status($data){

		$this->db->where('id_imovel', $data['id_imovel']);
		$this->db->update('imoveis', $data);
	}

	public function change_status_cliente($data){

		$this->db->where('id_post_cliente', $data['id_post_cliente']);
		$this->db->update('post_client', $data);
	}

	public function edit_user($data){

		$this->db->where('usuario', $data['usuario']);
		$this->db->update('sistema', $data);
	}

	public function add_bookpost($data){
		$this->db->insert('empresas', $data);
	}

	public function delete_bookpost($user_insta){
		$id = $this->consulta_empresas($user_insta)->id_emp;
		$posts = $this->consulta_posts($user_insta);
		foreach ($posts as $post){
			$data = array(
				'id_post' => $post->id_post
			);
			$this->delete_post($data);
		}
		$data_2 = array(
			'id_emp' => $id
		);
		$this->db->delete('empresas', $data_2);
	}

	public function aut_login($user, $pass){
		$query = $this->db->query('SELECT * FROM sistema WHERE usuario = "'.$user.'" AND senha = "'.$pass.'";');
		return $query->row();
	}

	public function consulta_imoveis(){
		$query = $this->db->query('SELECT * FROM imoveis');
		return $query->result();
	}

	public function consulta_fotos($id_imovel = null){
		if($id_imovel != null){
			$query = $this->db->query('SELECT * FROM fotos_imoveis WHERE id_imovel = "'.$id_imovel.'";');
			return $query->result();
		}
		$query = $this->db->query('SELECT * FROM fotos_imoveis');
		return $query->result();
	}

	public function add_fotos($data){
		$this->db->insert('fotos_imoveis', $data);
	}
}
