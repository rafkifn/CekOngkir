<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response=Http::withHeaders([
            'key' => '5a5553c8841ed3e1becd6e21232a047e'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];
        foreach($cities as $city){
            $data_city[]=[
                'id'=>$city['city_id'],
                'province_id'=>$city['province_id'],
                'type'=>$city['type'],
                'city_name'=>$city['city_name'],
                'postal_code'=>$city['postal_code'],
            ];
        }
        City::insert($data_city);
    }
}
