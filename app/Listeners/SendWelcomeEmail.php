<?php

namespace App\Listeners;

use App\Events\EmployeeeRegisterEvent;
use App\Events\EmployeeRegisterEvent;
use App\Mail\SendWelcomeEmailToEmployee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
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
     * @param  \App\Events\EmployeeeRegisterEvent  $event
     * @return void
     */
    public function handle(EmployeeRegisterEvent $event)
    {
        $employee = $event->employee;
        \Mail::to($employee['email'])
            ->send(new SendWelcomeEmailToEmployee($employee));
    }
}
