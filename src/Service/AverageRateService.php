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

    public function averageRateCalculator(RatingRepository $ratingRepository): mixed
    {
        $activity = 131;
        $age = "0-3ans";
        $ratings = $ratingRepository->findLikeAgeWithActivity($activity, $age);
        foreach($ratings as $rate => $value) {
            $rates [] = $value;
        }
        dump($rates); die();

        return $rates;
    }
}


//if ( $rating['age'] === "0-3ans") {
//    $rating0 [] = $rating['rate'];
//}
//if ( $rating['age'] === "3-6ans") {
//    $rating3 [] = $rating['rate'];
//}
//if ( $rating['age'] === "6-12ans") {
//    $rating6 [] = $rating['rate'];
//}
//if ( $rating['age'] === "12-99ans") {
//    $rating12 [] = $rating['rate'];
//}
//}
//$rating0 = round(array_sum($rating0) / count($rating0));
//$rating3 = round(array_sum($rating3) / count($rating3));
//$rating6 = round(array_sum($rating6) / count($rating6));
//$rating12 = round(array_sum($rating12) / count($rating12));
//dump($rating0); die();

//$ratingsArray = [];
//        foreach ($ratings as $rating) {
//            $ratingsArray [] = $rating;
//        };
//
//        $activitiesArray = [];
//        foreach ( $activities as $activity) {
//            $activitiesArray [] = $activity;
//        }
//
//        dump($ratingsArray); die();
//        
//        return $ratingsArray;