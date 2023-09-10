<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['title'] = "iSchool";
        $data['menu'] = "Menu";
        $data['submenu'] = "Menu Manage";
        $data['menulist'] = Menu::all();

        return view('setting.menu.menu-index',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5); // Generate random 5-letter code
            
            $menulist = Menu::create([
                'name' => $request->input('name'),
                'code' => $code, // Use the generated code
                'icon' => $request->input('icon'),
                'url' => $request->input('url'),
                'type' => $request->input('type'),
                'locate' => $request->input('locate'),
                'parent_id' => $request->input('parent_id'),
            ]);
    
            $menulist->save();
    
            return redirect()->route('menu.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('menu.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $menu = Menu::find($id);
    
            if (!$menu) {
                return redirect()->route('menu.index')->with('error', 'Menu not found.');
            }
    
            $menu->name = $request->input('name');
            $menu->icon = $request->input('code');
            $menu->icon = $request->input('icon');
            $menu->url = $request->input('url');
            $menu->type = $request->input('type');
            $menu->locate = $request->input('locate');
            $menu->parent_id = $request->input('parent_id');
            $menu->save();
    
            return redirect()->route('menu.index')->with('success', 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('menu.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menulist = Menu::find($id);
        $menulist->delete();

        return redirect()->route('menu.index')->with('success', 'Data berhasil dihapus.');
    }
}
