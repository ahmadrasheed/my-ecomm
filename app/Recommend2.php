<?php
namespace App;

class Recommend2 {
    public static  $bought_products;
    
    public static  $recommended_items_words=array();// only the recommend words, not the actual products objs
    public static  $recommended_items; // the actual products objs that have been recommended 
    

    
    
    public static function bought_user_by_id($model,$userId)
    
    {
       // I used self instead of $this keyword, because self is the only one which work with static 
       self::$bought_products=$model->where('user_id',$userId )->get();
       
    }
    
    
    
    public static function recommend_products($model,$bought_products){
        foreach($bought_products as $bought_product ){
            
            $b=$bought_product['title'];
            $search_words=explode(',',$b);
            
            
            //search withing Apriori table
            foreach($search_words as $word){
              $recommends=$model->where('brought','LIKE','%'.$word.'%')->get(); 
              
                
            }
            
            
             foreach($recommends as $recommend){
               self::$recommended_items_words[]=$recommend['recommend']; 
                
                
            }
          
            
        }
            // to delete the any similar words in this array
         self::$recommended_items_words=array_unique( self::$recommended_items_words);
        
        
       
           
    }
    
    
    public static function get_recommended_products($model){
        
        foreach( self::$recommended_items_words as $item){
            
            self::$recommended_items[]=$model->where('title','=',$item)->get();
            /*echo "hhhhhhhhhhhhhhhhhhhhhh";
            echo "<br>";*/
            
        }
        
        
        
    }
    
    
    
    
    
}