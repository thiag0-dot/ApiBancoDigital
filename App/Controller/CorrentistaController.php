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
			foreach (get_object_vars($json_obj) as $key => $value) 
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }

			parent::getResponseAsJSON($model->save());
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

	public static function getCorrentistabyCpfAndSenha() : void
	{
		try
		{
			$json_obj = json_decode(file_get_contents('php://input'));


			$model = new CorrentistaModel();
			$model->cpf = $json_obj->Cpf;
			$model->senha = $json_obj->Senha;

			parent::getResponseAsJSON($model->logar());

		}
		catch(Exception $e)
		{
			parent::getResponseAsJSON($e);
		}
	}
}
