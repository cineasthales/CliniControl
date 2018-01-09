<?php

class Adicional_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM adicional ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM adicional WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($adicional) {
        return $this->db->insert('adicional', $adicional);
    }

    public function update($adicional, $id) {
        return $this->db->update('adicional', $adicional, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('adicional', array('id' => $id));
    }

}
