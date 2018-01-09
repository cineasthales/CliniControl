<?php

class Empregado_Especialidade_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM empregado_especialidade ORDER BY idEmpregado";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idEmpregado) {
        $sql = "SELECT ee.*, e.descricao AS descricao ";
        $sql .= "FROM empregado_especialidade ee ";
        $sql .= "INNER JOIN especialidade e ON ee.idEspecialidade = e.id ";
        $sql .= "WHERE ee.idEmpregado = $idEmpregado";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function insert($empregado_especialidade) {
        return $this->db->insert('empregado_especialidade', $empregado_especialidade);
    }

    public function delete($idEmpregado, $idEspecialidade) {
        return $this->db->delete('empregado_especialidade', array('idEmpregado' => $idEmpregado, 'idEspecialidade' => $idEspecialidade));
    }

}
