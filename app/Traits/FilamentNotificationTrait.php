<?php

namespace App\Traits;

use Filament\Notifications\Notification;
use App\Enums\AppNotificationEnum;

trait FilamentNotificationTrait
{ 
    /**
     * Send a notification with a dynamic type via Filament.
     *
     * @param string $message
     * @param AppNotificationEnum $type
     */
    private function notify($message, AppNotificationEnum $type)
    {
        Notification::make()
            ->title($message)
            ->{mb_strtolower($type->value)}()
            ->send();
    }

}
