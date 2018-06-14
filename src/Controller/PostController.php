<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class PostController extends Controller
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/post/new", name="Novo post")
     * @Method({"GET", "POST"})
     */

    public function new(Request $request){
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('salvar', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'post criado');

            return $this->redirectToRoute('post');
        }

        return $this->render('post/newposts.html.twig', [
            'form' => $form->createView()
        ]);


    }
}
