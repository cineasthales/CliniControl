<?php

class Cargo_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM cargo ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }
    
    public function selectProf() {
        $sql = "SELECT * FROM cargo WHERE profissionalSaude = 1 ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM cargo WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($cargo) {
        return $this->db->insert('cargo', $cargo);
    }

    public function update($cargo, $id) {
        return $this->db->update('cargo', $cargo, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('cargo', array('id' => $id));
    }

}
