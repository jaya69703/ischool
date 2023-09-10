<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Staff;
use App\Models\Position;
use App\Models\Divisi;

class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "iSchool";
        $data['menu'] = "Kelola Pengguna";
        $data['submenu'] = "Kelola Staff";
        $data['usermanage'] = User::all();
        $data['position'] = Position::all();
        $data['divisi'] = Divisi::all();
        
        return view('pages.usermanage.usermanage-index', $data);
    }

    public function SiswaIndex()
    {
        $data['title'] = "iSchool";
        $data['menu'] = "Kelola Pengguna";
        $data['submenu'] = "Kelola Siswa";
        $data['usermanage'] = User::all();
        $data['position'] = Position::all();
        $data['divisi'] = Divisi::all();
        
        return view('pages.usermanage.usermanage-siswa', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5); // Generate random 5-letter code
    
            $usermanageData = [
                'code' => $code,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'type' => $request->input('type'),
                'password' => Hash::make($request->input('phone')),
            ];
    
            DB::table('users')->insert($usermanageData);
    
            if ($request->input('type') === '1') {
                $staffData = [
                    'staff_name' => $request->input('name'),
                    'staff_email' => $request->input('email'),
                    'staff_phone' => $request->input('phone'),
                    'code' => $code,
                    'position_id' => $request->input('position_id'),
                    'divisi_id' => $request->input('divisi_id'),
                ];
    
                DB::table('staff')->insert($staffData);
            }
    
            return redirect()->route('usermanage.staff')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('usermanage.staff')->with('error', 'Data gagal ditambahkan');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "iSchool";
        $data['menu'] = "Kelola Pengguna";
        $data['submenu'] = "Kelola Staff";
        $data['usermanage'] = User::find($id);
    
        // Periksa apakah $usermanage valid
        if (!$data['usermanage']) {
            return abort(404); // Kembalikan respons 404 jika data tidak ditemukan
        }
    
        $data['position'] = Position::all();
        $data['divisi'] = Divisi::all();
    
        return view('pages.usermanage.usermanage-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::find($id);
    
            if (!$user) {
                return redirect()->route('usermanage.staff')->with('error', 'Data tidak ditemukan.');
            }
    
            $user->isverify = $request->input('isverify');
            $user->save();
    
            return redirect()->route('usermanage.staff')->with('success', 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('usermanage.staff')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('usermanage.staff')->with('success', 'Data berhasil dihapus.');
    }
}
