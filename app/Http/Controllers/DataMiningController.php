<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class DataMiningController extends Controller
{
    //
    
      public function getApriori()
    {
        
        return view('apriori.example_c');
    }
    
    
    
      public function getAprioriByCountry()
    {
        
        return view('apriori.example_c2',['country'=>$country]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
