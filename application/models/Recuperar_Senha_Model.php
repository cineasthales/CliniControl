<?php

class Recuperar_Senha_Model extends CI_Model {

    public function findEmail($email) {
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        $row = $query->row();
        return isset($row); // retorna true ou false
    }
    
    public function update($usuario, $email) {
        return $this->db->update('usuario', $usuario, array('email' => $email));
    }
    
    public function insert($recuperar_senha) {
        return $this->db->insert('recuperar_senha', $recuperar_senha);
    }
    
    public function findToken($email) {
        $sql = "SELECT * FROM recuperar_senha WHERE codEmail = '$email' and dataVal >= 'NOW()'";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        $row = $query->row();
        return isset($row); // retorna true ou false
    }
    

}
