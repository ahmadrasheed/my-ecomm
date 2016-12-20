<!DOCTYPE HTML>
<html>
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<title>Apriori Alghoritm</title>
</head>
<body style="font-family: monospace;">
<?php  

    
    
    // not used by me ................... the used one is in views/apriori
    
    //////////
    ////////////////
    /////////////////////
    ////////////////////////////
    /////////////////////////////////
    
    
    
    
    
    
//use App\MyApp\Apriori\class.apriori;
///////////////////////////////////above by Me //////////////////
include 'class.apriori.php';
    
include 'config.php';
    ///////////////////////////////////config by Me //////////////////

$Apriori = new Apriori();

$Apriori->setMaxScan(20);       //Scan 2, 3, ...
$Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
$Apriori->setMinConf(50);       //Minimum confidence - Percent 1, 2, ..., 100
$Apriori->setDelimiter(',');    //Delimiter 



$dataset   = array();
$dataset[] = array('Milk', 'bread', 'caco', 'tea'); 
$dataset[] = array('Milk', 'tea', 'caco');  
$dataset[] = array('bread', 'caco'); 
$dataset[] = array('Milk', 'Pepsi', 'caco'); 
$dataset[] = array('Milk', 'Salt'); 
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
$Apriori->process($dataset);
    
    
    
    
    
  
    
        
/*






$Apriori->process('dataset.txt');
*/
//Frequent Itemsets
echo '<h1>Frequent Itemsets</h1>';
$Apriori->printFreqItemsets();

echo '<h3>Frequent Itemsets Array</h3>';
print_r($Apriori->getFreqItemsets()); 

//Association Rules
echo '<h1>Association Rules</h1>';
$Apriori->printAssociationRules();
    
    
    
    
$AA=$Apriori->getFreqItemsets();
    
    
echo "Frequent items ....................................................................<br>"; 
  foreach ($AA as $sectionKey => $lines) {
      
   
  foreach ($lines as $key => $value) {
    
    print $sectionKey."\t";
    print "         ($key) => $value\n";
    print "<br>";
  }
      print "\n";

}
    
echo "<hr>";    
    
    
    
    
    
    
    
    

echo '<h3>Association Rules Array</h3>';
print_r($Apriori->getAssociationRules()); 

    /////////////////////////////////////////////by me ////////////////
    
    echo '<br> ===============================================================================';
    $A=array();
    
    $A=$Apriori->getAssociationRules();
    
    $exampleEncoded = json_encode($A);
    echo "<br>";
    echo "9999999999999999999999999999999999999999999999999>";
    echo "<br>";
    echo $exampleEncoded;
    echo "<br>";
    echo "9999999999999999999999999999999999999999999999999>";
        
  

   
$cars=array(
    array("volvo",22,18),
    array("BMW",15,13),
    array("Saab",4,2),
    array("Sonata",4,2)
    );
   
   
    
    
    $arrlength = count($A); 
   
    
/**    
for($row=0;$row<$arrlength;$row++){
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col=0;$col<count($A[$row]);$col++){
        echo "<li>".$A[$row][$col]."</li>";
        
    }
    echo "</ul>";
    
    
} 
**/
    
   
echo "<br>"; 
  foreach ($A as $sectionKey => $lines) {
      
   
  foreach ($lines as $key => $value) {
    
    print $sectionKey."\t";
    print "         ($key) => $value\n";
    print "<br>";
  }
      print "\n";

}

 
    
    
    
/**    
$arrlength = count($A); 
echo $arrlength;   
    
echo "<ol>";
for ($row = 0; $row < $arrlength; $row++)
{
    echo "<li><b>The row number $row</b>";
    echo "<ul>";
    
        foreach($A[$row] as $key => $value){
        echo "<li>".$value."</li>";
    }

echo "</ul>";
echo "</li>";
}
echo "</ol>";
    
    
 **/   
    
    
    
    
    
    
    
    
    
    
    
    
    
  // var_dump($A[1]);
    
    
    ///////////////////

//Save to file
$Apriori->saveFreqItemsets('freqItemsets.txt');
$Apriori->saveAssociationRules('associationRules.txt');
?>  







$array = array("Name"=>"Shubham","Age"=>"17","website"=>"http://mycodingtricks.com");

$serialize = serialize($array);

mysqli_query($con,"INSERT into `transactions` (`column`) VALUES ('$serialize')");








</body>
</html>
