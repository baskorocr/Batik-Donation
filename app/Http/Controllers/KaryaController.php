<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Karya;

use App\services\TripayServices;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class KaryaController extends Controller
{
    public function index()
    {

        $karyas = Karya::with('pemilik')->latest()->get();


        return view('karya.index', compact('karyas'));
    }

    public function show(Karya $karya)
    {


        return view('karya.show', compact('karya'));
    }

    public function checkout(Karya $karya)
    {

        $karya->load('user');

        // Now, you can access $karya->pemilik->name
        $tripay = new TripayServices();
        $channels = $tripay->channel();

        return view('karya.checkout', compact('karya', 'channels'));
    }


    public function upload()
    {


        return view('upload');
    }

    public function storeKarya(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:2048' // Max size 2MB
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('cover_image', 'public');
        }

        Karya::create([
            'title' => $request->input('title'),
            'pemilik' => auth()->id(),
            'description' => $request->input('description', ''),
            'cover_image' => $filePath, // Store the file path
        ]);

        Alert::success('Upload is Success', 'Good luck in the painting batik competition');

        return redirect()->route('dashboard');


    }
}