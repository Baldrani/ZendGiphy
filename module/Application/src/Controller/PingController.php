<?php

declare(strict_types=1);

namespace Application\Controller;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Console\Command\ClearCache\EntityRegionCommand;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

final class PingController extends AbstractActionController implement PingControllerInterface
{
    /**
     * @var \DateTimeImmutable
     */
    private $dateTime;

    public function __construct(\DateTimeImmutable $dateTime, EntityRepository $filmRepository)
    {
        $this->dateTime = $dateTime;
    }

    public function pingAction() : ViewModel
    {
        return new ViewModel([
            'date' => $this->dateTime,
        ]);
    }
}
