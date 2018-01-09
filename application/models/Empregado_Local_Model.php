<?php

class Empregado_Local_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM empregado_local ORDER BY idEmpregado";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idEmpregado) {
        $sql = "SELECT el.*, l.descricao AS descricao ";
        $sql .= "FROM empregado_local el ";
        $sql .= "INNER JOIN local l ON el.idLocal = l.id ";
        $sql .= "WHERE el.idEmpregado = $idEmpregado";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function insert($empregado_local) {
        return $this->db->insert('empregado_local', $empregado_local);
    }

    public function delete($idEmpregado, $idLocal) {
        return $this->db->delete('empregado_local', array('idEmpregado' => $idEmpregado, 'idLocal' => $idLocal));
    }

}
