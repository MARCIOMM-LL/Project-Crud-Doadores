<?php

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \Src\Crud\Infra\EntitymanagerCreator())->getEntityManager();
    },
]);

return $builder->build();