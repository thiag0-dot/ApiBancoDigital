<?php
namespace App\Model;

use App\DAO\CorrentistaDAO;

class CorrentistaModel extends Model {
	public $id, $nome, $cpf, $data_nasc, $senha;

	public function save() 
	{
		if($this->id == null)
		{
			(new CorrentistaDAO())->insert($this);
		}
		else
		{
			(new CorrentistaDAO())->update($this);
		}
	}

	public function getAllRows() 
	{
		$this->rows = (new CorrentistaDAO())->select();
	}

	public function delete() 
	{
		(new CorrentistaDAO())->delete($this->id);
	}

	public function autenticar()
	{
		$dao = new CorrentistaDAO();

		$dados_usuario_logado =  $dao->selectByCpfAndSenha($this->cpf, $this->senha);

		if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else
            null;
	}
}
