<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-12 12:42:57.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Objet
 *
 * @Entity()
 * @Table(name="objet", indexes={@Index(name="fk_objet_localisation1_idx", columns={"localisation_id"}), @Index(name="fk_objet_etat1_idx", columns={"etat_id"}), @Index(name="fk_objet_possesseur1_idx", columns={"proprietaire_id"}), @Index(name="fk_objet_users1_idx", columns={"responsable_id"}), @Index(name="fk_objet_users2_idx", columns={"createur_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseObjet", "extended":"Objet"})
 */
class BaseObjet
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $code;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $photo;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $nom;

    /**
     * @Column(type="string", length=450, nullable=true)
     */
    protected $description;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $localisation_id;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $etat_id;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $taille;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $poid;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $couleur;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $proprietaire_id;

    /**
     * @Column(type="integer", nullable=true, options={"unsigned":true})
     */
    protected $responsable_id;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $nombre;

    /**
     * @Column(type="float", nullable=true)
     */
    protected $cout;

    /**
     * @Column(type="float", nullable=true)
     */
    protected $budget;

    /**
     * @Column(type="boolean", nullable=true)
     */
    protected $investissement;

    /**
     * @Column(type="date", nullable=true)
     */
    protected $creation_date;

    /**
     * @Column(type="integer", nullable=true, options={"unsigned":true})
     */
    protected $createur_id;

    /**
     * @ManyToOne(targetEntity="Localisation", inversedBy="objets")
     * @JoinColumn(name="localisation_id", referencedColumnName="id", nullable=true)
     */
    protected $localisation;

    /**
     * @ManyToOne(targetEntity="Etat", inversedBy="objets")
     * @JoinColumn(name="etat_id", referencedColumnName="id", nullable=true)
     */
    protected $etat;

    /**
     * @ManyToOne(targetEntity="Proprietaire", inversedBy="objets")
     * @JoinColumn(name="proprietaire_id", referencedColumnName="id", nullable=true)
     */
    protected $proprietaire;

    /**
     * @ManyToOne(targetEntity="Users", inversedBy="objetRelatedByResponsableIds")
     * @JoinColumn(name="responsable_id", referencedColumnName="id", nullable=true)
     */
    protected $usersRelatedByResponsableId;

    /**
     * @ManyToOne(targetEntity="Users", inversedBy="objetRelatedByCreateurIds")
     * @JoinColumn(name="createur_id", referencedColumnName="id", nullable=true)
     */
    protected $usersRelatedByCreateurId;

    /**
     * @ManyToMany(targetEntity="Tag", inversedBy="objets")
     * @JoinTable(name="objet_tag",
     *     joinColumns={@JoinColumn(name="objet_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    protected $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Objet
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
     * Set the value of code.
     *
     * @param integer $code
     * @return \LarpManager\Entities\Objet
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of photo.
     *
     * @param string $photo
     * @return \LarpManager\Entities\Objet
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of photo.
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of nom.
     *
     * @param string $nom
     * @return \LarpManager\Entities\Objet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Objet
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
     * Set the value of localisation_id.
     *
     * @param integer $localisation_id
     * @return \LarpManager\Entities\Objet
     */
    public function setLocalisationId($localisation_id)
    {
        $this->localisation_id = $localisation_id;

        return $this;
    }

    /**
     * Get the value of localisation_id.
     *
     * @return integer
     */
    public function getLocalisationId()
    {
        return $this->localisation_id;
    }

    /**
     * Set the value of etat_id.
     *
     * @param integer $etat_id
     * @return \LarpManager\Entities\Objet
     */
    public function setEtatId($etat_id)
    {
        $this->etat_id = $etat_id;

        return $this;
    }

    /**
     * Get the value of etat_id.
     *
     * @return integer
     */
    public function getEtatId()
    {
        return $this->etat_id;
    }

    /**
     * Set the value of taille.
     *
     * @param integer $taille
     * @return \LarpManager\Entities\Objet
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get the value of taille.
     *
     * @return integer
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set the value of poid.
     *
     * @param integer $poid
     * @return \LarpManager\Entities\Objet
     */
    public function setPoid($poid)
    {
        $this->poid = $poid;

        return $this;
    }

    /**
     * Get the value of poid.
     *
     * @return integer
     */
    public function getPoid()
    {
        return $this->poid;
    }

    /**
     * Set the value of couleur.
     *
     * @param string $couleur
     * @return \LarpManager\Entities\Objet
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of couleur.
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of proprietaire_id.
     *
     * @param integer $proprietaire_id
     * @return \LarpManager\Entities\Objet
     */
    public function setProprietaireId($proprietaire_id)
    {
        $this->proprietaire_id = $proprietaire_id;

        return $this;
    }

    /**
     * Get the value of proprietaire_id.
     *
     * @return integer
     */
    public function getProprietaireId()
    {
        return $this->proprietaire_id;
    }

    /**
     * Set the value of responsable_id.
     *
     * @param integer $responsable_id
     * @return \LarpManager\Entities\Objet
     */
    public function setResponsableId($responsable_id)
    {
        $this->responsable_id = $responsable_id;

        return $this;
    }

    /**
     * Get the value of responsable_id.
     *
     * @return integer
     */
    public function getResponsableId()
    {
        return $this->responsable_id;
    }

    /**
     * Set the value of nombre.
     *
     * @param integer $nombre
     * @return \LarpManager\Entities\Objet
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return integer
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of cout.
     *
     * @param float $cout
     * @return \LarpManager\Entities\Objet
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get the value of cout.
     *
     * @return float
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set the value of budget.
     *
     * @param float $budget
     * @return \LarpManager\Entities\Objet
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get the value of budget.
     *
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set the value of investissement.
     *
     * @param boolean $investissement
     * @return \LarpManager\Entities\Objet
     */
    public function setInvestissement($investissement)
    {
        $this->investissement = $investissement;

        return $this;
    }

    /**
     * Get the value of investissement.
     *
     * @return boolean
     */
    public function getInvestissement()
    {
        return $this->investissement;
    }

    /**
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\Objet
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of creation_date.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of createur_id.
     *
     * @param integer $createur_id
     * @return \LarpManager\Entities\Objet
     */
    public function setCreateurId($createur_id)
    {
        $this->createur_id = $createur_id;

        return $this;
    }

    /**
     * Get the value of createur_id.
     *
     * @return integer
     */
    public function getCreateurId()
    {
        return $this->createur_id;
    }

    /**
     * Set Localisation entity (many to one).
     *
     * @param \LarpManager\Entities\Localisation $localisation
     * @return \LarpManager\Entities\Objet
     */
    public function setLocalisation(Localisation $localisation = null)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get Localisation entity (many to one).
     *
     * @return \LarpManager\Entities\Localisation
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set Etat entity (many to one).
     *
     * @param \LarpManager\Entities\Etat $etat
     * @return \LarpManager\Entities\Objet
     */
    public function setEtat(Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get Etat entity (many to one).
     *
     * @return \LarpManager\Entities\Etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set Proprietaire entity (many to one).
     *
     * @param \LarpManager\Entities\Proprietaire $proprietaire
     * @return \LarpManager\Entities\Objet
     */
    public function setProprietaire(Proprietaire $proprietaire = null)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get Proprietaire entity (many to one).
     *
     * @return \LarpManager\Entities\Proprietaire
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set Users entity related by `responsable_id` (many to one).
     *
     * @param \LarpManager\Entities\Users $users
     * @return \LarpManager\Entities\Objet
     */
    public function setUsersRelatedByResponsableId(Users $users = null)
    {
        $this->usersRelatedByResponsableId = $users;

        return $this;
    }

    /**
     * Get Users entity related by `responsable_id` (many to one).
     *
     * @return \LarpManager\Entities\Users
     */
    public function getUsersRelatedByResponsableId()
    {
        return $this->usersRelatedByResponsableId;
    }

    /**
     * Set Users entity related by `createur_id` (many to one).
     *
     * @param \LarpManager\Entities\Users $users
     * @return \LarpManager\Entities\Objet
     */
    public function setUsersRelatedByCreateurId(Users $users = null)
    {
        $this->usersRelatedByCreateurId = $users;

        return $this;
    }

    /**
     * Get Users entity related by `createur_id` (many to one).
     *
     * @return \LarpManager\Entities\Users
     */
    public function getUsersRelatedByCreateurId()
    {
        return $this->usersRelatedByCreateurId;
    }

    /**
     * Add Tag entity to collection.
     *
     * @param \LarpManager\Entities\Tag $tag
     * @return \LarpManager\Entities\Objet
     */
    public function addTag(Tag $tag)
    {
        $tag->addObjet($this);
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove Tag entity from collection.
     *
     * @param \LarpManager\Entities\Tag $tag
     * @return \LarpManager\Entities\Objet
     */
    public function removeTag(Tag $tag)
    {
        $tag->removeObjet($this);
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * Get Tag entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function __sleep()
    {
        return array('id', 'code', 'photo', 'nom', 'description', 'localisation_id', 'etat_id', 'taille', 'poid', 'couleur', 'proprietaire_id', 'responsable_id', 'nombre', 'cout', 'budget', 'investissement', 'creation_date', 'createur_id');
    }
}