<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-09 21:05:27.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\JoueurGn
 *
 * @Entity()
 * @Table(name="joueur_gn", indexes={@Index(name="fk_joueur_gn_joueur1_idx", columns={"joueur_id"}), @Index(name="fk_joueur_gn_gn1_idx", columns={"gn_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseJoueurGn", "extended":"JoueurGn"})
 */
class BaseJoueurGn
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="datetime")
     */
    protected $subscription_date;

    /**
     * @ManyToOne(targetEntity="Joueur", inversedBy="joueurGns", cascade={"persist"})
     * @JoinColumn(name="joueur_id", referencedColumnName="id")
     */
    protected $joueur;

    /**
     * @ManyToOne(targetEntity="Gn", inversedBy="joueurGns", cascade={"persist"})
     * @JoinColumn(name="gn_id", referencedColumnName="id")
     */
    protected $gn;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\JoueurGn
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
     * Set the value of subscription_date.
     *
     * @param \DateTime $subscription_date
     * @return \LarpManager\Entities\JoueurGn
     */
    public function setSubscriptionDate($subscription_date)
    {
        $this->subscription_date = $subscription_date;

        return $this;
    }

    /**
     * Get the value of subscription_date.
     *
     * @return \DateTime
     */
    public function getSubscriptionDate()
    {
        return $this->subscription_date;
    }

    /**
     * Set Joueur entity (many to one).
     *
     * @param \LarpManager\Entities\Joueur $joueur
     * @return \LarpManager\Entities\JoueurGn
     */
    public function setJoueur(Joueur $joueur = null)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get Joueur entity (many to one).
     *
     * @return \LarpManager\Entities\Joueur
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set Gn entity (many to one).
     *
     * @param \LarpManager\Entities\Gn $gn
     * @return \LarpManager\Entities\JoueurGn
     */
    public function setGn(Gn $gn = null)
    {
        $this->gn = $gn;

        return $this;
    }

    /**
     * Get Gn entity (many to one).
     *
     * @return \LarpManager\Entities\Gn
     */
    public function getGn()
    {
        return $this->gn;
    }

    public function __sleep()
    {
        return array('id', 'joueur_id', 'gn_id', 'subscription_date');
    }
}