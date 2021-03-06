<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Coordinators\TeamsCoordinator;
use App\Team;
use App\Role;

class CreateUserTeam
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $teamsCoordinator = new TeamsCoordinator($event->user);
        // $team = $teamsCoordinator->createTeam('team ' . $event->user->name);
        $team = $teamsCoordinator->attach(env('APP_TEAM'));
        $teamsCoordinator->login($team);
    }
}
