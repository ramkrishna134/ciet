<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pmevidya extends Controller
{
    //

    public function index(){
        return view('web.pmevidya');
    }

    public function schedule($class, $channel, $category){
        $url='https://swayamprabha.gov.in/index.php/Api_data?channel_no='.$channel.'&category='.$category.'';
        $data = json_decode(file_get_contents($url), true);
        return view('web.pmevidya-current', compact('data','channel','category', 'class'));
    }
}
