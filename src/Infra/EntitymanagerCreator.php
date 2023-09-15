<?php

namespace Src\Crud\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntitymanagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../Entity'], true);
        $dadosConexao = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'db_doadores',
            'user' => 'root',
            'password' => '1112marci-O'
        ];

        //$dadosConexao = [
        //    'driver' => 'pdo_pgsql',
        //    'host' => 'localhost',
        //    'dbname' => 'db_doadores',
        //    'user' => 'postgres',
        //    'password' => '1112'
        //];

        return EntityManager::create($dadosConexao, $config);
    }
}
