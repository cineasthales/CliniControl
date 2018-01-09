<?php

class Especialidade_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM especialidade ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM especialidade WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($especialidade) {
        return $this->db->insert('especialidade', $especialidade);
    }

    public function update($especialidade, $id) {
        return $this->db->update('especialidade', $especialidade, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('especialidade', array('id' => $id));
    }

}
