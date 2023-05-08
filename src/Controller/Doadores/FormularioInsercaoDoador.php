<?php

namespace Src\Crud\Controller\Doadores;

use Src\Crud\Entity\Doadores;
use Src\Crud\Helper\HtmlViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercaoDoador extends PersistenciaDoador implements RequestHandlerInterface
{
    use HtmlViewTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $doadores = new Doadores();
        $titulo = 'Cadastrar Doador';
        $html = $this->getHtmlFromTemplate('doadores/formulario.php', compact('doadores', 'titulo'));

        return new Response(200, [], $html);
    }
}
