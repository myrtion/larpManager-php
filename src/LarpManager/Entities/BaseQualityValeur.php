<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-09-30 09:56:55.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\QualityValeur
 *
 * @Entity()
 * @Table(name="quality_valeur", indexes={@Index(name="fk_qualite_valeur_qualite1_idx", columns={"quality_id"}), @Index(name="fk_qualite_valeur_monnaie1_idx", columns={"monnaie_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseQualityValeur", "extended":"QualityValeur"})
 */
class BaseQualityValeur
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="integer")
     */
    protected $nombre;

    /**
     * @ManyToOne(targetEntity="Quality", inversedBy="qualityValeurs", cascade={"persist", "remove"})
     * @JoinColumn(name="quality_id", referencedColumnName="id", nullable=false)
     */
    protected $quality;

    /**
     * @ManyToOne(targetEntity="Monnaie", inversedBy="qualityValeurs")
     * @JoinColumn(name="monnaie_id", referencedColumnName="id", nullable=false)
     */
    protected $monnaie;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\QualityValeur
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
     * Set the value of nombre.
     *
     * @param integer $nombre
     * @return \LarpManager\Entities\QualityValeur
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
     * Set Quality entity (many to one).
     *
     * @param \LarpManager\Entities\Quality $quality
     * @return \LarpManager\Entities\QualityValeur
     */
    public function setQuality(Quality $quality = null)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get Quality entity (many to one).
     *
     * @return \LarpManager\Entities\Quality
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set Monnaie entity (many to one).
     *
     * @param \LarpManager\Entities\Monnaie $monnaie
     * @return \LarpManager\Entities\QualityValeur
     */
    public function setMonnaie(Monnaie $monnaie = null)
    {
        $this->monnaie = $monnaie;

        return $this;
    }

    /**
     * Get Monnaie entity (many to one).
     *
     * @return \LarpManager\Entities\Monnaie
     */
    public function getMonnaie()
    {
        return $this->monnaie;
    }

    public function __sleep()
    {
        return array('id', 'quality_id', 'monnaie_id', 'nombre');
    }
}