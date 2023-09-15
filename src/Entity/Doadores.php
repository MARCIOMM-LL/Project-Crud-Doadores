<?php

namespace Src\Crud\Entity;

/**
 * @Entity
 * @Table(name="tb_doadores")
 */
class Doadores
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $doador_id;

    /**
     * @Column(type="string")
     */
    private $nome;

    /**
     * @Column(type="string")
     */
    private $email;

    /**
     * @Column(type="string")
     */
    private $cpf;

    /**
     * @Column(type="string")
     */
    private $telefone;

    /**
     * @Column(type="string")
     */
    private $data_nascimento;

    /**
     * @Column(type="string")
     */
    private $data_cadastro;

    /**
     * @Column(type="string")
     */
    private $intervalo_doacao;

    /**
     * @Column(type="float")
     */
    private $preco_doacao;

    /**
     * @Column(type="string")
     */
    private $forma_pagamento;

    /**
     * @Column(type="string")
     */
    private $cep;

    /**
     * @Column(type="string")
     */
    private $endereco;

    /**
     * @Column(type="string")
     */
    private $numero;

    /**
     * @Column(type="string")
     */
    private $bairro;

    /**
     * @Column(type="string")
     */
    private $cidade;

    /**
     * @Column(type="string")
     */
    private $uf;

    public function getId()
    {
        return $this->doador_id;
    }

    public function setId($id)
    {
        $this->doador_id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    public function getIntervaloDoacao()
    {
        return $this->intervalo_doacao;
    }

    public function setIntervaloDoacao($intervalo_doacao)
    {
        $this->intervalo_doacao = $intervalo_doacao;
    }

    public function getPrecoDoacao()
    {
        return $this->preco_doacao;
    }

    public function setPrecoDoacao($preco)
    {
        $this->preco_doacao = $preco;
    }

    public function getFormaPagamento()
    {
        return $this->forma_pagamento;
    }

    public function setFormaPagamento($forma_pagamento)
    {
        $this->forma_pagamento = $forma_pagamento;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getUF()
    {
        return $this->uf;
    }

    public function setUF($uf)
    {
        $this->uf = $uf;
    }
}
