<?php

class Telefone_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM telefone ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM telefone WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($telefone) {
        return $this->db->insert('telefone', $telefone);
    }

    public function update($telefone, $id) {
        return $this->db->update('telefone', $telefone, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('telefone', array('id' => $id));
    }

}
