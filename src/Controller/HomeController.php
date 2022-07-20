<?php

namespace App\Controller;

use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ActivityRepository $activityRepository): Response
    {
        $activities = $activityRepository->findAll();
        return $this->render('home/index.html.twig', [
            'activities' => $activities
         ]);
    }

}