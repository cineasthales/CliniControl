<?php

class Administrador_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM administrador ORDER BY idEmpregado";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idEmpregado) {
        $sql = "SELECT * FROM administrador WHERE idEmpregado = '$idEmpregado'";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        $result = $query->result();
        return isset($result); // retorna true ou false
    }

    public function insert($administrador) {
        return $this->db->insert('administrador', $administrador);
    }

    public function delete($idEmpresa, $idEmpregado) {
        return $this->db->delete('administrador', array('idEmpresa' => $idEmpresa, 'idEmpregado' => $idEmpregado));
    }

}
