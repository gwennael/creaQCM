<?php

namespace CreaQCM\QCMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choice
 *
 * @ORM\Table(name="choice")
 * @ORM\Entity(repositoryClass="CreaQCM\QCMBundle\Repository\ChoiceRepository")
 */
class Choice
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
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="choices")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    protected $question;


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
     * Set value
     *
     * @param string $value
     *
     * @return Choice
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set question
     *
     * @param \CreaQCM\QCMBundle\Entity\Question $question
     *
     * @return Choice
     */
    public function setQuestion(\CreaQCM\QCMBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \CreaQCM\QCMBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
