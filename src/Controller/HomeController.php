<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer les avis acceptés
        $comments = $entityManager->getRepository(Comment::class)->findBy(['status' => 'accepte']);

        // Création du formulaire pour un nouvel avis
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        
        // Traitement du formulaire via AJAX
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();
        
            // Si la requête est AJAX
            if ($request->isXmlHttpRequest()) {
                return $this->json(['message' => 'Votre avis a été soumis pour validation.']);
            }
        }
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'commentaires' => $comments,
        ]);
    }
}
