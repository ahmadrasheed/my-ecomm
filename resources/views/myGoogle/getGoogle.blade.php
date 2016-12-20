<!--this page is for viewing the data from Google Analytics-->

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
    
table#t01 th {
    background-color: black;
    color: white;
}
    
</style>
</head>
<body>

<table  id="t01">
  <tr>
   <th>user</th>
    <th>page path</th>
    <th>Country</th>
    <th>Number of users</th>
    <th>session duration</th>
    <th>Time to load page</th>
    <th>No. of page views</th>
    <th>seconds</th>
    
    
  </tr>      
<?php

echo " Google Analytics for users data <br><hr>";

    for($i=0;$i<count($data[0]);$i++) {
      echo('<tr>');
          for($j=0;$j<count($data);$j++) {
            echo('<td>' . $data[$j][$i] . '</td>');
            
          } 
echo('</tr>');
    
    }  
   
echo"</table>";



 if (Auth::check()) {
                                $userId = Auth::id(); // The user is logged in... 
                                echo "the user who is logged in is ". $userId;
                        }

?>  
        
        
        
    </body>
    
    
    
</html>




