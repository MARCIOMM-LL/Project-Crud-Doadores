<?php use Src\Crud\Helper\Validadores\Formatador;

require __DIR__ . '/../inicio-html.php';?>

    <div class="jumbotron">
        <h1><?= $titulo; ?></h1>
    </div>

    <form method="post" action="/salvar-doador<?= $doadores->getId() ? '?id=' . $doadores->getId() : ''; ?>">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $doadores->getNome() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?= $doadores->getEmail() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $doadores->getCpf() ? Formatador::formataCpfCnpj($doadores->getCpf()): '' ?>" autofocus>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 0000-0000/00000-0000" value="<?= $doadores->getTelefone() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="data_nascimento">Data Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000" value="<?= $doadores->getDataNascimento() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="data_cadastro">Data Cadastro</label>
                <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" placeholder="00/00/0000" value="<?= $doadores->getDataCadastro() ?>" autofocus>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="preco_doacao">Preço da Doação</label>
                <input type="text" class="form-control" id="preco_doacao" name="preco_doacao" value="<?= $doadores->getPrecoDoacao() ? Formatador::formataPreco($doadores->getPrecoDoacao()): '' ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="cep">Cep</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="00.000-000" required value="<?= $doadores->getCep() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua" value="<?= $doadores->getEndereco() ?>" autofocus>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="<?= $doadores->getNumero() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?= $doadores->getBairro() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-4">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?= $doadores->getCidade() ?>" autofocus>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="<?= $doadores->getUF() ?>" autofocus>
            </div>

            <div class="col-md-4 mb-3">
                <label for="intervalo_doacao">Intervalo de Doacao</label>
                <select class="custom-select" id="intervalo_doacao" name="intervalo_doacao">
                    <option value="unico">Único</option>
                    <option value="bimestral">Bimestral</option>
                    <option value="semestral">Semestral</option>
                    <option value="anual">Anual</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="forma_pagamento">Forma de Pagamento</label>
                <select class="custom-select" id="forma_pagamento" name="forma_pagamento">
                    <option value="debito">Débito</option>
                    <option value="credito">Crédito</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/listar-doadores" class="btn btn-secondary">Cancelar</a>
    </form>

<?php require __DIR__ . '/../fim-html.php'; ?>