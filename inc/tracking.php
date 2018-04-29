<br><br>
<button onclick="geoloc()">
<h1>    Start   </h1>
</button>
<br><br>
<button onclick="stopWatch()">
    <h1>    Stop</h1>
</button>
<br><br>
<button onclick="deleteCookie()">
    <h1>     Delete</h1>
</button>
<br><br>
<div id="out"></div>


<script>
   var cookieId ="<?php echo Cookie::getId() ;?>"
    var watchId = null;

    function deleteCookie(){
        alert("TODO: remove the cookie ")
    }

    function geoloc() {
        if (navigator.geolocation) {
            var optn = {
                enableHighAccuracy : true,
                timeout : Infinity,
                maximumAge : 0
            };
            watchId = navigator.geolocation.watchPosition(showPosition, showError, optn);
        } else {
            alert('Geolocation is not supported in your browser');
        }
    }


    function showPosition(position) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState === 4) {
                var output = document.getElementById("out");
                var data = JSON.parse(xhttp.response,true)
                output.innerHTML = "<p>"+data.lat+"<br>"+data.lon+"</p>";
            }
        }

        xhttp.open("GET", "post.php?lat="+position.coords.latitude+"&lon="+position.coords.longitude+"&id="+cookieId, true);
        xhttp.send();


    }


    function stopWatch() {
        if (watchId) {
            navigator.geolocation.clearWatch(watchId);
            watchId = null;

        }
    }

    function showError(error) {
        var err = document.getElementById('mapdiv');
        switch(error.code) {
            case error.PERMISSION_DENIED:
                err.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                err.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                err.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                err.innerHTML = "An unknown error occurred."
                break;
        }
    }

</script>






