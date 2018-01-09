<?php

class Endereco_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM endereco ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM endereco WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }
    
    public function last() {
        $sql = "SELECT id FROM endereco ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($endereco) {
        return $this->db->insert('endereco', $endereco);
    }

    public function update($endereco, $id) {
        return $this->db->update('endereco', $endereco, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('endereco', array('id' => $id));
    }

}
