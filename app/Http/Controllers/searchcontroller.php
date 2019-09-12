<?php

namespace App\Http\Controllers;
use App\Model\Available;
use App\Model\Hotel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class searchcontroller extends Controller
{
    public function show(Request $request)
    {
    if ($request->isMethod('post')) {
        
        $json = json_decode(file_get_contents('https://api.myjson.com/bins/pq0f6?fbclid=IwAR2M3WBtTyl5nuTMc_JiyYvfIf3Yn4AFCqkycMbVyJkgir1GYBAONUZwrfk'), true);
        echo "<pre>";
        
        //print_r($json['hotels']);
        // offline work
        foreach ($json['hotels'] as $hotel) {
            if($request->input('name')){
                if($request->input('name')==$hotel['name']) {
                    $GLOBALS['ar[]']=$hotel;
                }
            }

            if($request->input('city')){
                if($request->input('city')==$hotel['city']) {
                    $GLOBALS['ar[]']=$hotel;
                }
            }

            if ($request->input('priceone') && $request->input('pricetwo')) {   
                if (($request->input('priceone') <= $hotel['price'] && $request->input('pricetwo') >= $hotel['price']) || (($request->input('priceone') >= $hotel['price'] && $request->input('pricetwo') <= $hotel['price']))) {
                    $GLOBALS['ar[]']=$hotel;
                }
            }
            
            if($request->input('dateone') && $request->input('datetwo')){
                foreach ($hotel['availability'] as  $av) {
                    if (($request->input('dateone') <= $av['from'] && $request->input('datetwo') >= $av['from']) || (($request->input('dateone') >= $av['from'] && $request->input('datetwo') <= $av['from']))  ||  ($request->input('dateone') <= $av['to'] && $request->input('datetwo') >= $av['to']) || (($request->input('dateone') >= $av['to'] && $request->input('datetwo') <= $av['to']))) {
                        $GLOBALS['ar[]']=$hotel;
                    }
                    
                }
            }
        }
        print_r($ar);

        }
    
    return  view('show');
    }

    
    public function search(Request $request){

        if ($request->isMethod('post')) {
            $hotels = Hotel::join('available','hotel.id', '=',  'available.hotel_id')
                    ->where('name',$request->input('name'))
                    ->orwhere('city',$request->input('city'))
                    ->orwhereBetween('price', [$request->input('first'),$request->input('second')])
                    ->orwhereBetween('available.from', [$request->input('f'),$request->input('s')])
                    ->orwhereBetween('available.to', [$request->input('f'),$request->input('s')])
                    ->get();
                    
                    $arr[]=$hotels[0]['hotel_id'];
                    for ($i=0; $i < count($hotels)-1 ; $i++) {
                         if ($hotels[$i]['hotel_id']!=$hotels[$i+1]['hotel_id']) {
                            $arr[]=$hotels[$i+1]['hotel_id'];
                        }
                    }  
            $hotels = Hotel::all();      
                    foreach($arr as $i) {
                        echo "<br> name -> ".$hotels[$i-1]->name . "<br>"."<br> city -> ".$hotels[$i-1]->city. "<br>"."<br> price -> ".$hotels[$i-1]->price. "<br>";
                        foreach ($hotels[$i-1]->available as $av) {
                            echo "<br> available from " . $av['from'] . " to " . $av['to']."<br>";           
                        }
          
                    }
        

        }

        return view('search');
    }


    public function sort(Request $request)
    {
        if ($request->isMethod('post')) {
   
        $hotels = Hotel::orderBy($request->input('type'),'asc')->get();
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
/*
    DB::table('words')
    -> join('users_words_relationship','users_words_relationship.word_id','=','words.id')
    -> where('users_words_relationship.user_id','=',Auth::user()->id) 
    -> join('translate','translate.word_id','=','words.id')
    -> select('words.word', DB::raw('GROUP_CONCAT(DISTINCT translate.translate) as translations'))
    -> group_by('words.word')
    -> get();
    DB::table('words')
    ->join('users_words_relationship','users_words_relationship.word_id','=','words.id')
    ->where('users_words_relationship.user_id','=',Auth::user()->id)  
    ->join('translate','translate.word_id','=','words.id') 
    ->groupBy('translate.word_id')
    ->select('words.word','translate.translate')
    ->get();
    DB::table('words')
    ->join('users_words_relationship','users_words_relationship.word_id','=','words.id')
    ->where('users_words_relationship.user_id','=',Auth::user()->id)  
    ->join('translate','translate.word_id','=','words.id') 
    ->select('words.word','translate.translate')
    ->get();         
*/
}
