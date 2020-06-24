<?php

namespace App\Observers;

use App\Subscription;

class SubscriptionObserver
{
    /**
     * Handle the subscription "created" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function created(Subscription $subscription)
    {
        if (isset($subscription->subscribable)) {
            activity('subscribes_log')
                ->causedBy(request()->user())
                ->performedOn($subscription->subscribable)
                ->log('subscribed to');
        }
    }

    /**
     * Handle the subscription "updated" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function updated(Subscription $subscription)
    {
        //
    }

    /**
     * Handle the subscription "deleted" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function deleted(Subscription $subscription)
    {
        if (isset($subscription->subscribable)) {
            activity('subscribes_log')
                ->causedBy(request()->user())
                ->performedOn($subscription->subscribable)
                ->log('unsubscribed from');
        }
    }

    /**
     * Handle the subscription "restored" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function restored(Subscription $subscription)
    {
        //
    }

    /**
     * Handle the subscription "force deleted" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function forceDeleted(Subscription $subscription)
    {
        //
    }
}