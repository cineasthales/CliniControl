<?php

class Empresa_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM empresa ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM empresa WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function findCnpj($cnpj) {
        $sql = "SELECT * FROM empresa WHERE cnpj = '$cnpj'";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        $row = $query->row();
        return isset($row); // retorna true ou false
    }

    public function last() {
        $sql = "SELECT id FROM empresa ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($empresa) {
        return $this->db->insert('empresa', $empresa);
    }

    public function update($empresa, $id) {
        return $this->db->update('empresa', $empresa, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('empresa', array('id' => $id));
    }

}
