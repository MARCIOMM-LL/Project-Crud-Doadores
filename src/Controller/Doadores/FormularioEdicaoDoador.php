<?php

namespace Src\Crud\Controller\Doadores;

use Src\Crud\Entity\Doadores;
use Src\Crud\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicaoDoador implements RequestHandlerInterface
{
    use HtmlViewTrait;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $doadores = $this->entityManager->find(Doadores::class, $request->getQueryParams()['id']);

        $titulo = 'Editar Doador';
        $html = $this->getHtmlFromTemplate('doadores/formulario.php', compact('doadores', 'titulo'));

        return new Response(200, [], $html);
    }
}
