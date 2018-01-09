<?php

class TelefoneLocal_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM telefoneLocal ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idLocal) {
        $sql = "SELECT * FROM telefoneLocal WHERE idLocal = $idLocal";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function findAlt($id) {
        $sql = "SELECT * FROM telefoneLocal WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function insert($telefoneLocal) {
        return $this->db->insert('telefoneLocal', $telefoneLocal);
    }

    public function update($telefoneLocal, $id) {
        return $this->db->update('telefoneLocal', $telefoneLocal, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('telefoneLocal', array('id' => $id));
    }

}
