<?php
use App\Controller\{
    ChavePixController,
    ContaController,
    CorrentistaController,
    TransacaoController,
    Controller
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri)
{
    case "/correntista/save":
        CorrentistaController::save();
    break;

    case "/correntista/deletar":
        CorrentistaController::delete();
    break;
    
    case "/correntista/entrar":
        
    break;

    case "/conta/pix/enviar":

    break;

    case "/conta/pix/receber":

    break;

    case "/conta/extrato":
        ContaController::select();
    break;

    default:
        http_response_code(403);
    break;
}