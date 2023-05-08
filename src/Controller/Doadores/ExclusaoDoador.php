<?php

namespace Src\Crud\Controller\Doadores;

use Src\Crud\Entity\Doadores;
use Src\Crud\Helper\MensagemFlash;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExclusaoDoador implements RequestHandlerInterface
{
    use MensagemFlash;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $doadores = $this->entityManager->getReference(Doadores::class, $request->getQueryParams()['id']);
        $this->entityManager->remove($doadores);
        $this->entityManager->flush();
        $this->adicionaMensagemFlash('success', 'Doador excluído com sucesso');

        return new Response(302, ['Location' => '/listar-doadores']);
    }
}
