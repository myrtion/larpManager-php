<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-22 16:18:28.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseParticipant;

/**
 * LarpManager\Entities\Participant
 *
 * @Entity()
 */
class Participant extends BaseParticipant
{
	public function __toString()
	{
		return $this->getUser()->getDisplayName();
	}
			
	
}