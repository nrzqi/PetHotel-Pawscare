<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetController extends Controller
{
    public function index(Request $request) {
        if($request->has('search')){
            $datas = Pet::where('name', 'LIKE', '%' .$request->search .'%')->get();
        }else{
            $datas = Pet::all();
        }
        
        return view('pet.index',compact(['datas']));
    }

    public function create() {
        return view('pet.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'species' => 'required',
            'birthdate' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pet(id, name, species, birthdate) VALUES (:id, :name, :species, :birthdate)',
        [
            'id' => $request->id,
            'name' => $request->name,
            'species' => $request->species,
            'birthdate' => $request->birthdate,
        ]
        );

        return redirect()->route('pet.index')->with('success', 'Data pet berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pet')->where('id', $id)->first();

        return view('pet.edit')->with('data', $data);
    }
    

    public function update($id, Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'species' => 'required',
            'birthdate' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update("UPDATE pet SET id =:id, name = :name, species = :species, birthdate = :birthdate WHERE id = $id",
        [
            'id' => $request->id,
            'name' => $request->name,
            'species' => $request->species,
            'birthdate' => $request->birthdate,
        ]
        );

        return redirect()->route('pet.index')->with('success', 'Data pet berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pet WHERE id = :id', ['id' => $id]);

        return redirect()->route('pet.index')->with('success', 'Data pet berhasil dihapus');
    }

}
