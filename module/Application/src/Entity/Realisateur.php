<?php

declare(strict_type=1);

namespace Application\Entity;

use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;



/**
 * Class Film
 *
 * Attention : Doctrine génère des classes proxy qui étendent les entités, celles-ci ne peuvent donc pas être finales !
 *
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="realisateurs")
 */
class Realisateur
{
    /**
     * Many Realisateur have Many Films.
     * @ORM\ManyToMany(targetEntity="Film")
     * @ORM\JoinTable(name="users_film",
     *      joinColumns={@ORM\JoinColumn(name="realisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="id")}
     *      )
     */
    private $films;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     **/
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $name;


    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
        $this->films = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $title
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

}
