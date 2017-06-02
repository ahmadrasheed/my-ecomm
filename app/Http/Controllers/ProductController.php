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




class ProductController extends Controller
{


    //for testng ajax
    public function getIndex2()
    {

          //return view('shop.details', ['productD' => $productD]);
        return view('shop.index2');

    }
      public function postTest()
    {

          //return view('shop.details', ['productD' => $productD]);
        return view('shop.test');

    }

        public function postAjax(Request $request)
    {
        dd($request['name']);
         return response()->json("ahmad",200);

    }

    public function getIndex()
    {

        // implementing Apriori according to user's country, this will be excuted automatically by this control
        //----------------------------------------------------
        // a new class of Apriori with it's setting
        $Apriori2 = new Apriori();

        $Apriori2->setMaxScan(20);       //Scan 2, 3, ...
        $Apriori2->setMinSup(2);         //Minimum support 1, 2, 3, ...
        $Apriori2->setMinConf(50);       //Minimum confidence - Percent 1, 2, ..., 100
        $Apriori2->setDelimiter(',');    //Delimiter

        $country="iraq"; //here we can use Geolocation API to be used to indicate the visiter location
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

            $product=Product::where('title','=','bmw')->first();
            //dd($product);

            return view('shop.index', [

                    'products' => $products,
                    'recommended_items'=>$recommended_items,
                    'gmv_products'=>$gmv_products,
                    'recommended_items2'=>$recommended_items2

                                      ]);
            }


        return view('shop.index', [

            'products' => $products,
            'gmv_products'=>$gmv_products

        ]);


    }

    //---------------------------------------------------End of getIndex function -------------------------------
    public function getDetails(Request $request, $id)
    {

        $productD = Product::find($id);
        //dd($product);

        return view('shop.details', ['productD' => $productD]);



    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_fwmVPdJfpkmwlQRedXec5IxR');
        try {
           /* $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));*/

            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            //$order->payment_id = $charge->id;


 ////////////////////////////   /// to add the items of the cart to the transactions table inorder to calculate apriori on it

            $userId = Auth::id(); // id of the user is logged on

            $items=$cart->items;
            $itemsString=null;
            $itemsString2=null;

            foreach($items as $item){
              echo $item['item']['title'];
                  $itemsString=$itemsString.$item['item']['title'].',';
                  $itemsString2=$itemsString2.$item['item']['id'].',';


            }
                    $transaction=new Transaction();
                    $transaction->title= rtrim($itemsString,','); //we used rtrim again to remove the upper right comma
                    $transaction->product_id=rtrim($itemsString2,',');
                    $transaction->description="just descriptions";
                    $transaction->user_id=$userId;
                    $transaction->save();

                      // for sending it to google analytics
                    $googleProduct=rtrim($itemsString,',');


                 ///////////////////////////////////////////




            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }



       // print_r($googleProduct);
        Session::forget('cart');
        Session::set('googleProduct', $googleProduct);// setting session for this data bcz I did'nt mangae other way

        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');

        /* return view('shop.index', ['googleProduct' => $googleProduct,'success'=>'Successfully purchased products!']);*/

    }



    /*=============== Admin for add , remove , update products ============*/

    /*===================================================================*/

    public function getProducts(){
        $products=Product::all();

        return view('admin.products',['products'=>$products]);

    }




    /* ================ search for products===========*/


    // (1)searching for products in index page
    // we need to append Paginate function at the end of each query, or else error will
    // be rised because link function in the index will not be known

       public function getSearch_index(Request $request){


        $search=request()->input('search');

        $count=Product::where('title','LIKE','%'.$search.'%')->count();


        if ($count==0){

                session()->flash('search_results', 'Sorry, Not found!');
                session()->flash('alert_type', 'alert-danger');
                $products=Product::Paginate(3);
        }
           else
           {
               session()->put('search_results', 'we found '.$count.'  of products');
               session()->flash('alert_type', 'alert-success');
               // brings data even no query is true
                $products=Product::where('title','LIKE','%'.$search.'%')->Paginate(5);
           }



           return view('shop.index',[
            'products'=>$products
        ]);



    }


    //(2) searching for products in products page

    public function getSearch(Request $request){
        $search=request()->input('search');

        $products=Product::where('title','LIKE','%'.$search.'%')->get();
        //dd($products->count());

        if (!count($products)>0){

            $products=Product::all();
        }

        return view('admin.products',[
            'products'=>$products
        ]);

    }








/*
    public function getProductsByCategory($id){
        $category=Category::find($id);
            $products=$category->products;
            $category_name=$category->name;
            $category_id=$category->id;


        return view('admin.products-by-category',[
            'products'=>$products,
            'category_name'=>$category_name,
            'category_id'=>$category_id

        ]);

    }*/


    public function postDeleteOrUpdate(Request $request){

        $data = $request->all();
        $product=Product::find($request->input('id'));
        /*dd($data);*/

        if(isset($data['delete'])){

            if($product)
                $product->delete();
            return redirect()->back();
        }

        if(isset($data['update'])){

            $product->title=$request->input('title');
            $product->price=$request->input('price');
            $product->description=$request->input('description');
            $product->update();


            $category=$product->category;

            $products=$category->products;

             return view('admin.products-by-category',[
            'products'=>$products,
            'category_name'=>$category->name,
            'category_id'=>$category->id
                ]);

        }




    }


    public function getAdd(Request $request){
      $category=Category::all();
      return view('admin.add-product',['category'=>$category]);

    }
    public function postAdd(Request $request){
        $data=$request->all();

        if(isset($data)){
            $product=new Product();
            $product->title=$request->input('title');
            $product->description=$request->input('content');
            $product->price=$request->input('price');
            $product->imagePath=$request->input('imagePath');
            $product->category_id=$request->input('sectionId');
            // dd($product);

            $product->save();
            return redirect()->back();
        }

    }





}
