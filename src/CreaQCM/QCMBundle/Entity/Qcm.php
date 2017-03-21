<?php

namespace CreaQCM\QCMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qcm
 *
 * @ORM\Table(name="qcm")
 * @ORM\Entity(repositoryClass="CreaQCM\QCMBundle\Repository\QcmRepository")
 */
class Qcm
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="qcm", cascade={"persist"})
     */
    protected $questions;

    /**
     * @ORM\OneToMany(targetEntity="Resultat", mappedBy="qcm")
     */
    protected $results;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Qcm
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add question
     *
     * @param \CreaQCM\QCMBundle\Entity\Question $question
     *
     * @return Qcm
     */
    public function addQuestion(\CreaQCM\QCMBundle\Entity\Question $question)
    {
        $this->questions[] = $question;
        $question->setQcm($this);

        return $this;
    }

    /**
     * Remove question
     *
     * @param \CreaQCM\QCMBundle\Entity\Question $question
     */
    public function removeQuestion(\CreaQCM\QCMBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add result
     *
     * @param \CreaQCM\QCMBundle\Entity\Resultat $result
     *
     * @return Qcm
     */
    public function addResult(\CreaQCM\QCMBundle\Entity\Resultat $result)
    {
        $this->results[] = $result;

        return $this;
    }

    /**
     * Remove result
     *
     * @param \CreaQCM\QCMBundle\Entity\Resultat $result
     */
    public function removeResult(\CreaQCM\QCMBundle\Entity\Resultat $result)
    {
        $this->results->removeElement($result);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResults()
    {
        return $this->results;
    }
}
