<?php

class Empregado_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM empregado ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function selectCargo() {
        $sql = "SELECT e.*, c.descricao AS cargo, c.tipoRegistro AS tipo, ";
        $sql .= "u.nome AS nome, u. sobrenome, u.email AS email ";
        $sql .= "FROM empregado e ";
        $sql .= "INNER JOIN usuario u ON e.idUsuario = u.id ";
        $sql .= "INNER JOIN cargo c ON e.idUsuario = c.id ";
        $sql .= "ORDER BY cargo";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($idUsuario) {
        $sql = "SELECT * FROM empregado WHERE idUsuario = $idUsuario";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }
    
    public function findAlt($id) {
        $sql = "SELECT * FROM empregado WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function findReceita($idUsuario) {
        $sql = "SELECT e.*, c.tipoRegistro AS tipo, c.descricao AS cargo ";
        $sql .= "FROM empregado e ";
        $sql .= "INNER JOIN cargo c ON e.idCargo = c.id ";
        $sql .= "WHERE e.idUsuario = $idUsuario";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function findProfissional($id) {
        $sql = "SELECT e.*, u.nome AS nome, u.sobrenome AS sobrenome, c.descricao AS cargo, ";
        $sql .= "c.tipoRegistro AS tipoRegistro FROM empregado e ";
        $sql .= "INNER JOIN usuario u ON e.idUsuario = u.id ";
        $sql .= "INNER JOIN cargo c ON e.idCargo = c.id ";
        $sql .= "WHERE e.id = $id ";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function last() {
        $sql = "SELECT id FROM empregado ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($empregado) {
        return $this->db->insert('empregado', $empregado);
    }

    public function update($empregado, $id) {
        return $this->db->update('empregado', $empregado, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('empregado', array('id' => $id));
    }

}
