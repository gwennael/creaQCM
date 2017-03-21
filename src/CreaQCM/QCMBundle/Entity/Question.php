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
     * @ORM\Column(name="responses", type="array")
     */
    private $responses;

    /**
     * @ORM\OneToMany(targetEntity="Choice", mappedBy="question")
     */
    protected $choices;

    /**
     * @ORM\ManyToOne(targetEntity="Qcm", inversedBy="questions")
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */
    protected $qcm;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->choices = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set responses
     *
     * @param array $responses
     *
     * @return Question
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return array
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Add choice
     *
     * @param \CreaQCM\QCMBundle\Entity\Choice $choice
     *
     * @return Question
     */
    public function addChoice(\CreaQCM\QCMBundle\Entity\Choice $choice)
    {
        $this->choices[] = $choice;

        return $this;
    }

    /**
     * Remove choice
     *
     * @param \CreaQCM\QCMBundle\Entity\Choice $choice
     */
    public function removeChoice(\CreaQCM\QCMBundle\Entity\Choice $choice)
    {
        $this->choices->removeElement($choice);
    }

    /**
     * Get choices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChoices()
    {
        return $this->choices;
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
