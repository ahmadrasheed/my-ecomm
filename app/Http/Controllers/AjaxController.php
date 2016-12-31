<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Category;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;


use Stripe\Charge;
use Stripe\Stripe;
use App\Transaction;
use App\Recommend;
use App\Recommend2;
use App\pi_product;
use App\Gmvisit;
use App\AprioriG;
use App\Gproduct;

use App\MyApp\Apriori\Apriori;
class AjaxController extends Controller
{
    public function getIndex()
    {
        //dd('dump');
        return view('test');
    }

    
    
    public function postMsg()
    {
        return view('ajax');
    }
    
    
    
    
    
    public function create(Request $request) {
        //check if its our form
       /* if ( Session::token() !== $request['_token']) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create setting'
            ) );
        }*/
 /*
        $setting_name = $request['setting_name'];
        $setting_value = $request['setting_value'];
 */
        //.....
        //validate data
        //and then store it in DB
        //.....
        
        
        $data=$request->input('payload');
        
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        
        
        
        $products = Product::all();
        
        $products=gproduct::where('country','=',$data)->take(10)->get();
        
     /*      return view('test', [
            
            'products' => $products
        ]);*/
        
        
        
    //dd("ddddddddddddddddddddddd");
     //return response()->json($products, 200);
       // return $products;
        
        
        
        
        
        /* 
       
       
       this is for test to make recommendation  ==================
       
       
        */
        
           
    
        // implementing Apriori according to user's country, this will be excuted automatically by this control
        //----------------------------------------------------
        // a new class of Apriori with it's setting
        $Apriori2 = new Apriori();

        $Apriori2->setMaxScan(20);       //Scan 2, 3, ...
        $Apriori2->setMinSup(2);         //Minimum support 1, 2, 3, ...
        $Apriori2->setMinConf(50);       //Minimum confidence - Percent 1, 2, ..., 100
        $Apriori2->setDelimiter(',');    //Delimiter 
        
        $data=$request->input('payload');
        
        
        
        $country=$data; //here we can use Geolocation API to be used to indicate the visiter location
            $transactions2=gproduct::where('country','=',$country)->take(1000)->get();  // for not slowing speed
        
            $dataset2= array();
                foreach($transactions2 as $t){
                        //array_push($dataset,$t['title']); 
                        $dataset2[]=array($t['title2']);                              //notice title2
                    }
        // dd($dataset); 
            $Apriori2->process($dataset2);  // send them to apriori
        
        // to empty the table and insert new apriori products 
            AprioriG::truncate(); //the name of the class
   
    
        $A2=array();
    
        $A2=$Apriori2->getAssociationRules();
            foreach ($A2 as $sectionKey => $lines2) {  
   
                  foreach ($lines2 as $key => $value) {
                    $a=new AprioriG();        // to store the results in this table 
                    $a->brought=$sectionKey;
                    $a->recommend=$key;
                    $a->confidence=$value;
                    $a->save();  

                  }
            }
        
        
        
        
        $products = Product::paginate(6);
        
        /*to display most visited products */
        $gmv=Gmvisit::orderBy('hits', 'desc')->take(5)->get(); //this will get only the id of the products
        
        $gmv_products=array();
            foreach($gmv as $p)
                $gmv_products[]=Product::find($p->product_id); 
         $gmv_products=array_unique($gmv_products);
        
        
        
        /*to display recommend products for a specific user according to a priori table*/
         $recomended_products=null;
        
       
        if (Auth::check()) {
            $userId = Auth::id(); // The user is logged in... 
            
            /*preparing the model of tables to be used for recommending globally or by country*/
            $transaction=new Transaction(); // to send it to search it for recommended products
            $pi_product=new pi_product();
            $products_obj=new Product();
            $aprioriG=new AprioriG();
            $gproduct=new Gproduct();
            
            /*--------------------------------------------------*/
            
           
            // for recommending accroding to global data
            Recommend::bought_user_by_id($transaction, $userId);
            $p=Recommend::$bought_products;
            Recommend::recommend_products($pi_product,$p);
            Recommend::get_recommended_products($products_obj);
            
            $recommended_items=Recommend::$recommended_items;
            //dd($recommended_items);
            /*--------------------------------------------------*/
            
            
           
            /*for recommending from gproducts and AprioriG tables to be by country recommendation*/
            Recommend2::bought_user_by_id($transaction, $userId);//also using transaction table bz I know it's id
            $pp=Recommend2::$bought_products;
        
            Recommend2::recommend_products($aprioriG,$pp);
            Recommend2::get_recommended_products($products_obj);//searching in product table
            
            $recommended_items2=Recommend2::$recommended_items;
            
           //dd( $recommended_items2);
        
            
/*            return view('shop.index', [
                
                    'products' => $products,
                    'recommended_items'=>$recommended_items, 
                    'gmv_products'=>$gmv_products,
                    'recommended_items2'=>$recommended_items2
                                      
                                      ]);*/
            
           
            
            return response()->json($recommended_items2, 200);
            }
      
        
      /*  return view('shop.index', [
            
            'products' => $products,
            'gmv_products'=>$gmv_products
        
        ]);*/
        
       
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
   
     
}
