<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\User;
use PDF;

class AdminController extends Controller
{
    public function dashboardadmin(){
      return view('admin.dashadmin');
  }

  public function menunya(){
    // ambil semua data
        $menu  = menu::all();
            return view('admin.menu' ,['menu'=>$menu]);
        }

    

            public function tambahmenu(Request $request){

                $this->validate($request,[
                  'nama_menu' => 'required',
                  'harga' => 'required',
                  'stok_menu' => 'required',
                  'deskripsi' => 'required',
                  'gambar_menu' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        
                ]);
        
                $image = $request->file('gambar_menu');
                $name_file = $image->getClientOriginalName();
                $image->move(base_path('/public/imagedb'), $name_file);
        
        
                $menuu = new menu;
        
                $menuu->nama_menu = $request->input('nama_menu');
                $menuu->harga = $request->input('harga');
                $menuu->stok_menu= $request->input('stok_menu');
                $menuu->deskripsi = $request->input('deskripsi');
                $menuu-> gambar_menu= $name_file;
                
                $menuu->save();
        
                return redirect('/menu');
        
                }

                public function deletemenu($id_menu){
                    $menu = menu::find($id_menu);
                    $menu->delete();
                    return redirect('/menu');
          
                  }
                  

                public function editmenu(Request $request){
                    $id_menu = $request->id_menu;
                    $edit = menu::where('id_menu', $id_menu)->update(array(
                        'nama_menu' => $request->nama_menu,
                        'harga' => $request->harga,
                        'stok_menu' => $request->stok_menu,
                        'deskripsi' => $request->deskripsi,
                        'gambar_menu' => $request->gambar_menu,
                    ));
                    if ($edit) {
                        echo "success";
                    }else{
                        echo "fail";
                    }
                }
          
                public function edit($id_menu){
                    $menu = menu::find($id_menu);
                    return view('admin.edit', ['menu' => $menu]);
                }
            
              public function update($id_menu, Request $request)
              {
                  $this->validate($request,[
                      'nama_menu' => 'required',
                      'harga' => 'required',
                      'stok_menu' => 'required',
                      'deskripsi' => 'required',
                      'gambar_menu' => 'required',
                     
                  ]);
              
                  $menu = menu::find($id_menu);
                  $menu->nama_menu = $request->nama_menu;
                  $menu->harga= $request->harga;
                  $menu->stok_menu= $request->stok_menu;
                  $menu->deskripsi = $request->deskripsi;
                  $menu->gambar_menu = $request->gambar_menu;
                 
                  $menu->save();
           
               return redirect('/menu');
              }

              public function cetak_pdf()
              {
              $menu= menu::all();
              $pdf = PDF::loadview('admin.menupdf',['menu'=>$menu]);
              return $pdf->download('menupdf.pdf');
              }

              public function usernya(){
                // ambil semua data
                    $user  = User::all();
                        return view('admin.usernya' ,['user'=>$user]);
                    }

                    public function pdf()
                    {
                    $user= User::all();
                    $pdfnya = PDF::loadview('admin.userpdf',['user'=>$user]);
                    return $pdfnya->download('userpdf.pdf');
                    }
        
}
