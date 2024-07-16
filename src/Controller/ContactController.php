<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{

    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $data = new ContactDTO();
        
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {  

            $email = (new TemplatedEmail())
                ->from($data->email)
                ->to('you@example.com')
                ->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject($data->subject)
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['data' => $data]);
            $mailer->send($email);
            $this->addFlash('success','Votre email a bien été envoyé');
            return $this->redirectToRoute('app_contact');

        }

        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
