@extends('layouts.composants.main')

@section('content')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<link rel="stylesheet" href="{{ asset('css/map1.css')}}">
<script>
 function initMap() 
 {
   
  var mapProp = {
        center: new google.maps.LatLng(36.8189700, 10.165790),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

        var map = new google.maps.Map(document.getElementById('map'), mapProp);

  

}


</script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Google map</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          
            <li class="breadcrumb-item"><a href="{{route('quartier.create')}}">Ajouter une quartier</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          

        <div class="card card-primary card-outline">
          
          <div class="card-body">
      <div id="map" class="map"></div>
      <div id="carte" style="width:100%; height:100%;"></div>
      <div id="floating-panel" class="list-inline">
   
        <select name="select"  class="btn btn-outline-secondary dynamic" >
                            <div class="custom-select custom-select-lg mb-3">
                            <option value="" class="form-control" >Gouvernorat</option>
                      @foreach($gouvernaux as $gouvernorat)
                        <option value='{{$gouvernorat->id}}' class="form-control"  >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                        @endforeach
                        
                            </div>
                        </select>
                       
                        <select name="select"  class="btn btn-outline-secondary projet" >
                          <div class="col-md-4 inputGroupContainer">
                          <option value="" class="form-control" >Projet</option>
                    @foreach($projet as $p)
                      <option value='{{$p->id}}' class="form-control"  >{{$p->rang_projet}}</option>
                      @endforeach
                          </div>
                        </select>
                        <button class="btn btn-outline-secondary quartier"   >Afficher tous les quartiers</button>
                      
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
  
</div>
</div>


    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAHY_ywZ1yIevnGptX-i6KpETLiU-Yoe0&callback=initMap&libraries=&v=weekly"
  async
></script>
    {{csrf_field()}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
  		var map;
		
		// variable to hold current active InfoWindow
		var activeInfoWindow ;		

  
   var markers = [];
   
  $(document).ready(function(){
    var mapProp = {
        center: new google.maps.LatLng(36.8189700, 10.165790),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

        var map = new google.maps.Map(document.getElementById('map'), mapProp);
        var i;
        @foreach ($quartier as $q)
        i=i+1;
        var infowindow = new google.maps.InfoWindow();
          
        var marker =   new google.maps.Marker({
      position: new google.maps.LatLng({{$q['lat']}},{{$q['lng']}}),
      map,
      title: "Hello World!",
      label: "{{$q['id_projet']}}",
   
    })
    google.maps.event.addListener(marker, 'click', (function (marker, i) {
          
          
        return function () {
            infowindow.setContent("<h4>Rang projet:$q</h4>");
            infowindow.open(map, marker);


        }
      i=0;
    })(marker, i));
        
    markers.push(marker);
    @endforeach

});





          </script>
      
  @endsection

