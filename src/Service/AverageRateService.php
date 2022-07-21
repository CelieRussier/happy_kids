<?php

namespace App\Service;

use App\Repository\RatingRepository;

class AverageRateService
{
    private RatingRepository $ratingRepository;

    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function averageRateCalculator($activities, $ratings): mixed
    {
        $averageRates = [];

        //foreach( $activity in $activities) {

        //}
        //$averageRates = $this->ratingRepository->findLikeAgeWithCity();

        
        return $averageRates;
    }



    public function average(mixed $search, mixed $department): mixed
    {
        // initializing cakes
        $cakes = [];
        // if KEYWORD is set and DEPARTMENT is not
        if (!empty($search) && (empty($department))) {
            $cakes = $this->cakeRepository->findLikeAll($search);
            // if DEPARTMENT is set and KEYWORD is not
        } elseif (!empty($department) && (empty($search))) {
            $cakes = $this->cakeRepository->findByDepartment($department);
            // if both DEPARTMENT and KEYWORD are set
        } elseif (!empty($search) && (!empty($department))) {
            $cakes = $this->cakeRepository->findLikeAllWithLocation($search, $department);
            // if neither KEYWORD nor DEPARTMENT are set
        } elseif (empty($search) && (empty($department))) {
            // if search is empty, display everything
            $cakes = $this->cakeRepository->findAll();
        }
        return $cakes;
    }
}