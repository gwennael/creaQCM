<?php

namespace CreaQCM\QCMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultat
 *
 * @ORM\Table(name="resultat")
 * @ORM\Entity(repositoryClass="CreaQCM\QCMBundle\Repository\ResultatRepository")
 */
class Resultat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var array
     *
     * @ORM\Column(name="result", type="array")
     */
    private $result;

    /**
     * @ORM\ManyToOne(targetEntity="Qcm", inversedBy="results")
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */
    protected $qcm;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Resultat
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set result
     *
     * @param array $result
     *
     * @return Resultat
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set qcm
     *
     * @param \CreaQCM\QCMBundle\Entity\Qcm $qcm
     *
     * @return Resultat
     */
    public function setQcm(\CreaQCM\QCMBundle\Entity\Qcm $qcm = null)
    {
        $this->qcm = $qcm;

        return $this;
    }

    /**
     * Get qcm
     *
     * @return \CreaQCM\QCMBundle\Entity\Qcm
     */
    public function getQcm()
    {
        return $this->qcm;
    }
}
