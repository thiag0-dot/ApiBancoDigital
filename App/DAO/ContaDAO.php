<?php
namespace App\DAO;

use App\Model\ContaModel;
use \PDO;

class ContaDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(ContaModel $model) : ?ContaModel 
    {
        $sql = "INSERT INTO conta 
                            (idCorrentista, saldo, tipo,data_abertura, limite) 
                VALUES 
                            (?, ?, ?, CURRENT_DATE(), ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_correntista);
        $stmt->bindValue(2, $model->saldo);
        $stmt->bindValue(3, $model->tipo);
        $stmt->bindValue(4, $model->limite);
        
        
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }

    public function update() 
    {
    }

    public function select(ContaModel $model) 
    {
        $sql = "SELECT * FROM conta WHERE idCorrentista = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_correntista);
        $stmt->execute();

        
        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }

    public function selectById() 
    {

    }

    public function delete() 
    {

    }
}
