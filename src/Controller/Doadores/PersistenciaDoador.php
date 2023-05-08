<?php

namespace Src\Crud\Controller\Doadores;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Src\Crud\Entity\Doadores;
use Src\Crud\Helper\MensagemFlash;
use Src\Crud\Helper\Validadores\FieldsValidation;

class PersistenciaDoador implements RequestHandlerInterface
{
    use MensagemFlash;

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
        try
        {
            $validacao = new FieldsValidation(
                $request->getParsedBody()['nome'],
                $request->getParsedBody()['email'],
                $request->getParsedBody()['cpf'],
                $request->getParsedBody()['telefone'],
                $request->getParsedBody()['data_nascimento'],
                $request->getParsedBody()['data_cadastro'],
                $request->getParsedBody()['preco_doacao'],
                $request->getParsedBody()['cep'],
                $request->getParsedBody()['endereco'],
                $request->getParsedBody()['numero'],
                $request->getParsedBody()['bairro'],
                $request->getParsedBody()['cidade'],
                $request->getParsedBody()['uf']
            );

            $doadores = new Doadores();
            $doadores->setNome($request->getParsedBody()['nome']);
            $doadores->setEmail($request->getParsedBody()['email']);
            $doadores->setCpf(FieldsValidation::removeFormatacao($request->getParsedBody()['cpf']));
            $doadores->setTelefone(FieldsValidation::removeFormatacao($request->getParsedBody()['telefone']));
            $doadores->setDataNascimento(FieldsValidation::removeFormatacao($request->getParsedBody()['data_nascimento']));
            $doadores->setDataCadastro(FieldsValidation::removeFormatacao($request->getParsedBody()['data_cadastro']));
            $doadores->setIntervaloDoacao($request->getParsedBody()['intervalo_doacao']);
            $doadores->setPrecoDoacao(FieldsValidation::convertePrecoParaArmazenarEmDouble($request->getParsedBody()['preco_doacao']));
            $doadores->setFormaPagamento($request->getParsedBody()['forma_pagamento']);
            $doadores->setCep(FieldsValidation::removeFormatacao($request->getParsedBody()['cep']));
            $doadores->setEndereco($request->getParsedBody()['endereco']);
            $doadores->setNumero($request->getParsedBody()['numero']);
            $doadores->setBairro($request->getParsedBody()['bairro']);
            $doadores->setCidade($request->getParsedBody()['cidade']);
            $doadores->setUF($request->getParsedBody()['uf']);
        }
        catch(\Exception $error)
        {
            echo "<script>alert('" . $error->getMessage() . "')</script>";
            echo "<script>history.back()</script>";
        }

            if (array_key_exists('id', $request->getQueryParams())) {
                $doadores->setId($request->getQueryParams()['id']);
                $this->entityManager->merge($doadores);
                $mensagem = 'Doador atualizado com sucesso!';
            } else {
                $this->entityManager->persist($doadores);
                $mensagem = 'Doador cadastrado com sucesso!';
            }

            $this->entityManager->flush();
            $this->adicionaMensagemFlash('success', $mensagem);

        return new Response(302, ['Location' => '/listar-doadores']);

    }
}
