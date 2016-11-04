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
use App\pi_product;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::paginate(6);
        
        
          /*to display recommend products for a specific user according to a priori table*/
         $recomended_products=null;
        if (Auth::check()) {
                // The user is logged in...
            $userId = Auth::id();
            
            
            $transaction=new Transaction(); // to send it to search in it for recommended products
            $pi_product=new pi_product();
            $products_obj=new Product();
            
            Recommend::bought_user_by_id($transaction, $userId);
            $p=Recommend::$bought_products;
            Recommend::recommend_products($pi_product,$p);
            Recommend::get_recommended_products($products_obj);
            
            $recommended_items=Recommend::$recommended_items;
            return view('shop.index', ['products' => $products ,'recommended_items'=>$recommended_items]);
            }
      
        
        return view('shop.index', ['products' => $products]);
        
       
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
                    $transaction->title= rtrim($itemsString,',');
                    $transaction->product_id=rtrim($itemsString2,',');
                    $transaction->description="just descriptions";
                    $transaction->user_id=$userId;
                    $transaction->save();   
                
                 /////////////////////////////////////////// 
           
           
                             
            
            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        
        
        
        
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
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
        dd($products->count());

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

    public function postAdd(Request $request){
        $data=$request->all();

        if(isset($data['add'])){
            $product=new Product();
            $product->title=$request->input('title');
            $product->category_id=$request->input('category_id');

            $product->save();
            return redirect()->back();
        }

    }





}
