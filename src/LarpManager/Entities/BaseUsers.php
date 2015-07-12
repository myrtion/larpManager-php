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
 * LarpManager\Entities\Users
 *
 * @Entity()
 * @Table(name="users", uniqueConstraints={@UniqueConstraint(name="email_UNIQUE", columns={"email"}), @UniqueConstraint(name="username_UNIQUE", columns={"username"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseUsers", "extended":"Users"})
 */
class BaseUsers
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=100)
     */
    protected $email;

    /**
     * @Column(name="`password`", type="string", length=255, nullable=true)
     */
    protected $password;

    /**
     * @Column(type="string", length=255)
     */
    protected $salt;

    /**
     * @Column(type="string", length=255)
     */
    protected $roles;

    /**
     * @Column(name="`name`", type="string", length=100)
     */
    protected $name;

    /**
     * @Column(type="integer", options={"unsigned":true})
     */
    protected $time_created;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $username;

    /**
     * @Column(type="boolean")
     */
    protected $isEnabled;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $confirmationToken;

    /**
     * @Column(type="integer", nullable=true, options={"unsigned":true})
     */
    protected $timePasswordResetRequested;

    /**
     * @OneToMany(targetEntity="Objet", mappedBy="usersRelatedByResponsableId")
     * @JoinColumn(name="id", referencedColumnName="responsable_id")
     */
    protected $objetRelatedByResponsableIds;

    /**
     * @OneToMany(targetEntity="Objet", mappedBy="usersRelatedByCreateurId")
     * @JoinColumn(name="id", referencedColumnName="createur_id")
     */
    protected $objetRelatedByCreateurIds;

    /**
     * @OneToMany(targetEntity="Personnage", mappedBy="users")
     * @JoinColumn(name="id", referencedColumnName="users_id")
     */
    protected $personnages;

    public function __construct()
    {
        $this->objetRelatedByResponsableIds = new ArrayCollection();
        $this->objetRelatedByCreateurIds = new ArrayCollection();
        $this->personnages = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Users
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
     * Set the value of email.
     *
     * @param string $email
     * @return \LarpManager\Entities\Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * @return \LarpManager\Entities\Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of salt.
     *
     * @param string $salt
     * @return \LarpManager\Entities\Users
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get the value of salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set the value of roles.
     *
     * @param string $roles
     * @return \LarpManager\Entities\Users
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get the value of roles.
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \LarpManager\Entities\Users
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of time_created.
     *
     * @param integer $time_created
     * @return \LarpManager\Entities\Users
     */
    public function setTimeCreated($time_created)
    {
        $this->time_created = $time_created;

        return $this;
    }

    /**
     * Get the value of time_created.
     *
     * @return integer
     */
    public function getTimeCreated()
    {
        return $this->time_created;
    }

    /**
     * Set the value of username.
     *
     * @param string $username
     * @return \LarpManager\Entities\Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of isEnabled.
     *
     * @param boolean $isEnabled
     * @return \LarpManager\Entities\Users
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get the value of isEnabled.
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Set the value of confirmationToken.
     *
     * @param string $confirmationToken
     * @return \LarpManager\Entities\Users
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get the value of confirmationToken.
     *
     * @return string
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set the value of timePasswordResetRequested.
     *
     * @param integer $timePasswordResetRequested
     * @return \LarpManager\Entities\Users
     */
    public function setTimePasswordResetRequested($timePasswordResetRequested)
    {
        $this->timePasswordResetRequested = $timePasswordResetRequested;

        return $this;
    }

    /**
     * Get the value of timePasswordResetRequested.
     *
     * @return integer
     */
    public function getTimePasswordResetRequested()
    {
        return $this->timePasswordResetRequested;
    }

    /**
     * Add Objet entity related by `responsable_id` to collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Users
     */
    public function addObjetRelatedByResponsableId(Objet $objet)
    {
        $this->objetRelatedByResponsableIds[] = $objet;

        return $this;
    }

    /**
     * Remove Objet entity related by `responsable_id` from collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Users
     */
    public function removeObjetRelatedByResponsableId(Objet $objet)
    {
        $this->objetRelatedByResponsableIds->removeElement($objet);

        return $this;
    }

    /**
     * Get Objet entity related by `responsable_id` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjetRelatedByResponsableIds()
    {
        return $this->objetRelatedByResponsableIds;
    }

    /**
     * Add Objet entity related by `createur_id` to collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Users
     */
    public function addObjetRelatedByCreateurId(Objet $objet)
    {
        $this->objetRelatedByCreateurIds[] = $objet;

        return $this;
    }

    /**
     * Remove Objet entity related by `createur_id` from collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Users
     */
    public function removeObjetRelatedByCreateurId(Objet $objet)
    {
        $this->objetRelatedByCreateurIds->removeElement($objet);

        return $this;
    }

    /**
     * Get Objet entity related by `createur_id` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjetRelatedByCreateurIds()
    {
        return $this->objetRelatedByCreateurIds;
    }

    /**
     * Add Personnage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Users
     */
    public function addPersonnage(Personnage $personnage)
    {
        $this->personnages[] = $personnage;

        return $this;
    }

    /**
     * Remove Personnage entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Users
     */
    public function removePersonnage(Personnage $personnage)
    {
        $this->personnages->removeElement($personnage);

        return $this;
    }

    /**
     * Get Personnage entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }

    public function __sleep()
    {
        return array('id', 'email', 'password', 'salt', 'roles', 'name', 'time_created', 'username', 'isEnabled', 'confirmationToken', 'timePasswordResetRequested');
    }
}