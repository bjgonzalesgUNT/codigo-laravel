<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class OptimizeServiceImage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read(public_path('storage/' . $event->service->image))->scale(width: 600, height: 600)->colorize(0, 0, 0)->encode();

        Storage::put($event->service->image, (string) $image);
    }
}
