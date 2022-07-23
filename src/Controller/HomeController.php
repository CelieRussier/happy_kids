<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Rating;
use App\Form\FilterByAgeType;
use App\Form\SearchActivityType;
use App\Repository\ActivityRepository;
use App\Repository\RatingRepository;
use App\Service\AverageRateService;
use App\Service\FilterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        ActivityRepository $activityRepository,
        RatingRepository $ratingRepository,
        Request $request,
        AverageRateService $averageRateService,
        FilterService $filterService
        ): Response
    {
        /* retrieve all rates by activity and age */
        $activities = $activityRepository->findAll();

        /* calculate average rate for all activities and age */
        $averageRatingByActivityByAge = $averageRateService->getAllAverageRates($activityRepository, $ratingRepository);

        /* retrieve filter needed by user */
        $form = $this->createForm(FilterByAgeType::class);
        $form->handleRequest($request);
        
        /* find the activities depending on user choice */
        if ($form->isSubmitted() && $form->isValid()) {
            $ageFilter = $form->getData()['age'];
            $filteredActivitiesId = $filterService->filterByAge($averageRateService, $activityRepository, $ratingRepository, $ageFilter);
            $idArray = [];
            foreach ($filteredActivitiesId as $key => $value) { 
                $idArray[]= $value;
            };
            $activities = $activityRepository->findBy(['id' => $idArray]);
        } else {
            $activities = $activityRepository->findAll();
        }

        return $this->renderForm('home/index.html.twig', [
            'activities' => $activities, 'form' => $form, 'averageRating' => $averageRatingByActivityByAge
         ]);
    }
}
