<?php

class Empregado_Adicional_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM empregado_adicional ORDER BY idEmpregado";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idEmpregado) {
        $sql = "SELECT * FROM empregado_adicional WHERE idEmpregado = $idEmpregado";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($empregado_adicional) {
        return $this->db->insert('empregado_adicional', $empregado_adicional);
    }

    public function delete($idEmpregado, $idAdicional) {
        return $this->db->delete('empregado_adicional', array('idEmpregado' => $idEmpregado, 'idAdicional' => $idAdicional));
    }

}
