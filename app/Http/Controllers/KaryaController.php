<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Karya;
use Illuminate\Support\Facades\Storage;


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
            'pembuat' => 'required|string|max:255',
            'file' => 'required|file|max:10240|mimes:png,jpg,jpeg' // Max size 2MB
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('cover_image', 'public');
        }

        Karya::create([
            'title' => $request->input('title'),
            'pemilik' => $request->input('pembuat'),
            'description' => $request->input('description', ''),
            'cover_image' => $filePath, // Store the file path
        ]);

        Alert::success('Upload is Success', 'Good luck in the painting batik competition');

        return redirect()->route('dashboard');


    }

    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);

        // Optionally delete the associated cover image from storage
        Storage::delete('public/' . $karya->cover_image);

        $karya->delete();

        Alert::success('Delete is Success', 'Karya berhasil dihapus');

        return redirect()->back();
    }


    public function edit($id){
        $karya = Karya::findOrFail($id);
        return view('karya.edit', compact('karya'));

    }

    public function update(Request $request, $id)
    {

        try{

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'cover_image' => 'nullable|file|image|max:10240|mimes:png,jpg,jpeg', // Optional, jika ada file gambar
            ]);
    
        
    
            // Cari karya berdasarkan ID
            $karya = Karya::findOrFail($id);
    
            // Update data title dan description
            $karya->title = $request->input('title');
            $karya->description = $request->input('description', '');
    
            // Jika ada file gambar yang diupload
            if ($request->hasFile('cover_image')) {
                // Simpan file di folder 'cover_image' pada disk 'public'
                $filePath = $request->file('cover_image')->store('cover_image', 'public');
                $karya->cover_image = $filePath; // Simpan path file ke dalam database
            }
    
            // Simpan perubahan
            $karya->save();
    
            // Redirect dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Karya updated successfully');
        }
        catch(\Exception $e){
            dd($e);
        }
       
        // Validasi input
      
    }

}