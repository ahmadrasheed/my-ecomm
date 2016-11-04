<!DOCTYPE HTML>
<html>
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<title>Apriori Alghoritm</title>
</head>
<body style="font-family: monospace;">

<?php  
use App\MyApp\Apriori\Apriori;
use App\pi_product;
use App\transaction;
    

    
    
include(app_path() . '\MyApp\Apriori\Apriori.php');    
   

///////////////////////////////////above by Me //////////////////

    
//include 'config.php';
    ///////////////////////////////////config by Me //////////////////

$Apriori = new Apriori();

$Apriori->setMaxScan(20);       //Scan 2, 3, ...
$Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
$Apriori->setMinConf(50);       //Minimum confidence - Percent 1, 2, ..., 100
$Apriori->setDelimiter(',');    //Delimiter 



/*$dataset   = array();
$dataset[] = array('milk', 'bread', 'caco', 'tea'); 
$dataset[] = array('milk', 'tea', 'caco');  
$dataset[] = array('bread', 'caco'); 
$dataset[] = array('milk', 'Pepsi', 'caco'); 
$dataset[] = array('milk', 'Salt'); 
$dataset[] = array('caco', 'Salt', 'caco');
$dataset[] = array('milk', 'keesh', 'caco');
$dataset[] = array('milk', 'keesh', 'caco');
$dataset[] = array('milk', 'keesh');
$dataset[] = array('milk', 'keesh');
$dataset[] = array('milk', 'keesh');
$dataset[] = array('milk', 'keesh');
$dataset[] = array('coke', 'keesh');
$dataset[] = array('salt', 'keesh', 'caco');
$dataset[] = array('bread', 'keesh');
$Apriori->process($dataset);*/
    
   
        
/*
$Apriori->process('dataset.txt');
*/

/*reading the products from transaction table in the DB. to send it to apriori , and then after processing it
    will save the result in pi_product table to use it later to predict and recommend products to users .
    
    by Me */
    
    

$transactions=Transaction::all();
    $dataset   = array();
    foreach($transactions as $t){
        //array_push($dataset,$t['title']); 
        $dataset[]=array($t['title']);
    }
   // dd($dataset); 
    $Apriori->process($dataset);  // send them to apriori
    
    
    
    

    
//Frequent Itemsets
echo '<h1>Frequent Itemsets</h1>';
$Apriori->printFreqItemsets();

echo '<h3>Frequent Itemsets Array</h3>';
print_r($Apriori->getFreqItemsets()); 

//Association Rules
echo '<h1>Association Rules</h1>';
$Apriori->printAssociationRules();
    
    
////////////////////////////////////////////////////////////////down//////////////    
    
$AA=$Apriori->getFreqItemsets();
    
    
echo "Frequent items ....................................................................<br>"; 
  foreach ($AA as $sectionKey => $lines) {
      
   
  foreach ($lines as $key => $value) {
    
    print $sectionKey."\t";
    print " ($key) => $value\n";
    print "<br>";
  }
      print "\n";

}
    
echo "<hr>";    
    
    
  ////////////////////////////////////////////above by me //////////////////////////  
    
  
    /////////////////////////////////////////////by me ////////////////
    
    echo '<br> ===============================================================================';
   
     ///////////////////////////////////////////////////////down //////////////// 
    
    $A=array();
    
    $A=$Apriori->getAssociationRules();
    
    $exampleEncoded = json_encode($A);

    echo $exampleEncoded;
   
 // to empty the table and insert new apriori products 
    pi_product::truncate();
   
    
echo "<br>"; 
  foreach ($A as $sectionKey => $lines) {
      
   
  foreach ($lines as $key => $value) {
    $a=new pi_product();
    $a->brought=$sectionKey;
    $a->recommend=$key;
    $a->confidence=$value;
    $a->save();  
    
    print $sectionKey."\t";
    print "         ($key) => $value\n";
    print "<br>";
  }
      print "\n";

}

    

  // var_dump($A[1]);
 

//Save to file
$Apriori->saveFreqItemsets('freqItemsets.txt');
$Apriori->saveAssociationRules('associationRules.txt');
?>  


</body>
</html>
