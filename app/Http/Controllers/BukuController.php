<?php

namespace App\Http\Controllers;

use App\Models\buku;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

>>>>>>> 8be48e6 (Modul 4 pbw2)
use App\Http\Requests\StorebukuRequest;
use App\Http\Requests\UpdatebukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        return view('buku/index');
        //
=======
        return view('buku/index', [
            'bukus' => DB::table('bukus')->get()
        ]);
>>>>>>> 8be48e6 (Modul 4 pbw2)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku/create');
<<<<<<< HEAD
        //
=======
>>>>>>> 8be48e6 (Modul 4 pbw2)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebukuRequest $request)
    {
<<<<<<< HEAD
        $ValidatedData = $request->validate([
=======
        $ValidatedDate = $request->validate([

>>>>>>> 8be48e6 (Modul 4 pbw2)
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'sampul' => 'required|image|file|max:2048',
        ]);
<<<<<<< HEAD
        if ($request->file('sampul')) {
            $ValidatedData['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        Buku::create($ValidatedData);
        return redirect('/buku');
        //
=======

        if ($request->file('sampul')){
            $ValidatedDate['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        buku::create($ValidatedDate);
        return redirect('/buku');
>>>>>>> 8be48e6 (Modul 4 pbw2)
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(buku $buku)
    {
        //
=======
    public function edit($id)
    {
        $test = DB::table('bukus')->where('id', $id)->get();
        return view('buku/update', [
            'buku' => $test[0]
        ]);
>>>>>>> 8be48e6 (Modul 4 pbw2)
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(UpdatebukuRequest $request, buku $buku)
    {
        //
=======
    public function update(UpdatebukuRequest $request, $id)
    {
        $ValidatedDate = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'sampul' => 'image|file|max:2048',
        ]);

        if ($request->file('sampul')) {
            if ($request->sampulLama){
                Storage::delete($request->sampulLama);
            }
            $ValidatedDate['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        Buku::where('id', $id)->update($ValidatedDate);
        return redirect('/buku');
>>>>>>> 8be48e6 (Modul 4 pbw2)
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(buku $buku)
    {
        //
    }
}
=======
    public function destroy($id)
    {
        $test = DB::table('bukus')->select('sampul')
            ->where('id', $id)
            ->get();
        if ($test[0]->sampul){
            Storage::delete($test[0]->sampul);
        }
        Buku::destroy($id);
        return redirect('/buku');
    }
}
>>>>>>> 8be48e6 (Modul 4 pbw2)
