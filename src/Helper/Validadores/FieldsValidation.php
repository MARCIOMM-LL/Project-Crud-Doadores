<?php

namespace Src\Crud\Helper\Validadores;

//phpinfo();die();

//$debitos = [];
//$creditos = [];
//
//array_push($debitos, new Decimal("0.1"));
//array_push($debitos, new Decimal("0.2"));
//
//array_push($creditos, new Decimal("0.3"));
//
//function saldo(array $creditos, array $debitos) {
//    return array_sum($creditos) - array_sum($debitos);
//}
//
//var_dump(saldo($creditos, $debitos));
//die();

class FieldsValidation
{
    public  $nome;
    public  $email;
    public  $cpf;
    public  $telefone;
    public  $data_nascimento;
    public  $cep;
    public  $preco_doacao;
    public  $endereco;
    public  $bairro;
    public  $numero;
    public  $cidade;
    public  $uf;

    public function __construct(
        $nome,
        $email,
        $cpf,
        $telefone,
        $data_nascimento,
        $data_cadastro,
        $preco_doacao,
        $cep, $endereco,
        $numero,
        $bairro,
        $cidade,
        $uf
    )
    {
        //Validação CEP chamando o método de validação de cep
        if(!$this->cepValido($cep)) throw new \Exception("CEP do doador no formato inválido!");

        //Validação NOME
        if(!$this->nomeValido($nome)) throw new \Exception("Nome do doador no formato inválido!");

        //Validação NÚMERO
        if(!$this->numeroValido($numero)) throw new \Exception("Número telefone no formato inválido!");

        //Validação Telefone chamando o método de validação de telefone
        if(!$this->celularTelefoneValidos($telefone)) throw new \Exception("Telefone no formato inválido!");

        //Validação do email chamando o método de validação de e-mail
        if(!$this->emailValido($email)) throw new \Exception("Email no formato inválido!");

        #Validando preço
        if(!$this->precoValido($preco_doacao)) throw new \Exception("Preço de doação inválido!");

        #Validar data_nascimento
        if(!$this->dataValida($data_nascimento)) throw new \Exception("Data de nascimento no formato inválido!");

        #Validar data_cadastro
        if(!$this->dataValida($data_cadastro)) throw new \Exception("Data de cadastro no formato inválido!");


        $ValidaCPFCNPJ = new ValidaCPFCNPJ($cpf);

        $formatado = $ValidaCPFCNPJ->formata();

        // Verifica se o CPF ou CNPJ é válido
        if ($formatado) {
            //echo $formatado; // 71.569.042/0001-96
        } else {
            throw new \Exception("CPF inválido!");
        }

        $this->nome = $nome;
        $this->preco_doacao = $preco_doacao;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->data_nascimento = $data_nascimento;
    }

    public function cepValido(string $cep): string
    {
        if (strlen($cep) === 10) {
            $regex_cep = "/^[0-9]{2}\.[0-9]{3}\-[0-9]{3}$/";
            return preg_match($regex_cep, $cep);
        }
        return false;
    }

    public function nomeValido(string $nome): string
    {
        //if (strlen($nome) <= 30 && !is_numeric($nome) && !empty($nome)) {
        //    return htmlspecialchars(trim($nome));
        //}
        //return false;

        // /^([a-zá-ùÁ-Ù]+)\s([a-zá-ùÁ-Ù]+)\s([a-zá-ùÁ-Ù]*)\s([a-zá-ùÁ-Ù]*)$/i
        if (strlen($nome) <= 30 && !is_numeric($nome) && !empty($nome)) {
            $regex_nome = "/^[^-\s][a-zA-ZÀ-ú ]*$/";
            return preg_match($regex_nome, htmlspecialchars(trim($nome)));
            //print_r($match);
        }
        return false;
    }

    public function telefoneValido(string $telefone): string
    {
        if (strlen($telefone) === 15 || strlen($telefone) === 14) {
            $regex_telefone = "/^\([0-9]{2}\)[0-9]{4,5}\-[0-9]{4}$/";
            return preg_match($regex_telefone, str_replace(" ", "", $telefone));
        }
        return false;
    }

    public function celularValido(string $celular): string
    {
        if (strlen($celular) === 15) {
            $regex_telefone = "/^\([0-9]{2}\)[0-9]{4}\-[0-9]{5}$/";
            return preg_match($regex_telefone, str_replace(" ", "", $celular));
        }
        return false;
    }

    public static function celularTelefoneValidos(string $phoneString, bool $forceOnlyNumber = true)
    {
        if (strlen($phoneString) === 15 || strlen($phoneString) === 14 || strlen($phoneString) === 20) {
            $phoneString = preg_replace('/[()]/', '', $phoneString);
            if (preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([0-0]?[0-9]{1}[0-9]{1})\)?\s?)??(?:((?:9\d|[2-9])\d{3}\-?\d{4}))$/', $phoneString, $matches) === false) {
                return null;
            }

            $ddi = $matches[1] ?? '';
            $ddd = preg_replace('/^0/', '', $matches[2] ?? '');
            $number = $matches[3] ?? '';
            if ($forceOnlyNumber === true) {
                $number = preg_replace('/-/', '', $number);
            }

            return ['ddi' => $ddi, 'ddd' => $ddd, 'number' => $number];
        }
        return false;
    }

    public function emailValido($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_STRIP_BACKTICK)) {
            return true;
        }
        return false;
    }

    public function numeroValido($numero)
    {
        if (filter_var($numero, FILTER_SANITIZE_NUMBER_INT)) {
            return true;
        }
        return false;
    }

    public function dataValida(string $data): string
    {
        if (strlen($data) != 10) return false;

        if (!strpos($data, "-")) return false;

        $partes = explode("-", $data);

        $ano = $partes[0];
        $mes = $partes[1];
        $dia = $partes[2];

        if (strlen($ano) < 4) return false;

        if (!checkdate($mes, $dia, $ano)) return false;

        $data_atual = date("Y-m-d");

        //if (strtotime($data) < strtotime($data_atual)) return false;

        return true;
    }

    public function precoValido($preco)
    {
        $preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT);

        setlocale(LC_MONETARY,"pt_BR");

        $regex_preco = "/^((?:\d\.)?(?:\d{1,3}\.)?\d{1,3},\d{1,2})|(\d)$/";
        //$regex_preco = "/^[0-9]{1,3}{[.][0-9]{3}}*[,][0-9]{2}$/";
        return preg_match($regex_preco, $preco);
    }

    public static function convertePrecoParaArmazenarEmDouble($preco)
    {
        //1.500,00
        $numero_valido = str_replace(",", ".", $preco);
        $numero_valido = str_replace(".", "", substr($numero_valido, 0, -3))
            . substr($numero_valido, -3);

        return doubleval($numero_valido);
    }

    public function rgValido($rg)
    {
        if (strlen($rg) === 12) {
            $regex_rg = "/^[0-9]{2,3}\.?[0-9]{2,3}\.?[0-9]{3}\-?[A-Za-z0-9]{1}$/";
            return preg_match($regex_rg, $rg);
        }

        return false;
    }

    //public function validarRG($rg, $tamanhoRG, $dc)
    //{
    //    function char_at($str, $pos)
    //    {
    //        return $str{$pos};
    //    }
    //    // SÃO PAULO
    //    // RG = Número do RG (8 Bytes)
    //    // Tamanho= Comprimento em bytes (maximo=8)
    //    // DC = Digito do RG (2 Bytes)
//
    //    $produto = 0;
    //    $multiplicador = 2;
    //    $digito = 0;
    //    $i = 0;
//
    //    for ($i = $tamanhoRG - 1; $i >= 0; $i--)
    //    {
    //        $produto = $produto + (char_at($i, $i) * $multiplicador);
//
    //        if($multiplicador == 9)
    //            $multiplicador = 2;
    //        else
    //            $multiplicador = $multiplicador + 1;
    //    }
//
    //    $digito = $produto % 11;
//
    //    if ($digito == 10)
    //        $digito = "X";
//
    //    if($digito == char_at($i, $i))
    //        return true;
    //    else
    //        if($rg < 25000000 && char_at($i, $i) == '')
    //            return true;
    //        else
    //            return false;
    //}

    public static function removeFormatacao($info)
    {
        $dado = str_replace([".", "-", "/", "(", ")", " ", ","], "", $info);
        return $dado;
    }
}