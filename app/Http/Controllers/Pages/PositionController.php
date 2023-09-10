<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Divisi;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "iSchool";
        $data['menu'] = "Kelola Pengguna";
        $data['submenu'] = "Kelola Jabatan";
        $data['position'] = Position::all();
        $data['divisi'] = Divisi::all();
        
        return view('pages.usermanage.usermanage-position', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5); // Generate random 5-letter code
            
            $position = Position::create([
                'divisi_id' => $request->input('divisi_id'),
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'sallary' => $request->input('sallary'),
            ]);
    
            $position->save();
    
            return redirect()->route('usermanage.position')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('usermanage.position')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $position = Position::find($id);
    
            if (!$position) {
                return redirect()->route('usermanage.position')->with('error', 'Jabatan tidak ditemukan.');
            }
    
            $position->divisi_id = $request->input('divisi_id');
            $position->name = $request->input('name');
            $position->code = $request->input('code');
            $position->sallary = $request->input('sallary');
            $position->save();
    
            return redirect()->route('usermanage.position')->with('success', 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('usermanage.position')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::find($id);
        $position->delete();

        return redirect()->route('usermanage.position')->with('success', 'Data berhasil dihapus.');
    }
}
