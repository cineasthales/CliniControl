<?php

class Convenio_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM convenio ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM convenio WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($convenio) {
        return $this->db->insert('convenio', $convenio);
    }

    public function update($convenio, $id) {
        return $this->db->update('convenio', $convenio, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('convenio', array('id' => $id));
    }

}
