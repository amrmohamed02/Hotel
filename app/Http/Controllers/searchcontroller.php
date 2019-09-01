<?php

namespace App\Http\Controllers;
use App\Model\Available;
use App\Model\Hotel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class searchcontroller extends Controller
{
  
    public function search(Request $request){

        if ($request->isMethod('post')) {
            $hotel = Hotel::where('name',$request->input('name'))
                    ->orwhere('city',$request->input('city'))
                    ->orwhereBetween('price', [$request->input('first'),$request->input('second')])
                    ->join('available', 'hotel.id', '=', 'available.hotel_id')
                    ->orwhereBetween('available.from', [$request->input('f'),$request->input('s')])
                    ->orwhereBetween('available.to', [$request->input('f'),$request->input('s')])
                    ->first();
           echo "<br> name -> ".$hotel->name . "<br>";
           echo "<br> city -> ".$hotel->city . "<br>";
           echo "<br> price -> ".$hotel->price . "<br>";
           foreach ($hotel->available as $av) {
            echo "<br> available from " . $av->from . " to " . $av->to."<br>";
           }

        }

        return view('search');
    }


    public function sort(Request $request)
    {
        if ($request->isMethod('post')) {
   
    
        $hotels = Hotel::orderBy($request->input('type'),'asc')->get();
        $ar = array('hotels' => $hotels);
        foreach ($hotels as $hotel){
            echo "<br> name -> ".$hotel->name . "<br>";
            echo "<br> city -> ".$hotel->city . "<br>";
            echo "<br> price -> ".$hotel->price . "<br>";
            foreach ($hotel->available as $av) {
            echo "<br> available from " . $av->from . " to " . $av->to."<br>";
            }
    
        }
    
    }
    return view('sort');
    }



}
