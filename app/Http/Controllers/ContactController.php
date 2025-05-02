<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'jenis_informasi' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Kontak::create($validatedData);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}

