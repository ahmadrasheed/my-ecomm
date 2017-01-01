<?php
//use App\Http\QrCode;

namespace App\Http\Controllers;

class QrController extends Controller
{
    public function getIndex()
    {
        //dd('dump');
        //dd("hello");
       //return view(QrCode::generate('Make me into a QrCode!'));
        
       // dd(QrCode::size(100)->generate(Request::url()));
           return view('qr');
        
        
    }

    
    
   
     
}
