<?php
    
namespace App\Controller;

use App\Entity\Content;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;





    
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/api/contents", name="contents")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getContents(SerializerInterface $serializer)
    {
   
        $content  = $this->getDoctrine()
        ->getRepository(Content::class)
        ->findAll();

        $json = $serializer->serialize($content,'json', ['groups' => 'content']);
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent($json);
       
        return $response;

        
        
    }

    /**
     * @Route("/api/content/{id}", name="content")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getContent(SerializerInterface $serializer, $id)
    {
        
      
        
        $content = $this->getDoctrine()->getRepository(Content::class)->findBy( array ('category' => $id) );
       
        $json = $serializer->serialize($content,'json', ['groups' => 'content']);
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent($json);
       
        return $response;

        
        
    }

    /**
     * @Route("/api/categories", name="categories")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getCategories(SerializerInterface $serializer)
    {
   
        $cat  = $this->getDoctrine()
        ->getRepository(Category::class)
        ->findAll();

        $json = $serializer->serialize(
            $cat,
            'json',
            ['groups' => 'cat']
        );
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent($json);
       
        return $response;

        
        
    }
}