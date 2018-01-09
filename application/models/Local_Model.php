<?php

class Local_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM local ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function countEmpregados() {
        $sql = "SELECT el.idLocal AS idLocal, COUNT(el.idLocal) AS numLocal, l.descricao AS local, ";
        $sql .= "e.razaoSocial as empresa, e.cnpj AS cnpj FROM local l ";
        $sql .= "INNER JOIN empregado_local el ON l.id = el.idLocal ";
        $sql .= "INNER JOIN empresa e ON l.idEmpresa = e.id ";
        $sql .= "GROUP BY local ";
        $sql .= "ORDER BY local";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM local WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function findLocal($id) {
        $sql = "SELECT l.*, em.nomeFantasia AS empresa, e.* ";
        $sql .= "FROM local l ";
        $sql .= "INNER JOIN empresa em ON l.idEmpresa = em.id ";
        $sql .= "INNER JOIN endereco e ON l.idEndereco = e.id ";
        $sql .= "WHERE l.id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($local) {
        return $this->db->insert('local', $local);
    }

    public function update($local, $id) {
        return $this->db->update('local', $local, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('local', array('id' => $id));
    }

}
