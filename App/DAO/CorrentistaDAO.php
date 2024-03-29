<?php
namespace App\DAO;

use App\Model\CorrentistaModel;
use \PDO;

class CorrentistaDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function save(CorrentistaModel $m) : CorrentistaModel
    {
        return ($m->id == null) ? $this->insert($m) : $this->update($m);
    }

    public function insert(CorrentistaModel $m) : CorrentistaModel 
    {
        $sql = "INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES (?, ?, ?, sha1(?))";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);

        $stmt->execute();

        $m->id = $this->conexao->lastInsertId();

        return $m;
    }

    public function update(CorrentistaModel $m) 
    {
        
    }

    public function select() 
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }


    public function delete(int $id) : bool 
    {
        $sql = "DELETE FROM correntista WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function selectByCpfAndSenha($cpf, $senha)
    {
        $sql = "SELECT * FROM correntista WHERE cpf = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\CorrentistaModel");
    }
}
