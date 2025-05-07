<?php

namespace App\Observers;

use App\Mail\LaporanMasukMail;
use App\Models\Layananpublik;
use Illuminate\Support\Facades\Mail;

class LayananpublikObserver
{
    /**
     * Handle the Layananpublik "created" event.
     */
    public function created(Layananpublik $laporan): void
    {
        Mail::to('gilangelha277@gmail.com')->send(new LaporanMasukMail($laporan));
    }

    /**
     * Handle the Layananpublik "updated" event.
     */
    public function updated(Layananpublik $layananpublik): void
    {
        //
    }

    /**
     * Handle the Layananpublik "deleted" event.
     */
    public function deleted(Layananpublik $layananpublik): void
    {
        //
    }

    /**
     * Handle the Layananpublik "restored" event.
     */
    public function restored(Layananpublik $layananpublik): void
    {
        //
    }

    /**
     * Handle the Layananpublik "force deleted" event.
     */
    public function forceDeleted(Layananpublik $layananpublik): void
    {
        //
    }
}
