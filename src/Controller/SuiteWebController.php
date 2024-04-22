<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Event;
use App\Entity\Activty;
use App\Entity\User;
use App\Entity\Formation;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class SuiteWebController extends AbstractController
{
    #[Route('/suiteWeb', name: 'app_suite_web')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le compteur de visites de la session
        $session = $request->getSession();
        $visitCount = $session->get('suite_web_visits', 0);
        // Incrémenter le compteur de visites
        $visitCount++;
        // Mettre à jour le compteur de visites dans la session
        $session->set('suite_web_visits', $visitCount);

        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        $events = []; // Initialisez la variable $events

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $entity = new Contact();
            $entity->setName($formData['name']);
            $entity->setEmail($formData['email']);
            $entity->setSubject($formData['subject']);
            $entity->setMessage($formData['message']);

            $entityManager->persist($entity);
            $entityManager->flush();

            $this->addFlash('success', 'Your message has been sent and saved to the database. Thank you!');
        }

        // Récupérer les événements de la base de données
        $events = $entityManager->getRepository(Event::class)->findAll();
        $activties = $entityManager->getRepository(Activty::class)->findAll();
        $users = $entityManager->getRepository(User::class)->findAll();
        $formation = $entityManager->getRepository(Formation::class)->findAll();
        return $this->render('suite_web/index.html.twig', [
            'form' => $form->createView(),
            'events' => $events,
            'activties' => $activties,
            'users' => $users,
            'visitCount' => $visitCount,
            'formation' => $formation,
             // Envoyer le compteur de visites à la vue
        ]);
    }
}