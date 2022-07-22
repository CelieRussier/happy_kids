<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Rating;
use App\Form\SearchActivityType;
use App\Repository\ActivityRepository;
use App\Repository\RatingRepository;
use App\Service\AverageRateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ActivityRepository $activityRepository, RatingRepository $ratingRepository, Request $request): Response
    {
        $activities = $activityRepository->findAll();
        $ratings = $ratingRepository->findAll();

        $form = $this->createForm(SearchActivityType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData()['search'];
            $activities = $activityRepository->findLikeName($search);
        } else {
            $activities = $activityRepository->findAll();
        }

        return $this->renderForm('home/index.html.twig', [
            'activities' => $activities, 'ratings' => $ratings, 'form' => $form
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
