<?php

class Usuario_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM usuario ORDER BY id";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }
    
    public function selectIdade() {
        $sql = "SELECT * FROM usuario ORDER BY dataNasc DESC";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function findEmail($email) {
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        $row = $query->row();
        return isset($row); // retorna true ou false
    }

    public function findNomeUsuario($nomeUsuario) {
        $sql = "SELECT * FROM usuario WHERE nomeUsuario = '$nomeUsuario'";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        $row = $query->row();
        return isset($row); // retorna true ou false
    }
    
    public function findCpf($cpf) {
        $sql = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        $row = $query->row();
        return isset($row); // retorna true ou false
    }

    public function selectUsuario($idPaciente) {
        $sql = "SELECT p.*, t.descricao AS tipo, u.nome AS nomeProf, u.sobrenome AS sobrenomeProf ";
        $sql .= "FROM procedimento p ";
        $sql .= "INNER JOIN tipoProcedimento t ON p.idTipoProcedimento = t.id ";
        $sql .= "INNER JOIN usuario u ON p.idProfissional = u.id ";
        $sql .= "WHERE p.idPaciente = $idPaciente ";
        $sql .= "ORDER BY p.data DESC";
        $query = $this->db->query($sql);
        // result retorna um array de dados
        return $query->result();
    }

    public function last() {
        $sql = "SELECT id FROM usuario ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        // row retorna o registro obtido
        return $query->row();
    }

    public function check($user, $senha) {
        $sql = "SELECT * FROM usuario WHERE (email=? AND senha=? AND ativo=1) ";
        $sql .= "OR (nomeUsuario=? AND senha=? AND ativo=1)";
        $query = $this->db->query($sql, array($user, $senha, $user, $senha));
        return $query->row();
    }

    public function insert($usuario) {
        return $this->db->insert('usuario', $usuario);
    }

    public function update($usuario, $id) {
        return $this->db->update('usuario', $usuario, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('usuario', array('id' => $id));
    }

}
