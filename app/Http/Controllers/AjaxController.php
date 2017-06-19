<?php

namespace App\Http\Controllers;
use File;
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
// here Ramadan
use App\Apriori_g;
use App\AprioriG;
use App\Gproduct;
use App\interest;
use Response;
use App\MyApp\Apriori\Apriori;
class AjaxController extends Controller
{
    public function getIndex(Request $request)
    {
        //dd('dump');

        return view('test');
    }

        public function postIndex(Request $request)
    {
        //dd('dump');
      //  $QR=$request['QR'];
      $file = $request->file('image');
      return view('test',['QR'=>$file]);





    }




  /* for QR code Ajax request, returning details about a specific product to be shown.*/

  public function postQR(Request $request)
    {
      $data=$request->input('payload');
      $productD = Product::where('title','=',$data)->get();
            //will get array of objects, I suppose to return only one obj, but then the
            //javascript will return error, coz I build my js to retieve array. I'm lazy to
            // modify it.

       $productD2 = Product::where('title','=',$data)->first();
            //this will get only one object,


       if (Auth::check()) {
            //$productD2 = Product::where('title','=',$data)->get();
            $userId = Auth::id(); // The user is logged in...
            $tt=new interest();
            $tt->user_id=$userId;
            $tt->category_id=$productD2->category_id;
            $tt->product_id=$productD2->id;

             // for simplicity only, we can make relationship manyTomany instead.

            $tt->save();

       }

     // return view('shop.details', ['productD' => $productD]);
        return response()->json($productD, 200);


    }






    public function postMsg()
    {
        return view('ajax');
    }





    public function create(Request $request) {


// return response()->json("heelo", 200);


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
        $batteryLevel=$request->input('batteryLevel');

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
        $Apriori2->setMinConf(20);       //Minimum confidence - Percent 1, 2, ..., 100
        $Apriori2->setDelimiter(',');    //Delimiter

        $data=$request->input('payload');



        $country=$data; //here we can use Geolocation API to be used to indicate the visiter location


            $transactions2=gproduct::where('country','=',$country)->take(1000)->get();  // for not slowing speed
            // dd($transactions2[0]['title2']);

            $dataset2= array();
                foreach($transactions2 as $t){
                        //array_push($dataset,$t['title']);
                        $dataset2[]=array($t['title2']);
                                                    //notice title2 of gproducts :)
                    }
    //  dd($dataset2);
            $Apriori2->process($dataset2);  // send them to apriori

        // to empty the table and insert new apriori products
            // AprioriG::truncate(); //the name of the class
            Apriori_g::truncate(); //the name of the class Ramadan
// use App\apriori_g;

        $A2=array();

        $A2=$Apriori2->getAssociationRules();

        // dd($A2);
            foreach ($A2 as $sectionKey => $lines2) {

                  foreach ($lines2 as $key => $value) {

                    //$a=new AprioriG();        // to store the results in this table
                    $a=new Apriori_g();
                    $a->brought=$sectionKey;
                    $a->recommend=$key;
                    $a->confidence=$value;
                    $a->save();

                  }
            }



     // ما اعتقد احتاجها هنا بالاي جاكس  ==========can be removed ========

        $products = Product::paginate(6);

        /*to display most visited products */
        $gmv=Gmvisit::orderBy('hits', 'desc')->take(5)->get(); //this will get only the id of the products

        $gmv_products=array();
            foreach($gmv as $p)
                $gmv_products[]=Product::find($p->product_id);
         $gmv_products=array_unique($gmv_products);

        //=====================================================

        /*to display recommend products for a specific user according to a priori table*/
         $recomended_products=null;


        if (Auth::check()) {
            $userId = Auth::id(); // The user is logged in...

            /*preparing the model of tables to be used for recommending globally or by country*/
            $transaction=new Transaction(); // to send it to search it for recommended products
            $pi_product=new pi_product();
            $products_obj=new Product();
            $apriori_g=new Apriori_g();
            $gproduct=new Gproduct();

            /*--------------------------------------------------*/
            // here can can remove it from Ajax recommendation.... it is implemented other place.
            // for recommending accroding to global data
            Recommend::bought_user_by_id($transaction, $userId);
            $p=Recommend::$bought_products;
            Recommend::recommend_products($pi_product,$p);
            Recommend::get_recommended_products($products_obj);

            $recommended_items=Recommend::$recommended_items;
            //dd($recommended_items);
            /*--------------------------------------------------*/



            /*for recommending from gproducts and AprioriG tables to be by country recommendation*/

            Recommend2::bought_user_by_id($transaction, $userId);//also using transaction table bz I know user's id
            // above line will get all things user had purchased.
            $pp=Recommend2::$bought_products;

            Recommend2::recommend_products($apriori_g,$pp);//apriori_g has all the appriori tables that has only iraqies product for instance.
            Recommend2::get_recommended_products($products_obj);//searching in product table
            //above line, to get full information about the recommended products.
            $recommended_items2=Recommend2::$recommended_items;

        //  dd( $recommended_items2);


/*            return view('shop.index', [

                    'products' => $products,
                    'recommended_items'=>$recommended_items,
                    'gmv_products'=>$gmv_products,
                    'recommended_items2'=>$recommended_items2

                                      ]);*/

            //battery level
            if($batteryLevel<0.97){
              return response()->json(array($recommended_items2[0]), 200);
              // we have put in inside array funciton, to keep the structure (array of array ) otherwise code in index will not work
            }


            return response()->json($recommended_items2, 200);
            }


      /*  return view('shop.index', [

            'products' => $products,
            'gmv_products'=>$gmv_products

        ]);*/






    }


}
