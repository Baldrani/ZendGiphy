<?php

declare(strict_types=1);

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

final class PingControllerFactory
{
    public function __invoke(ContainerInterface $container) : PingController
    {
        $date = $container->get(\DateTimeImmutable::class);

        $entityManage = $container->get(EntityManager::class);
        $filmRepository = $entityManage->getRepository(Film::class);

        return new PingController($date, $filmRepository;
    }
}
