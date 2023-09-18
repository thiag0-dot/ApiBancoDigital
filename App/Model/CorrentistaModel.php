<?php
namespace App\Model;

use App\DAO\CorrentistaDAO;
use App\DAO\ContaDAO;
use Exception;

class CorrentistaModel extends Model {
	public $id, $nome, $cpf, $data_nasc, $senha;
	public $rows_contas;

	public function save() :?CorrentistaModel
	{
		$dao_correntista = new CorrentistaDAO();

		$model_preenchido = $dao_correntista->save($this);

		if($model_preenchido->id != null)
		{
			
			$dao_conta = new ContaDAO();

			// Abrindo a conta corrente junto a conta
			$conta_corrente = new ContaModel();
			$conta_corrente->id_correntista = $model_preenchido->id;
			$conta_corrente->saldo = 0;
			$conta_corrente->limite = 100;
			$conta_corrente->tipo = 'C';
			
			$conta_corrente = $dao_conta->insert($conta_corrente);

			$model_preenchido->rows_contas[] = $conta_corrente;

			//abrindo a conta poupança
			$conta_poupanca = new ContaModel();
            $conta_poupanca->id_correntista = $model_preenchido->id;
            $conta_poupanca->saldo = 0;
            $conta_poupanca->limite = 100;
            $conta_poupanca->tipo = 'P';
			
            $conta_poupanca = $dao_conta->insert($conta_poupanca);

			$model_preenchido->rows_contas[] = $conta_poupanca;
		}
		return $model_preenchido;
	}

	public function getAllRows() 
	{
		$this->rows = (new CorrentistaDAO())->select();
	}

	public function delete() 
	{
		(new CorrentistaDAO())->delete($this->id);
	}

	public function logar()
	{
		try
		{
			return (new CorrentistaDAO())->selectByCpfAndSenha($this->cpf, $this->senha);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
}
