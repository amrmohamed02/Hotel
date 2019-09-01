<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Model\Available;
use App\Model\Hotel;
use Illuminate\Http\Request;


class savedatacontroller extends Controller
{
    public function saveApiData()
    {

      
        /* $client = new Client();
        $res = $client->get('https://api.myjson.com/bins/pq0f6?fbclid=IwAR0LAtGUSP3D_2z9mqew5dK5Abei27o1xan0o0lWUSZLkkFQVWO3fH1yGnw');
        $aa=$res->getBody()->getContents();
        */
        $json = json_decode(file_get_contents('https://api.myjson.com/bins/pq0f6?fbclid=IwAR2M3WBtTyl5nuTMc_JiyYvfIf3Yn4AFCqkycMbVyJkgir1GYBAONUZwrfk'), true);
    
        foreach($json['hotels'] as $n){
        $hotel = new Hotel();
          $hotel->name = $n['name'];
          $hotel->price = $n['price'];
          $hotel->city =  $n['city'];
          $hotel->save();
            foreach( $n['availability'] as $av){
                $available = new Available();      
                $available->from = date_format(date_create($av['from']),'Y-m-d');
                $available->to = date_format(date_create($av['to']),'Y-m-d');
                $available->hotel_id = $hotel->id;
                $available->save();
            }
        

        }
/*
$ex=preg_split("/(name|price|city|availability)/", $aa);
$f=str_replace(array("\"","[","]","{","}",",",":")," ",$ex);
print_r($f);
*/
}
}
