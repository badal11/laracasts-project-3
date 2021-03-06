<?php

namespace App;

use App\Events\UserEarnedReputation;

class Reputation
{
    public const THREAD_WAS_PUBLISHED = 10;
    public const REPLY_POSTED = 2;
    public const BEST_REPLY_AWARDED = 50;
    public const REPLY_FAVORITED = 5;

    public static function award(User $user, $points)
    {
        $user->increment('reputation', $points);

        UserEarnedReputation::dispatch($user, $points, $user->reputation);
    }

    public static function reduce(User $user, $points)
    {
        $user->decrement('reputation', $points);
    }
}
