<?php

class TipoProcedimento_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM tipoProcedimento ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM tipoProcedimento WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($tipoProcedimento) {
        return $this->db->insert('tipoProcedimento', $tipoProcedimento);
    }

    public function update($tipoProcedimento, $id) {
        return $this->db->update('tipoProcedimento', $tipoProcedimento, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('tipoProcedimento', array('id' => $id));
    }

}
