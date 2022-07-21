<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Rating;
use App\Repository\ActivityRepository;
use App\Repository\RatingRepository;
use App\Service\AverageRateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ActivityRepository $activityRepository, RatingRepository $ratingRepository, AverageRateService $averageRateService): Response
    {
        $activities = $activityRepository->findAll();
        $ratings = $ratingRepository->findAll();
        $averageRatings = $averageRateService->averageRateCalculator($activities, $ratings);

        return $this->render('home/index.html.twig', [
            'activities' => $activities, 'ratings' => $ratings, 'averageRatings' => $averageRatings
         ]);
    }

    #[Route('/test', name: 'home_test')]
    public function test(ActivityRepository $activityRepository): Response
    {
        //$city = "Rey";
        //$test = $activityRepository->findLikeAgeWithCity($city);
        $activity = "Zoo";
        $age = "3-6ans";
        $test = $activityRepository->findBy(['name' => $activity]);
        dump($test); die();

        return $this->render('home/index.html.twig', [
            'test' => $test
         ]);
    }
}
