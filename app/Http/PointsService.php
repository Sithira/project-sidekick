<?php


namespace App\Http;


use App\Models\User;

class PointsService
{

    public static function calculateUserPoints(User $person)
    {
        $additional = 0;

        $likeCount = 0;

        $dislikeCount = 0;

        $experiencesCount = 0;
        $qualificationsCount = 0;

        $questions = $person->questions;

        $answers = $person->answers;

        $replies = $person->replies;

        $proposals = $person->proposals->where('is_accepted', 1);

        $experiences = $person->experience;

        $qualifications = $person->qualifications;


        foreach ($questions as $question) {
            $likeCount = $likeCount + $question->likes;
            $dislikeCount = $dislikeCount + $question->dislikes;
        }

        foreach ($answers as $answer) {
            $likeCount = $likeCount + $answer->likes;
            $dislikeCount = $dislikeCount + $answer->dislikes;

            if ($answer->is_answer) {
                $additional = $additional + 1;
            }
        }

        foreach ($replies as $reply) {
            $likeCount = $likeCount + $reply->likes;
            $dislikeCount = $dislikeCount + $reply->dislikes;
        }

        foreach ($proposals as $proposal) {
            if ($proposal->is_accepted) {
                $additional = $additional + 1;
            }
        }

        // points calculation for un verified materials
        foreach ($experiences as $experience) {
            $experiencesCount = $experiencesCount + 0.5;
        }

        foreach ($qualifications as $qualification) {
            $qualificationsCount = $qualificationsCount + 0.5;
        }

        $totalPoints = ($additional + $likeCount + $qualificationsCount + $experiencesCount) - $dislikeCount;

        $person->points = $totalPoints;

        return $totalPoints;
    }

}
