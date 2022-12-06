<?php

Namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReservationController extends Controller
{
    // public function index(Request $request) {
    //     if($request->has('search')){
    //         $datas = Reservation::where('additional_service', 'LIKE', '%' .$request->search .'%')->get();
    //     }else{
    //         $datas = Reservation::all();
    //     }
        
    //     return view('reservation.index',compact(['datas']));
    // }

    public function index(Request $request) {
        if ($request->has('search')){
        $datas = DB::select('select * from reservation WHERE notes like :search',[
            'search'=>'%'.$request->search.'%',
        ]);

        $datasrecycle = DB::select('select * from reservation WHERE notes like :search AND recycle=1',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        return view('reservation.index')
            ->with('datas', $datas)
            ->with('datasrecycle', $datasrecycle);
        }
        else{
            $datas = DB::select('select * from reservation WHERE recycle=0');
            $datasrecycle = DB::select('select * from reservation WHERE recycle=1');
    
            return view('reservation.index')
                ->with('datas', $datas)
                ->with('datasrecycle', $datasrecycle);   
           }
        }

    public function create() {
        return view('reservation.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
            'pet_id' => 'required',
            'additional_service' => 'required',
            'notes' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        DB::insert('INSERT INTO reservation(id, owner_id, pet_id, additional_service, notes, start_time, end_time) VALUES (:id, :owner_id, :pet_id, :additional_service, :notes, :start_time, :end_time)',
        [
            'id' => $request->id,
            'owner_id' => $request->owner_id,
            'pet_id' => $request->pet_id,
            'additional_service' => $request->additional_service,
            'notes' => $request->notes,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]
        );
        return redirect()->route('reservation.index')->with('success', 'Data reservation berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('reservation')->where('id', $id)->first();

        return view('reservation.edit')->with('data', $data);
    }
    

    public function update($id, Request $request) {
        $request->validate([
            'id' => 'required',
            'owner_id' => 'required',
            'pet_id' => 'required',
            'additional_service' => 'required',
            'notes' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        DB::update("UPDATE reservation SET id =:id, owner_id =:owner_id, pet_id =:pet_id, additional_service = :additional_service, notes = :notes, start_time = :start_time, end_time = :end_time WHERE id = $id",
        [
            'id' => $request->id,
            'owner_id' => $request->owner_id,
            'pet_id' => $request->pet_id,
            'additional_service' => $request->additional_service,
            'notes' => $request->notes,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]
        );

        return redirect()->route('reservation.index')->with('success', 'Data reservation berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM reservation WHERE id = :id', ['id' => $id]);

        return redirect()->route('reservation.index')->with('success', 'Data Karyawan berhasil dihapus');
    }

    public function recycle($id) {
        DB::update('UPDATE reservation set recycle = 1 WHERE id = :id', ['id' => $id]);
        return redirect()->route('reservation.index')->with('success', 'Data reservation berhasil dihapus');
    }
    public function restore($id) {
        DB::update('UPDATE reservation set recycle = 0 WHERE id = :id', ['id' => $id]);
        return redirect()->route('reservation.index')->with('success', 'Data reservation berhasil dihapus');
    }


}
