<?php 

/**
* 
*/
class UsuarioModel extends CI_Model {
	
	
	public function login($login, $senha) {

		$retorno = $this->db->get_where('usuarios', array('login' => $login, 'senha' => $senha),1)->result();

		if ($retorno >= 1) {
			
			return $retorno;

		}

	} 

}


?>