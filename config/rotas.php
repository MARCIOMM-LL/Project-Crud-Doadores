<?php

return [
    '/novo-doador' => \Src\Crud\Controller\Doadores\FormularioInsercaoDoador::class,
    '/salvar-doador' => \Src\Crud\Controller\Doadores\PersistenciaDoador::class,
    '/listar-doadores' => \Src\Crud\Controller\Doadores\ListaDoadores::class,
    '/editar-doador' => \Src\Crud\Controller\Doadores\FormularioEdicaoDoador::class,
    '/excluir-doador' => \Src\Crud\Controller\Doadores\ExclusaoDoador::class,
];