<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function index(Request $request) {

        if($request->has('search')){
            $datas = Owner::where('name', 'LIKE', '%' .$request->search .'%')->get();
        }else{
            $datas = Owner::all();
        }
        
        return view('owner.index',compact(['datas']));
    }

    public function create() {
        return view('owner.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO owner(id, name, email, phone) VALUES (:id, :name, :email, :phone)',
        [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]
        );

        return redirect()->route('owner.index')->with('success', 'Data owner berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('owner')->where('id', $id)->first();

        return view('owner.edit')->with('data', $data);
    }
    

    public function update($id, Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update("UPDATE owner SET id =:id, name = :name, email = :email, phone = :phone WHERE id = $id",
        [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]
        );

        return redirect()->route('owner.index')->with('success', 'Data owner berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM owner WHERE id = :id', ['id' => $id]);

        return redirect()->route('owner.index')->with('success', 'Data owner berhasil dihapus');
    }

    // public function destroy(request $request,String $id)
    // {
    //     // dd($request);
    //     DB::table('owner')->where('id',$id)->update([
    //         'deleted' => "yes"]);
    //     return redirect('/owner');
    // }

    // public function recover(request $request,String $id)
    // {
    //     //dd($request);
    //     DB::table('owner')->where('id',$id)->update([
    //         'deleted' => null]);
    //     return redirect('/owner');
    // }

    // public function destroy2($id)
    // {
    //     $owner = owner::find($id);
    //     $owner->delete();
    //     return redirect('/owner');
    // }

}
