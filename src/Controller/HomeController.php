<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);

        // Traite la soumission AJAX
        if ($request->isXmlHttpRequest()) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $comment->setStatus('pending'); // Définit le statut à "en attente"
                $entityManager->persist($comment);
                $entityManager->flush();

                return new JsonResponse(['message' => 'Votre avis a été soumis pour validation.']);
            }
    }
        
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'comments' => $entityManager->getRepository(Comment::class)->findBy(['status' => 'accepted']),
        ]);
    }
}
