<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;


    class HomeController extends Controller
    {
       public function getAnalyticsSummary(Request $request){
            $from_date = date("Y-m-d", strtotime($request->get('from_date',"30 days ago")));
            $to_date = date("Y-m-d",strtotime($request->get('to_date',$request->get('from_date','2016-12-05')))) ; 
            $gAData = $this->gASummary($from_date,$to_date) ;
            return $gAData;
        }
             //to get the summary of google analytics.
        private function gASummary($date_from,$date_to) {
            $service_account_email = 'get-data-analytics@analytics-api-project-148820.iam.gserviceaccount.com';       
            // Create and configure a new client object.
            $client = new \Google_Client();
            $client->setApplicationName("any name");
            $analytics = new \Google_Service_Analytics($client);
            $cred = new \Google_Auth_AssertionCredentials(
                $service_account_email,
                array(\Google_Service_Analytics::ANALYTICS_READONLY),
                  "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCrzw1R6ca16zYQ\n3ozuTlNVbvNWDPODW6NVrnny08V4ycd/ugvTQeU3EKno6mJ8iXNJ/3GXOz52iaRd\nGRKbfrPomK7gt6+F7EHVdpTfbc/u7TIJi5NbYzXS4jIXhIJhB4bGjzsnTGTY/6pF\nFmW/wgX2Y6n31EWyz2q5MiZDC5lEPrmNk/gOgWOyRHCVNHtBcyFdA3+w2or6ix5l\nrKlCwUkkzKAPb4OSvfDMz8o+h6r433E4+6MMHE/mf53CkX1DbDZIlZbUntYLoh19\n0oxKCufjfFEKqzxgTZxIbG5rK7jdrOFLuQwnaoKkUT0HAQTGnGoYrABo9HGjlgwg\n7rHzh+OzAgMBAAECggEBAKcRq8E41Ft4w1V6JI9jqRON1aCa7X2R8e3SwZFJL2C6\nzn28+9zN2khGswLkUSsLOgn+FYZbPO1mAWfqhragafBH8N5ioJNZX9dk/XWbQjTz\ngNHZYUzf16oe/VjzKRmTiRKym3ImjnaZfwi5s+3ZjZS/67ssNy6fFgfK5XwS3lKG\nFzAZYgCMyJIz8Cz9mHAHKmQELH29xiPNDSSCuAbScptOdNJvBB9Vvpu5b+/LtdWI\naBYLuZgMOSNgJiQFBjj/+RY5yBi9pL5aHYGHJJZnWp1CbxRQIN+xe5jBbpHZ6PWH\nUjoCfMkM+IWBNjlKOWCC/APFpGuDqYMRuHfakPvWIXECgYEA4otETO0hR00SceKt\nGXYtIX6ZfdK6K87EPTFofMXAvcH7CWU3Tr2+3pI/DWUD1pPEEfsOZpaS5Ry37IrQ\nVmhkS2j5QxYJ+NfEvjc17rdJuuwJeCeELDFNxsTvhk7yK6y75F7BFQH/dIcc7MYg\nTL11B340TpPlJtulnxLTW7G3nFkCgYEAwiXfGnpmuPE1yyGdux4mY1Eyp6ZmxC0o\nb+DIBqRRlwY23m7pv3g7a0GAqLIFaW7c/1iVlyoDg24eZ8YtSehtR0B5LEiExBaY\n7UpkqHosvCqgCH94O/Mas+DUv9Sfqy82geEagB65Cf+uLr/ixNbKiK12G29O/V7M\nCar/vaESjusCgYAl5zEtQbuAp3d/kHJvwSL56KmbsKcvby/MITkfLyL5XLw4rTOc\nvAh0Srm77vu+agizDXMyXN0E8lIfhHYpDtxA9bZGsChI9yjWvnwKjaYLXTSUYuAt\nWK5vpEGDEjBYeFUTd3sMncH06CpBv0BmNoifEVGFGB+N6dADFm5AeDKFOQKBgDzA\nEva7FEeMmrOMOknh3ks3ji0tgXyjUMLpSE3jvvAN7r9dX2EdYyJlpbejtNPP7/Eq\nq+xYJi9LFtKMDYHR69fe0cvMiVa+Z23g2GxrhnH+uILQODQyFsnwcUHxa2Dqbhjn\n8h3i/y2kxsE0I+ZJ+6gW9x0QkFvx/NCNpGaW7zKvAoGAffG7PqgXYNtqQ3MavgLF\nKtQFMzT65kI5AfXPpyzgBDKr84lhvdUddvK/FZg/mIuoLRLSgnYPnAv3s5yhleZ5\n7LGyo5fXXH7XUm2nNt+XZoV1rt6y+WgZi103M+fuv3GXYBdbOonPHopRzw3uzLIA\n9ovyAV95jOu9ybk4YgQXm5I=\n-----END PRIVATE KEY-----\n"
            );     
            $client->setAssertionCredentials($cred);
            if($client->getAuth()->isAccessTokenExpired()) {
                $client->getAuth()->refreshTokenWithAssertion($cred);
            }
            
            $optParams = [
                'dimensions' => 'ga:mobileDeviceBranding,ga:pagePath,ga:country',
                /*'sort'=>'-ga:date'*/
                /*'sort'=>'ga:pagePath'*/
            ] ; 
            
            $results = $analytics->data_ga->get(
               'ga:132964552', 
               $date_from,
               $date_to,
               
                'ga:users,ga:sessionDuration,ga:pageLoadTime,ga:pageviews,ga:timeOnPage',
               $optParams
               );
                
            
            
            /* 'ga:sessions,ga:users,ga:pageviews,ga:bounceRate,ga:hits,ga:avgSessionDuration,                ga:bounceRate',
            */
            
            
          
            
                $rows = $results->getRows();
                //dd($rows);
                $rows_re_align = [] ;
                foreach($rows as $key=>$row) {
                    foreach($row as $k=>$d) {
                        $rows_re_align[$k][$key] = $d ;
                    }
                }   
            
            
                $optParams = array(
                            'dimensions' => 'rt:medium'
                    );
            
            
            
                try {
                  $results1 = $analytics->data_realtime->get(
                      'ga:132964552',
                      'rt:activeUsers',
                      $optParams);
                  // Success. 
                } catch (apiServiceException $e) {
                  // Handle API service exceptions.
                  $error = $e->getMessage();
                }
            
                $active_users = $results1->totalsForAllResults ;
            
            
            
                return view('myGoogle.getGoogle', [
                   
                    'data'=> $rows_re_align ,
                    /*'summary'=>$results->getTotalsForAllResults(),*/
                   /* 'active_users'=>$active_users['rt:activeUsers']*/
                    ]) ;
        }
    }