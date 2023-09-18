<?php
namespace App\Model;

use App\DAO\ContaDAO;

class ContaModel extends Model {
	public $id, $id_correntista, $saldo, $limite, $tipo;

	public function save() 
	{
		$dao = new ContaDAO();

		if(empty($this->id))
		{
			$dao->insert($this);
		} else {

		}
	}

	public function getByIdCorrentista() 
	{
		$dao = new ContaDAO();

		$this->rows = $dao->select($this);
	}

	public function delete(int $id) 
	{

	}
}
