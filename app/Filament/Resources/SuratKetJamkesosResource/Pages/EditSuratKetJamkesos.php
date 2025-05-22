<?php

namespace App\Filament\Resources\SuratKetJamkesosResource\Pages;

use App\Filament\Resources\SuratKetJamkesosResource;
use App\Mail\KonfirmasiStatusJamkesos;
use App\Models\Warga;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditSuratKetJamkesos extends EditRecord
{
    protected static string $resource = SuratKetJamkesosResource::class;
    public function kirimEmailKonfirmasi($status, $catatan)
    {
        $warga = Warga::find($this->record->warga_id);

        if ($warga && $warga->email) {
            Mail::to($warga->email)->send(new KonfirmasiStatusJamkesos([
                'nama' => $warga->name,
                'status' => ucfirst($status),
                'catatan' => $catatan,
            ]));
        } else {
            // Contoh kirim email ke admin kalau email warga tidak ditemukan
            Mail::to('gilangelha277@gmail.com')->send(new KonfirmasiStatusJamkesos([
                'nama' => 'Admin',
                'status' => ucfirst($status),
                'catatan' => "Email warga tidak ditemukan untuk warga_id: {$this->record->warga_id}",
            ]));
        }
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
