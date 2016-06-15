<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-04-22 11:35:06.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseSort;

/**
 * LarpManager\Entities\Sort
 *
 * @Entity(repositoryClass="LarpManager\Repository\SortRepository")
 */
class Sort extends BaseSort
{
	public function getFullLabel()
	{
		return $this->getLabel() .' - '. $this->getDomaine()->getLabel() .' Niveau '. $this->getNiveau();
	}
}