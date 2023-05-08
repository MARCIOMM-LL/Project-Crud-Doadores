<?php

namespace Src\Crud\Controller\Doadores;

use Doctrine\ORM\EntityRepository;
use Src\Crud\Entity\Doadores;
use Src\Crud\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListaDoadores implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private EntityRepository $locaisRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->locaisRepository = $entityManager->getRepository(Doadores::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $doadores = $this->locaisRepository->findBy($request->getQueryParams(), [
            'nome' => 'ASC'
        ]);

        $titulo = 'Lista de Doadores';
        $html = $this->getHtmlFromTemplate('doadores/listar.php', compact('doadores', 'titulo'));

        return new Response(200, [], $html);
    }
}
