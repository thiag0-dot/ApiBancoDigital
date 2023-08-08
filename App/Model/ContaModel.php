<?php
namespace App\Model;

use App\DAO\ContaDAO;

class ContaModel extends Model {
	public $id, $idcorrentista, $saldo, $limite, $tipo;

	public function save() 
	{
		$dao = new ContaDAO();

		if(empty($this->id))
		{
			$dao->insert($this);
		} else {

		}
	}

	public function getAllRows(int $id_cidadao) 
	{
		$dao = new ContaDAO();

		$this->rows = $dao->select($id_cidadao);
	}

	public function delete(int $id) 
	{

	}

	public function getById(int $id) 
	{

	}
}
