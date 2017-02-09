<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-09 11:20:17.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Intrigue
 *
 * @Entity()
 * @Table(name="intrigue", indexes={@Index(name="fk_intrigue_user1_idx", columns={"user_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseIntrigue", "extended":"Intrigue"})
 */
class BaseIntrigue
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="text")
     */
    protected $description;

    /**
     * @Column(type="string", length=45)
     */
    protected $titre;

    /**
     * @Column(name="`text`", type="text")
     */
    protected $text;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $resolution;

    /**
     * @Column(type="datetime")
     */
    protected $date_creation;

    /**
     * @Column(type="datetime")
     */
    protected $date_update;

    /**
     * @OneToMany(targetEntity="IntrigueHasEvenement", mappedBy="intrigue", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="intrigue_id", nullable=false)
     */
    protected $intrigueHasEvenements;

    /**
     * @OneToMany(targetEntity="IntrigueHasGroupe", mappedBy="intrigue", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="intrigue_id", nullable=false)
     */
    protected $intrigueHasGroupes;

    /**
     * @OneToMany(targetEntity="IntrigueHasModification", mappedBy="intrigue", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="intrigue_id", nullable=false)
     */
    protected $intrigueHasModifications;

    /**
     * @OneToMany(targetEntity="IntrigueHasObjectif", mappedBy="intrigue", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="intrigue_id", nullable=false)
     */
    protected $intrigueHasObjectifs;

    /**
     * @OneToMany(targetEntity="Relecture", mappedBy="intrigue", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="intrigue_id", nullable=false)
     */
    protected $relectures;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="intrigues")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    public function __construct()
    {
        $this->intrigueHasEvenements = new ArrayCollection();
        $this->intrigueHasGroupes = new ArrayCollection();
        $this->intrigueHasModifications = new ArrayCollection();
        $this->intrigueHasObjectifs = new ArrayCollection();
        $this->relectures = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Intrigue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Intrigue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of titre.
     *
     * @param string $titre
     * @return \LarpManager\Entities\Intrigue
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of titre.
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of text.
     *
     * @param string $text
     * @return \LarpManager\Entities\Intrigue
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of resolution.
     *
     * @param string $resolution
     * @return \LarpManager\Entities\Intrigue
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get the value of resolution.
     *
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set the value of date_creation.
     *
     * @param \DateTime $date_creation
     * @return \LarpManager\Entities\Intrigue
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of date_creation.
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_update.
     *
     * @param \DateTime $date_update
     * @return \LarpManager\Entities\Intrigue
     */
    public function setDateUpdate($date_update)
    {
        $this->date_update = $date_update;

        return $this;
    }

    /**
     * Get the value of date_update.
     *
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }

    /**
     * Add IntrigueHasEvenement entity to collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasEvenement $intrigueHasEvenement
     * @return \LarpManager\Entities\Intrigue
     */
    public function addIntrigueHasEvenement(IntrigueHasEvenement $intrigueHasEvenement)
    {
        $this->intrigueHasEvenements[] = $intrigueHasEvenement;

        return $this;
    }

    /**
     * Remove IntrigueHasEvenement entity from collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasEvenement $intrigueHasEvenement
     * @return \LarpManager\Entities\Intrigue
     */
    public function removeIntrigueHasEvenement(IntrigueHasEvenement $intrigueHasEvenement)
    {
        $this->intrigueHasEvenements->removeElement($intrigueHasEvenement);

        return $this;
    }

    /**
     * Get IntrigueHasEvenement entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntrigueHasEvenements()
    {
        return $this->intrigueHasEvenements;
    }

    /**
     * Add IntrigueHasGroupe entity to collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasGroupe $intrigueHasGroupe
     * @return \LarpManager\Entities\Intrigue
     */
    public function addIntrigueHasGroupe(IntrigueHasGroupe $intrigueHasGroupe)
    {
        $this->intrigueHasGroupes[] = $intrigueHasGroupe;

        return $this;
    }

    /**
     * Remove IntrigueHasGroupe entity from collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasGroupe $intrigueHasGroupe
     * @return \LarpManager\Entities\Intrigue
     */
    public function removeIntrigueHasGroupe(IntrigueHasGroupe $intrigueHasGroupe)
    {
        $this->intrigueHasGroupes->removeElement($intrigueHasGroupe);

        return $this;
    }

    /**
     * Get IntrigueHasGroupe entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntrigueHasGroupes()
    {
        return $this->intrigueHasGroupes;
    }

    /**
     * Add IntrigueHasModification entity to collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasModification $intrigueHasModification
     * @return \LarpManager\Entities\Intrigue
     */
    public function addIntrigueHasModification(IntrigueHasModification $intrigueHasModification)
    {
        $this->intrigueHasModifications[] = $intrigueHasModification;

        return $this;
    }

    /**
     * Remove IntrigueHasModification entity from collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasModification $intrigueHasModification
     * @return \LarpManager\Entities\Intrigue
     */
    public function removeIntrigueHasModification(IntrigueHasModification $intrigueHasModification)
    {
        $this->intrigueHasModifications->removeElement($intrigueHasModification);

        return $this;
    }

    /**
     * Get IntrigueHasModification entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntrigueHasModifications()
    {
        return $this->intrigueHasModifications;
    }

    /**
     * Add IntrigueHasObjectif entity to collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasObjectif $intrigueHasObjectif
     * @return \LarpManager\Entities\Intrigue
     */
    public function addIntrigueHasObjectif(IntrigueHasObjectif $intrigueHasObjectif)
    {
        $this->intrigueHasObjectifs[] = $intrigueHasObjectif;

        return $this;
    }

    /**
     * Remove IntrigueHasObjectif entity from collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasObjectif $intrigueHasObjectif
     * @return \LarpManager\Entities\Intrigue
     */
    public function removeIntrigueHasObjectif(IntrigueHasObjectif $intrigueHasObjectif)
    {
        $this->intrigueHasObjectifs->removeElement($intrigueHasObjectif);

        return $this;
    }

    /**
     * Get IntrigueHasObjectif entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntrigueHasObjectifs()
    {
        return $this->intrigueHasObjectifs;
    }

    /**
     * Add Relecture entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Relecture $relecture
     * @return \LarpManager\Entities\Intrigue
     */
    public function addRelecture(Relecture $relecture)
    {
        $this->relectures[] = $relecture;

        return $this;
    }

    /**
     * Remove Relecture entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Relecture $relecture
     * @return \LarpManager\Entities\Intrigue
     */
    public function removeRelecture(Relecture $relecture)
    {
        $this->relectures->removeElement($relecture);

        return $this;
    }

    /**
     * Get Relecture entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRelectures()
    {
        return $this->relectures;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Intrigue
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (many to one).
     *
     * @return \LarpManager\Entities\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __sleep()
    {
        return array('id', 'description', 'titre', 'text', 'resolution', 'date_creation', 'date_update', 'user_id');
    }
}