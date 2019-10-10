<?php

namespace App\Observers;
use App\ScheduleCinema;

class ScheduleCinemaObserver
{
    /**
     * Handle the blog category "created" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function creating(ScheduleCinema $scheduleCinema)
    {
         $scheduleCinema->price = strip_tags($scheduleCinema->price);
    }
}
