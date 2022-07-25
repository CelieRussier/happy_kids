<?php

namespace App\Service;

use App\Repository\ActivityRepository;
use App\Repository\RatingRepository;

class AverageRateService
{
    private RatingRepository $ratingRepository;

    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function averageRateCalculator(array $ratings ): int
    {
        /* calculate averageRate */

        $rates = [];
        foreach($ratings as $rating) {
            $rates [] = $rating->getRate();
        }
        if (!empty($rates)) {
            $averageRate = round(array_sum($rates)/count($rates));
        } else {
            $averageRate = 0;
        }

        return $averageRate;
    }

    public function getAllAverageRates(ActivityRepository $activityRepository, RatingRepository $ratingRepository): array
    {
        $activities = $activityRepository->findAll();
        $ageRanges = ["0-3ans", "3-6ans", "6-12ans", "12-99ans"];
        $averageRatingByActivityByAge = [];

        foreach($activities as $activity) {
            $activityId = $activity->getId();
            foreach ($ageRanges as $ageRange) {
                //retrieve all the rates for one activity and for one age range
                $ratings = $ratingRepository->findLikeAgeWithActivity($activityId, $ageRange);
                //calculate average rate for this activity and this age range
                $average = $this->averageRateCalculator($ratings);
                // rajoute un élément au tableau activité
                $averageRatingByActivityByAge[$activityId][$ageRange] = $average;
            }
        };

        return $averageRatingByActivityByAge;
    }

}