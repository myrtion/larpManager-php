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
 * LarpManager\Entities\Localisation
 *
 * @Entity()
 * @Table(name="localisation")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseLocalisation", "extended":"Localisation"})
 */
class BaseLocalisation
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $label;

    /**
     * @Column(name="`precision`", type="string", length=45, nullable=true)
     */
    protected $precision;

    /**
     * @OneToMany(targetEntity="Objet", mappedBy="localisation")
     * @JoinColumn(name="id", referencedColumnName="localisation_id")
     */
    protected $objets;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Localisation
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
     * Set the value of label.
     *
     * @param string $label
     * @return \LarpManager\Entities\Localisation
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of precision.
     *
     * @param string $precision
     * @return \LarpManager\Entities\Localisation
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * Get the value of precision.
     *
     * @return string
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Add Objet entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Localisation
     */
    public function addObjet(Objet $objet)
    {
        $this->objets[] = $objet;

        return $this;
    }

    /**
     * Remove Objet entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Localisation
     */
    public function removeObjet(Objet $objet)
    {
        $this->objets->removeElement($objet);

        return $this;
    }

    /**
     * Get Objet entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjets()
    {
        return $this->objets;
    }

    public function __sleep()
    {
        return array('id', 'label', 'precision');
    }
}