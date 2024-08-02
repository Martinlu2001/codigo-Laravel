<?php

namespace App\Listeners;

use App\Events\ServicioSaved;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OptimizeServicioImage implements ShouldQueue
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
    public function handle(ServicioSaved $event): void
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read(Storage::get($event->servicio->image))
                ->scale(width: 600)
                ->encode();
        
        Storage::put($event->servicio->image, (string) $image);
    }
}
