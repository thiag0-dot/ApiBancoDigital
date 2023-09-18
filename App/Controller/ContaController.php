<?php
namespace App\Controller;

use App\DAO\ContaDAO;
use App\Model\ContaModel;
use App\Model\CorrentistaModel;
use Exception;

class ContaController extends Controller {

	public static function select() : void
	{
		try
		{
			$id_correntista = $_GET['id_correntista'];

			$model = new ContaModel();

			$model->id_correntista = $id_correntista;

			$model->getByIdCorrentista();

			parent::getResponseAsJSON($model->rows);
		}
		catch (Exception $e)
		{
			parent::getExceptionAsJSON($e);
		}
	}

}
