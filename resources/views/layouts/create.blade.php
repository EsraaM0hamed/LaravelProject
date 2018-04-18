



 <script>
        window.addEventListener('load', doitfirst);
        function doitfirst() {
            map = document.getElementById('map');
            mapLable = document.getElementById('mapLable');
        }
        function getmyposition() {
            // 1- check availaiblity of geolocation in navigator
            if(navigator.geolocation)
            {
                // get permission
                navigator.geolocation.getCurrentPosition(getposition, errorhandeler);
            }
            else
            {
                // geolocation not availaible
                map.innerText = 'Sorry , Update your brwoser and try Agian !!';
            }
        }
        function getposition(position) {
           
            // console.log(position);
            lat = position.coords.latitude;
            lon = position.coords.longitude;

            // 1- create LATLON google object
            mylocation = new google.maps.LatLng(lat, lon);
             // 2- create attributes for returned image
             myattributes = { zoom: 17, center: mylocation , mapTypeId: google.maps.MapTypeId.ROADMAP};
            var myimg = new Image();
            myimg.src = new google.maps.Map(map, myattributes);
            var maps = new google.maps.Map(map, myattributes);

              // TestMarker();
              map.appendChild(myimg);
               var marker = new google.maps.Marker({
                position:mylocation,
                  map: maps,
                  draggable: true,
                title:"Hello World!"
            });
            marker.addListener('drag', function() {
                   mapLable.innerHTML=marker.getPosition();
                });
      
         
       
         
            //latllon = lat + ' , ' + lon;
        //    map.innerText = latllon;
        }
        function errorhandeler(error)
        {
            switch(error.code)
            {
                case error.PERMISSION_DENIED:
                    map.innerText = 'PERMISSION_DENIED';
                    break;

                       case error.POSITION_UNAVAILABLE:
                    map.innerText = 'POSITION_UNAVAILABLE';
                    break;
                case error.TIMEOUT:
                    map.innerText = 'TIMEOUT';
                    break;
                case error.UNKOWN_ERROR:
                    map.innerText = 'UNKOWN_ERROR';
                    break;
            }
        }

unction TestMarker() {
    mylocation= new google.maps.LatLng(lat, lon);
    addMarker(mylocation);
}
    </script> 
   

   


<form action="/emps/create" method="post" enctype="multipart/form-data">

{{csrf_field()}}
<div class="form-group">
  <label for="fname">First name:</label>
  <input type="text" class="form-control" name="fname" id="fname">
  <label for="sname">Second name:</label>
  <input type="text" class="form-control" name="lname" id="sname"><br/>
  <input name="image" class="btn" type="file" width="100" height="30" alt="Login"
       >
       
</div>
<div class="form-group">
  <label for="job_title">job Title:</label>
  <input type="text" class="form-control" name="job_title" id="job_title">

  
  <label for="location">location:</label>
 
  <input type="text" class="form-control" name="location"  id="location" value="{{$loc}}" >
  <a href="/map?page=emps/create">add Location from map</a><br/>

<!-- <input type="button" value="Display Location" onclick="getmyposition();" class="btn btn-outline-success"  /> -->
                



<label for="status">Status:</label>
  <input type="text" class="form-control" name="status" id="status">
 <div class="form-group">
 
</div> 
<button class="btn btn-primary">Add</button><br/>

</form> 
@extends('layouts.app')



