<?php
namespace LarpManager\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

use LarpManager\Form\PostForm;
use LarpManager\Form\TopicForm;
use LarpManager\ForumRightManager;

/**
 * LarpManager\Controllers\ForumController
 *
 * @author kevin
 *
 */
class ForumController
{	
	/**
	 * Liste des forums de premier niveau
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function forumAction(Request $request, Application $app)
	{
		$topics = $app['orm.em']->getRepository('\LarpManager\Entities\Topic')
					->findAllRoot();
		
		$view = $app['twig']->render('forum/root.twig', array(
				'topics' => $topics,
		));
		
		return $view;
		
	}
	
	/**
	 * Ajout d'un forum de premier niveau
	 * (admin uniquement)
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function forumAddAction(Request $request, Application $app)
	{
		$topic = new \LarpManager\Entities\Topic();
		
		$form = $app['form.factory']->createBuilder(new TopicForm(), $topic)
			->add('save','submit', array('label' => "Sauvegarder"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$topic = $form->getData();
			$topic->setUser($app['user']);
			
			$app['orm.em']->persist($topic);
			$app['orm.em']->flush();
			
			$app['session']->getFlashBag()->add('success', 'Le forum a été ajouté.');
			
			return $app->redirect($app['url_generator']->generate('forum'),301);
		}
		
		return $app['twig']->render('forum/forum_add.twig', array(
				'form' => $form->createView(),	
		));
	}
	
	/**
	 * Détail d'un topic
	 * 
	 * @param Request $request
	 * @param Application $app
	 * @return View $view
	 */
	public function topicAction(Request $request, Application $app)
	{
		$id = $request->get('index');

		$topic = $app['orm.em']->getRepository('\LarpManager\Entities\Topic')->find($id);
		
		// vérification des droits
		if ( ! $app['forum.manager']->right($topic,$app['user']) )
		{
			$app['session']->getFlashBag()->add('error', 'Vous n\'avez pas les droits necessaires pour acceder à ce forum');
			return $app->redirect($app['url_generator']->generate('forum'),301);
		}

		$view = $app['twig']->render('forum/topic.twig', array(
				'topic' => $topic,
		));
		return $view;
	}
		
	/**
	 * Ajout d'un post dans un topic
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function postAddAction(Request $request, Application $app)
	{
		$topicId = $request->get('index');
		
		$topic = $app['orm.em']->getRepository('\LarpManager\Entities\Topic')
					->find($topicId);
		
		// vérification des droits
		if ( ! $app['forum.manager']->right($topic,$app['user']) )
		{
			$app['session']->getFlashBag()->add('error', 'Vous n\'avez pas les droits necessaires pour ajouter un message dans ce forum');
			return $app->redirect($app['url_generator']->generate('forum'),301);
		}
		
		$post = new \LarpManager\Entities\Post();
		$post->setTopic($topic);
		
		$form = $app['form.factory']->createBuilder(new PostForm(), $post)
			->add('save','submit', array('label' => "Sauvegarder"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$post = $form->getData();			
			$post->setTopic($topic);
			$post->setUser($app['user']);
			
			$app['orm.em']->persist($post);
			$app['orm.em']->flush();
			
			$app['session']->getFlashBag()->add('success', 'Le message a été ajouté.');
			
			return $app->redirect($app['url_generator']->generate('forum.topic',array('index'=> $topic->getId())),301);
		}
			
		return $app['twig']->render('forum/post_add.twig', array(
				'form' => $form->createView(),
				'topic' => $topic,
		));
	}
	
	
	/**
	 * Lire un post
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function postAction(Request $request, Application $app)
	{
		$postId = $request->get('index');
		
		$post = $app['orm.em']->getRepository('\LarpManager\Entities\Post')
							->find($postId);
		
		// vérification des droits
		if ( ! $app['forum.manager']->right($post->getTopic(),$app['user']) )
		{
			$app['session']->getFlashBag()->add('error', 'Vous n\'avez pas les droits necessaires pour lire ce message');
			return $app->redirect($app['url_generator']->generate('forum'),301);
		}
							
		return $app['twig']->render('forum/post.twig', array(
				'post' => $post,
		));
	}
	
	/**
	 * Répondre à un post
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function postResponseAction(Request $request, Application $app)
	{
		$postId = $request->get('index');
		
		$postToResponse = $app['orm.em']->getRepository('\LarpManager\Entities\Post')
							->find($postId);
							
		// vérification des droits
		if ( ! $app['forum.manager']->right($postToResponse->getTopic(),$app['user']) )
		{
			$app['session']->getFlashBag()->add('error', 'Vous n\'avez pas les droits necessaires pour lire ce message');
			return $app->redirect($app['url_generator']->generate('forum'),301);
		}
		
		$post = new \LarpManager\Entities\Post();
		$post->setTitle($postToResponse->getTitle());
		
		$form = $app['form.factory']->createBuilder(new PostForm(), $post)
			->add('save','submit', array('label' => "Sauvegarder"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$post = $form->getData();
			$post->setPost($postToResponse);
			$post->setUser($app['user']);
				
			$app['orm.em']->persist($post);
			$app['orm.em']->flush();
				
			$app['session']->getFlashBag()->add('success', 'Le message a été ajouté.');
				
			return $app->redirect($app['url_generator']->generate('forum.post',array('index'=> $postToResponse->getId())),301);
		}
	
		return $app['twig']->render('forum/post_response.twig', array(
				'form' => $form->createView(),
				'postToResponse' => $postToResponse,
		));
	}
	
	/**
	 * Ajouter un sous-forum
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function topicAddAction(Request $request, Application $app)
	{
		$topicId = $request->get('index');
		
		$topicRelated = $app['orm.em']->getRepository('\LarpManager\Entities\Topic')
			->find($topicId);
		
		// vérification des droits
		if ( ! $app['forum.manager']->right($topicRelated,$app['user']) )
		{
			$app['session']->getFlashBag()->add('error', 'Vous n\'avez pas les droits necessaires pour ajouter un sous-forum dans ce forum');
			return $app->redirect($app['url_generator']->generate('forum'),301);
		}
		
		$topic = new \LarpManager\Entities\Topic();
		
		$form = $app['form.factory']->createBuilder(new TopicForm(), $topic)
			->add('save','submit', array('label' => "Sauvegarder"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$topic = $form->getData();
			$topic->setTopic($topicRelated);
			$topic->setUser($app['user']);
			$topic->setRight($topicRelated->getRight());
			$topic->setObjectId($topicRelated->getObjectId());
		
			$app['orm.em']->persist($topic);
			$app['orm.em']->flush();
		
			$app['session']->getFlashBag()->add('success', 'Le forum a été ajouté.');
		
			return $app->redirect($app['url_generator']->generate('forum.topic',array('index'=> $topic->getId())),301);
		}
		
		return $app['twig']->render('forum/topic_add.twig', array(
				'form' => $form->createView(),
				'topic' => $topicRelated,
		));
	}
}