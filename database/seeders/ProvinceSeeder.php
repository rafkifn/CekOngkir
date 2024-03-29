<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
class ProvinceSeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response['rajaongkir']['results'];
        foreach($provinces as $province){
            $data_province[]=[
                'id'=>$province['province_id'],
                'province'=>$province['province'],
            ];
        }
        Province::insert($data_province);
    }
}
