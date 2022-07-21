<?php

namespace App\Controller;

use App\Repository\ActivityRepository;
use App\Repository\RatingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ActivityRepository $activityRepository, RatingRepository $ratingRepository): Response
    {
        $activities = $activityRepository->findAll();
        $ratings = $ratingRepository->findAll();

        return $this->render('home/index.html.twig', [
            'activities' => $activities, 'ratings' => $ratings
         ]);
    }

    #[Route('/test', name: 'home_test')]
    public function test(ActivityRepository $activityRepository, RatingRepository $ratingRepository): Response
    {
        $age = "3-6ans";
        $city = "Delorme";
        $test = $ratingRepository->findLikeAgeWithCity($age, $city);
        dump($test); die();

        return $this->render('home/index.html.twig', [
            'test' => $test
         ]);
    }
}
