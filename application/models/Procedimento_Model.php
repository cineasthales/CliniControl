<?php

class Procedimento_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM procedimento ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function selectPorUsuario() {
        $sql = "SELECT p.*, t.descricao AS tipo, u.nome AS nome, u.sobrenome AS sobrenome, ";
        $sql .= "u.cpf AS cpf, u.email AS email FROM procedimento p ";
        $sql .= "INNER JOIN tipoProcedimento t ON p.idTipoProcedimento = t.id ";
        $sql .= "INNER JOIN usuario u ON p.idPaciente = u.id ";
        $sql .= "ORDER BY nome, sobrenome";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function selectPorProfissional() {
        $sql = "SELECT p.*, t.descricao AS tipo, u.nome AS nome, u.sobrenome AS sobrenome, ";
        $sql .= "u.cpf AS cpf, u.email AS email FROM procedimento p ";
        $sql .= "INNER JOIN tipoProcedimento t ON p.idTipoProcedimento = t.id ";
        $sql .= "INNER JOIN usuario u ON p.idProfissional = u.id ";
        $sql .= "ORDER BY nome, sobrenome";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }
    
    public function selectPorData() {
        $sql = "SELECT p.*, t.descricao AS tipo, u1.nome AS nomeProf, u1.sobrenome AS sobrenomeProf, ";
        $sql .= "u2.nome AS nome, u2.sobrenome AS sobrenome FROM procedimento p ";
        $sql .= "INNER JOIN tipoProcedimento t ON p.idTipoProcedimento = t.id ";
        $sql .= "INNER JOIN usuario u1 ON p.idProfissional = u1.id ";
        $sql .= "INNER JOIN usuario u2 ON p.idPaciente = u2.id ";
        $sql .= "WHERE p.realizado = 1 ";
        $sql .= "ORDER BY p.data DESC, p.hora DESC";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }
    
    public function selectUsuario($idPaciente) {
        $sql = "SELECT p.*, t.descricao AS tipo, u.nome AS nomeProf, u.sobrenome AS sobrenomeProf, ";
        $sql .= "u.id AS idProf FROM procedimento p ";
        $sql .= "INNER JOIN tipoProcedimento t ON p.idTipoProcedimento = t.id ";
        $sql .= "INNER JOIN usuario u ON p.idProfissional = u.id ";
        $sql .= "WHERE p.idPaciente = $idPaciente ";
        $sql .= "ORDER BY p.data DESC, p.hora DESC";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM procedimento WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }
    
    public function findReceita($id) {
        $sql = "SELECT p.*, u1.nome AS nome, u1.sobrenome AS sobrenome, ";
        $sql .= "u2.nome AS nomeProf, u2.sobrenome AS sobrenomeProf, ";
        $sql .= "t.descricao AS tipo FROM procedimento p ";
        $sql .= "INNER JOIN tipoProcedimento t ON p.idTipoProcedimento = t.id ";
        $sql .= "INNER JOIN usuario u1 ON p.idPaciente = u1.id ";
        $sql .= "INNER JOIN usuario u2 ON p.idProfissional = u2.id ";
        $sql .= "WHERE p.id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function insert($procedimento) {
        return $this->db->insert('procedimento', $procedimento);
    }

    public function update($procedimento, $id) {
        return $this->db->update('procedimento', $procedimento, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('procedimento', array('id' => $id));
    }

}
