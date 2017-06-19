<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoriesController extends Controller
{


    public function getCategories(){
        $categories=Category::all();

        return view('admin.categories',['categories'=>$categories]);


    }

    public function postDeleteOrUpdate(Request $request){

        $data = $request->all();
        $category=Category::find($request->input('id'));

        if(isset($data['delete'])){

            if($category)
                $category->delete();

            return redirect()->route('categories.index');
        }

        if(isset($data['update'])){

          $this->validate($request, [
              'name' => 'bail|required|unique:categories|max:255',
              // 'body' => 'required',
          ]);


            $category->name=$request->input('name');
            $category->update();
            return redirect()->back();
        }


           if(isset($data['view'])){

            $category=Category::find($request->input('id'));
                $products=$category->products;
                $category_name=$category->name;
                $category_id=$category->id;

/*dd($category_id);*/
        return view('admin.products-by-category',[
            'products'=>$products,
            'category_name'=>$category_name,
            'category_id'=>$category_id

        ]);
        }






    }

    public function postAdd(Request $request){

      $this->validate($request, [
          'name' => 'bail|required|unique:categories|max:255',
          // 'body' => 'required',
      ]);


        $data=$request->all();

        if(isset($data['add'])){
            $category=new Category();
            $category->name=$request->input('name');

            $category->save();
            return redirect()->back();
        }

    }


    public function getCategoryById($id){
        $category=Category::find($id);
        if(isset($category))
        return $category->name;
        return "sorry, NO items in this category";



    }



}
