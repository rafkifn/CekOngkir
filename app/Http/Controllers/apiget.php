<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\City;
use App\Models\Province;
class apiget extends Controller
{
    public function index(Request $request){
        if($request->origin && $request->weight && $request->courier){
        $origin=$request->origin;
        $destination =$request->destination;
        $weight=$request->weight;
        $courier=$request->courier;
    }
    else{
        $origin='';
        $destination='';
        $weight='';
        $courier='';
    }

        $response=Http::asForm()->withHeaders([
            'key' => '5a5553c8841ed3e1becd6e21232a047e'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin'=>$origin,
            'destination'=>$destination,
            'weight'=>$weight,
            'courier'=>$courier
        ]);
        $cekongkir=$response['rajaongkir']['results'][0]['costs'];
        $provinsi=Province::all();
        return view('ongkir', compact('provinsi','cekongkir'));
    
    }

    public function ajax($id){
        $cities=City::where('province_id','=',$id)->pluck('city_name','id');
        return json_encode($cities);
    }
}
