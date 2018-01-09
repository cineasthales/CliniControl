<?php

class Usuario_Telefone_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM usuario_telefone ORDER BY idUsuario";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idUsuario) {
        $sql = "SELECT ut.*, t.numero AS numero ";
        $sql .= "FROM usuario_telefone ut ";
        $sql .= "INNER JOIN telefone t ON ut.idTelefone = t.id ";
        $sql .= "WHERE ut.idUsuario = $idUsuario";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function insert($usuario_telefone) {
        return $this->db->insert('usuario_telefone', $usuario_telefone);
    }
    
    public function delete($idUsuario, $idTelefone) {
        return $this->db->delete('usuario_telefone', array('idUsuario' => $idUsuario, 'idTelefone' => $idTelefone));
    }
}
