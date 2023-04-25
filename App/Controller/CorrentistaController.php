<?php
namespace App\Controller;

use App\DAO\CorrentistaDAO;
use App\Model\CorrentistaModel;
use Exception;

class CorrentistaController extends Controller {
	public static function save() : void
	{
		try
		{
			$json_obj = json_decode(file_get_contents('php://input'));

			$model = new CorrentistaModel();
			//$model->id = $json_obj->idCorrentista;
			$model->nome = $json_obj->Nome;
			$model->cpf = $json_obj->Cpf;
			$model->data_nasc = $json_obj->Data_Nasc;
			$model->senha = $json_obj->Senha;

			$model->save();
		}
		catch (Exception $e)
		{
			parent::LogError($e);
			parent::getExceptionAsJSON($e);
		}
	}

	public static function select() : void
	{
		try
		{
			$model = new CorrentistaModel();

			$model->getAllRows();

			parent::getResponseAsJSON($model->rows);
		}
		catch (Exception $e)
		{
			parent::getExceptionAsJSON($e);
		}
	}

	public static function update() 
	{

	}

	public static function delete() : void 
	{
		try
		{
			$model = new CorrentistaModel();

			$model->id = parent::getIntFromUrl(isset($_GET['id']) ? $_GET['id'] : null);

			$model->delete();
		}
		catch(Exception $e)
		{
			parent::getExceptionAsJSON($e);
		}
	}
}
