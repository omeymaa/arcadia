<?php

namespace App\Controller;

use App\Repository\HabitatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalsController extends AbstractController
{
    #[Route('/les-animaux', name: 'app_animals')]
    public function index(HabitatRepository $habitatRepository): Response
    {
        // Récupérer les habitats depuis le repository
        $habitats = $habitatRepository->findAll();

        // Envoyer les habitats à la vue
        return $this->render('animals/index.html.twig', [
            'habitats' => $habitats
        ]);
    }

    #[Route('/les-animaux/habitat/animal', name: 'app_single_animal')]
    public function single(): Response
    {
        return $this->render('animals/single-animal.html.twig');
    }

    #[Route('/les-animaux/la-savane', name: 'app_animals_savannah')]
    public function savannah(): Response
    {
        return $this->render('animals/savannah.html.twig');
    }

    #[Route('/les-animaux/le-marais', name: 'app_animals_marsh')]
    public function marsh(): Response
    {
        return $this->render('animals/marsh.html.twig');
    }

    #[Route('/les-animaux/la-jungle', name: 'app_animals_jungle')]
    public function jungle(): Response
    {
        return $this->render('animals/jungle.html.twig');
    }
}
