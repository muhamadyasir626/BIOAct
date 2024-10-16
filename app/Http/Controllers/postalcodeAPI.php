<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postalcodeAPI extends Controller
{
    public function search(Request $request){
        $postalCode = $request->query('postalCode');
        $result = $this->findPostalCode($postalCode);

        return response()->json($result);
    }

    private function findPostalCode($postalCode){
        $fileKodePos = resource_path('data/kodepos.json');
        $json = file_get_contents($fileKodePos);
        $data = json_decode($json,true);

        $results = array_filter($data, function($item) use ($postalCode){
            return $item['code'] == $postalCode;
        });
        return response()->json(array_values($results));
    }

    // private function findPostalCode($postalCode) {
    //     $fileKodePos = resource_path('data/kodepos.json');  // Lokasi file JSON
    //     $json = file_get_contents($fileKodePos);  // Membaca isi file
    //     $data = json_decode($json, true);  // Menguraikan JSON menjadi array
    
    //     // Mencari data berdasarkan code (kode pos)
    //     $results = array_filter($data, function($item) use ($postalCode) {
    //         return $item['code'] == $postalCode;  // Sesuaikan pencarian untuk mengecek 'code'
    //     });
    
    //     return array_values($results);  // Mengembalikan hanya nilai dari hasil yang difilter
    // }
    

    public function show(){
        return ['name'=>'amil'];
    }
}
