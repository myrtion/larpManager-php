<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-02 20:39:27.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use LarpManager\Entities\BaseLangue;

/**
 * LarpManager\Entities\Langue
 *
 * @Entity(repositoryClass="LarpManager\Repository\LangueRepository")
 */
class Langue extends BaseLangue
{
	
	/**
	 * @ManyToMany(targetEntity="Territoire", mappedBy="langues")
	 */
	protected $territoireSecondaires;
	
	public function __construct()
	{
		$this->territoireSecondaires = new ArrayCollection();
		parent::__construct();
	}
	
	public function __toString()
	{
		return $this->getLabel();
	}
	
	public function getTerritoireSecondaires()
	{
		return $this->territoireSecondaires;
	}
	
	public function addTerritoireSecondaire(Territoire $territoire)
	{
		$this->territoireSecondaires[] = $territoire;
		return $this;
	}
	
	public function removeTerritoireSecondaire(Territoire $territoire)
	{
		$this->territoireSecondaires->removeElement($territoire);
		return $this;
		
	}
		
	/**
	 * Fourni la liste des territoires ou la langue est la langue principale.
	 */
	public function getTerritoirePrincipaux()
	{
		return $this->getTerritoires();
	}
}