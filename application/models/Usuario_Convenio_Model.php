<?php

class Usuario_Convenio_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM usuario_convenio ORDER BY idUsuario";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }
    
    public function selectConvenio() {
        $sql = "SELECT uc.*, c.nome AS convenio, u.nome AS nome, u.sobrenome AS sobrenome, ";
        $sql .= "u.cpf AS cpf, u.email AS email ";
        $sql .= "FROM usuario_convenio uc ";
        $sql .= "INNER JOIN convenio c ON uc.idConvenio = c.id ";
        $sql .= "INNER JOIN usuario u ON uc.idUsuario = u.id ";
        $sql .= "ORDER BY convenio";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idUsuario) {
        $sql = "SELECT uc.*, c.nome AS nome ";
        $sql .= "FROM usuario_convenio uc ";
        $sql .= "INNER JOIN convenio c ON uc.idConvenio = c.id ";
        $sql .= "WHERE uc.idUsuario = $idUsuario";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert($usuario_convenio) {
        return $this->db->insert('usuario_convenio', $usuario_convenio);
    }
    
    public function delete($idUsuario, $idConvenio) {
        return $this->db->delete('usuario_convenio', array('idUsuario' => $idUsuario, 'idConvenio' => $idConvenio));
    }

}
