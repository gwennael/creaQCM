<?php

namespace CreaQCM\QCMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="CreaQCM\QCMBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="ask", type="string", length=255)
     */
    private $ask;

    /**
     * @var array
     *
     * @ORM\Column(name="response", type="array")
     */
    private $response;

    /**
     * @var array
     *
     * @ORM\Column(name="choice", type="array")
     */
    private $choice;

    /**
     * @ORM\ManyToOne(targetEntity="Qcm", inversedBy="questions")
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */
    protected $qcm;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ask
     *
     * @param string $ask
     *
     * @return Question
     */
    public function setAsk($ask)
    {
        $this->ask = $ask;

        return $this;
    }

    /**
     * Get ask
     *
     * @return string
     */
    public function getAsk()
    {
        return $this->ask;
    }

    /**
     * Set response
     *
     * @param array $response
     *
     * @return Question
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set choice
     *
     * @param array $choice
     *
     * @return Question
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return array
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * Set qcm
     *
     * @param \CreaQCM\QCMBundle\Entity\Qcm $qcm
     *
     * @return Question
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
