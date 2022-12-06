<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $datas = DB::table('reservation')
                    ->join('pet', 'pet.id', '=', 'reservation.pet_id')
                    ->get();

        return view('home')
            ->with('datas', $datas);
    }


    // public function join(Request $request) {
    //     if($request->has('search')){
    //         $datas = DB::select('SELECT reservation.id, owner.name, pet.name, pet.species, reservation.additional_service, reservation.notes, reservation.start_time, reservation.end_time FROM reservation LEFT JOIN owner ON owner.id = reservation.owner_id LEFT JOIN pet on pet.id = reservation.pet_id WHERE pet.name like :search',['search'=>'%'.$request->search.'%',
    //         ]);

    //     return view('join')
    //         ->with('datas', $datas);
    //     }
    //     else {
    //         $datas = DB::select('SELECT reservation.id, owner.name, pet.name, pet.species, reservation.additional_service, reservation.notes, reservation.start_time, reservation.end_time FROM reservation LEFT JOIN owner ON owner.id = reservation.owner_id LEFT JOIN pet on pet.id = reservation.pet_id');

    //     return view('join')
    //         ->with('datas', $datas);
    //     }
    // }
}
