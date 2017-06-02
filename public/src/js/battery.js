// the page visibilty API by W3C

/*we will stop downloading youtube iframe when the page visibility changed, this will save the bandwidth and cpu,memory resources.*/

document.addEventListener('visibilitychange', function () {
    if (document.hidden) {

        //First get the  iframe URL
        //when defining varible without 'var', it will become global. we have to make it gloabal in order to use it to fill youtube iframe again in the else statement
        url = $('#youtube').attr('src');

        //Then assign the src to null, this then stops the video been playing
        $('#youtube').attr('src', '');



}

        // stop running expensive task
     else {
        // page has focus, begin running task
        //battery();





         // Finally you reasign the URL back to your iframe, so when you hide and load it again you still have the link
        $('#youtube').attr('src', url);


    }
});






/*======================================= battery API by W3C ==============================*/



battery();
                              /*battery code API by w3c specification*/
function battery(){




    //support detecting ...
        if (window.navigator && window.navigator.battery) {
               // Grab the battery's information!
            } else {
               // Not supported
            }




      console.log("battery API is excuting....");

      function updateBatteryStatus(battery) {
    /*    document.querySelector('#charging').textContent = battery.charging ? 'charging' : 'not charging';
        document.querySelector('#level').textContent = battery.level;
        document.querySelector('#dischargingTime').textContent = battery.dischargingTime / 60;*/


          batteryLevel=battery.level;
          // alert("your battery level is:"+batteryLevel);
          console.log("your battery level is:"+batteryLevel);

          // important ........  ... .....
          if(batteryLevel>0.50){

                geolocation(); // calling the geolocation api with ajax call

          }
          else{
              console.log("sorry, ajax call is not recommended due to your battery level");

              $('#gif').fadeOut();
              $('.carousel').remove(); // removing the carousel

          }


      }







      navigator.getBattery().then(function(battery) {

            // Update the battery status initially when the promise resolves ...
            updateBatteryStatus(battery);

            // .. and for any subsequent updates.
            battery.onchargingchange = function () {
              updateBatteryStatus(battery);
            };

            battery.onlevelchange = function () {
              updateBatteryStatus(battery);
            };

            battery.ondischargingtimechange = function () {
              updateBatteryStatus(battery);
            };


      });

 }
