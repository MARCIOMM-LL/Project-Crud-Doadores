<?php use Src\Crud\Helper\Validadores\Formatador;

require __DIR__ . '/../inicio-html.php'; ?>

<div class="jumbotron">
    <h1><?= $titulo; ?></h1>
</div>

<a href="/novo-doador" class="btn btn-primary mb-2">Novo Doador</a>
<div class="table-responsive-sm">
<table class="table table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data Nascimento</th>
            <th scope="col">Data do Cadastro</th>
            <th scope="col">Intervalo da Doação</th>
            <th scope="col">Preço Doação</th>
            <th scope="col">Forma de Pagamento </th>
            <th scope="col">Cep</th>
            <th scope="col">Endereço</th>
            <th scope="col">Número</th>
            <th scope="col">Bairro</th>
            <th scope="col">Cidade</th>
            <th scope="col">UF</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($doadores as $doador): ?>
            <tr>
                <td><?= $doador->getNome() ?></td>
                <td><?= $doador->getEmail() ?></td>
                <td><?= Formatador::formataCpfCnpj($doador->getCpf()) ?></td>
                <td><?= Formatador::formataTelefone($doador->getTelefone()) ?></td>
                <td><?= Formatador::formataData($doador->getDataNascimento()) ?></td>
                <td><?= Formatador::formataData($doador->getDataCadastro()) ?></td>
                <td><?= $doador->getIntervaloDoacao() ?></td>
                <td><?= Formatador::formataPreco($doador->getPrecoDoacao()) ?></td>
                <td><?= $doador->getFormaPagamento() ?></td>
                <td><?= Formatador::formataCep($doador->getCep()) ?></td>
                <td><?= $doador->getEndereco() ?></td>
                <td><?= $doador->getNumero() ?></td>
                <td><?= $doador->getBairro() ?></td>
                <td><?= $doador->getCidade() ?></td>
                <td><?= $doador->getUF() ?></td>

                <td>
                    <a href="/editar-doador?id=<?= $doador->getId(); ?>" class="btn btn-info btn-sm">
                        Editar
                    </a>
                    <a href="/excluir-doador?id=<?= $doador->getId(); ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>


<?php require __DIR__ . '/../fim-html.php'; ?>