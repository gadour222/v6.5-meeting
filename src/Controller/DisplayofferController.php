<?php

namespace App\Controller;
use App\Entity\Mentoroffers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MentoroffersRepository;
use Doctrine\ORM\EntityManagerInterface; 
class DisplayofferController extends AbstractController
{
    private $entityManager; 

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/displayoffer', name: 'app_displayoffer')]
    public function index(EntityManagerInterface $entityManager): Response
    {   $offers = $entityManager->getRepository(Mentoroffers::class)->findAll();
        return $this->render('displayoffer/index.html.twig', [
            'controller_name' => 'DisplayofferController',
            'offers' => $offers,
        ]);
    }
}
