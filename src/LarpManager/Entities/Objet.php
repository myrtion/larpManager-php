<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-07 22:08:08.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseObjet;

/**
 * LarpManager\Entities\Objet
 *
 * @Entity()
 */
class Objet extends BaseObjet
{

	public function findAllCounted() {
		return $this->getEntityManager()
		->createQuery('SELECT COUNT(a) FROM Objet a')
		->getSingleScalarResult();
	}
	
	/**
	 * Get Users entity related by `responsable_id` (many to one).
	 *
	 * @return \LarpManager\Entities\Users
	 */
	public function getResponsable() {
		return $this->getUsersRelatedByResponsableId();
	}
	
	/**
	 * Set Users entity related by `responsable_id` (many to one).
	 *
	 * @param \LarpManager\Entities\Users $users
	 * @return \LarpManager\Entities\Objet
	 */
	function setResponsable(Users $users = null) {
		return $this->setUsersRelatedByResponsableId($users);
	}
	
	/**
	 * Get Users entity related by `createur_id` (many to one).
	 *
	 * @return \LarpManager\Entities\Users
	 */
	function getCreateur() {
		return $this->getUsersRelatedByResponsableId();
	}

	/**
	 * Set Users entity related by `createur_id` (many to one).
	 *
	 * @param \LarpManager\Entities\Users $users
	 * @return \LarpManager\Entities\Objet
	 */
	function setCreateur(Users $users = null) {
		return $this->setUsersRelatedByCreateurId($users);
	}
}