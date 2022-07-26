<?php

namespace App\Controller;

use App\Form\FilterByAgeType;
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
        /* 1/retrieve all rates by activity and age */
        $activities = $activityRepository->findAll();

        /* 2/calculate average rate for all activities and age */
        $averageRatingByActivityByAge = $averageRateService->getAllAverageRates($activityRepository, $ratingRepository);

        /* retrieve filter needed by user */
        $form = $this->createForm(FilterByAgeType::class);
        $form->handleRequest($request);
        
        /* 3/find the activities depending on filter */
        if ($form->isSubmitted() && $form->isValid()) {
            $ageFilter = $form->getData()['age'];
            $filteredActivitiesId = $filterService->filterByAge($averageRateService, $activityRepository, $ratingRepository, $ageFilter);
            foreach ($filteredActivitiesId as $key => $id) { 
                $idsOfActivitiesFiltered[]= $id;
            };
            $activities = $activityRepository->findBy(['id' => $idsOfActivitiesFiltered]);
        } else {
            $activities = $activityRepository->findAll();
        };

        return $this->renderForm('home/index.html.twig', [
            'activities' => $activities, 'form' => $form, 'averageRating' => $averageRatingByActivityByAge
         ]);
    }
}