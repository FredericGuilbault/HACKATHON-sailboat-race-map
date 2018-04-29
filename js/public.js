var mymap = L.map('mapid').setView([51.505, -0.09], 13);

var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var osm = new L.TileLayer(osmUrl );
mymap.setView(new L.LatLng(48.103509, -66.134322), 16);
osm.addTo(mymap);
let trackedBoats = [] ;

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (xhttp.readyState === 4) {
        var data = JSON.parse(xhttp.response,true)
        for( i in data){
            var marker = L.marker([48.103509, -66.134322]).addTo(mymap);
            trackedBoats.push([data[i],marker])
        }

        create_profil(trackedBoats );
        window.setInterval(function(){
            var pos = queryBoatsPos(trackedBoats)
console.log(pos )
            //    marker.setLatLng([lat, lng]).update();


        }, 1000);
    }
}
xhttp.open("GET", "ajax.php?getBoatList=true&cat=2", true);
xhttp.send();

function create_profil(data){
    var output = document.getElementById("profiles");
    html = '';
    for(i in data ){
     html += JSON.stringify(data[i][0], null, 2)+'<hr>'

    }
    output.innerHTML = "<p>"+html+"</p>";
}







function queryBoatsPos(boats){
    var cookies = Array();
    for(i in boats){
       var cookie = boats[i][0]['cookie'];
         cookies.push(cookie);
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4) {
            var data = JSON.parse(xhttp.response,true)

            for( let key in data ){
                console.log( data[key][0].lat )
                console.log( data[key][0].lon )

                
                //newLatLng
                //marker.setLatLng(newLatLng);
            }
        }
    }

    xhttp.open("GET", "ajax.php?getCoor=true&boatList="+JSON.stringify(cookies), true);
    xhttp.send();
}






