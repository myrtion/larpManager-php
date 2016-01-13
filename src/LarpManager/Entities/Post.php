<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-01 09:25:47.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BasePost;

/**
 * LarpManager\Entities\Post
 *
 * @Entity()
 */
class Post extends BasePost
{
	/**
	 * constructeur
	 */
	public function __construct()
	{
		parent::__construct();
		$this->setCreationDate(new \Datetime('NOW'));
		$this->setUpdateDate(new \Datetime('NOW'));
	}
	
	/**
	 * Fourni le nombre de vue de ce post
	 */
	public function getViews()
	{
		return $this->getPostViews()->count();
	}
	
	/**
	 * Fourni le post initial (ou a défaut lui-même)
	 */
	public function getAncestor()
	{
		if ( $this->getPost() )
		{
			return $this->getPost()->getAncestor();
		}
		return $this;
	}
	
	/**
	 * Fourni tous les users ayant répondu à ce post (ainsi que l'auteur initial)
	 */
	public function getWatchingUsers()
	{
		$users = new ArrayCollection();
		
		$users[] = $this->getUser();
		
		foreach ( $this->getPosts()	as $post)
		{
			$users[] = $post->getUser();
		}
		
		return $users;
	}
	
	/**
	 * Determine si le post est un post racine
	 */
	public function isRoot()
	{
		return ( $this->getPost() == null );
	}
			
}