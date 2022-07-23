<?php

namespace App\Service;

use App\Repository\ActivityRepository;
use App\Repository\RatingRepository;
use App\Service\AverageRateService;

class FilterService
{   
    /* List activitiesId by age */
    public function filterByAge(AverageRateService $averageRateService, ActivityRepository $activityRepository, RatingRepository $ratingRepository, $age)
    {
        /* retrieve the average rates */
        $averageRatingByActivityByAge = $averageRateService->getAllAverageRates($activityRepository, $ratingRepository);

        /* initialize variable and filter the activities by age*/
        $filteredActivitiesId = [];
        foreach ($averageRatingByActivityByAge as $id => $activity) {
            if ($activity[$age] > 2) {
                $filteredActivitiesId [] = $id;
            }
        };

        return $filteredActivitiesId;
    }

}