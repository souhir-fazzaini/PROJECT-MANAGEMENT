@extends('layouts.composants.main')

@section('content')
  <head>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="{{ asset('css/map1.css')}}">

    <script>
      let map;

      function initMap() {
    
  }
    </script>
  </head>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Google maps</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-info" href="{{route('municipalite.create')}}"><span class="fas fa-plus-square"></span></a></li>

            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
          

            <div class="card card-primary card-outline">
              
              <div class="card-body">
                
                <div class="container">
                  <div class="row">
                    <div class="col-12">
    <div id="map"></div>
    <select name="select" class="btn btn-outline-secondary dynamic" >
      <div class="col-md-4 inputGroupContainer">
        <option value="" class="form-control" >Gouvernorat</option>
@foreach($gouvernaux as $gouvernorat)
  <option value='{{$gouvernorat->id}}' class="form-control"  >{{$gouvernorat->nom_gouvernorat_fr}}</option>
  @endforeach
  
      </div>
  </select>
  <button class="btn btn-outline-secondary quartier"   >Afficher tous les quartiers</button>


<select name="select"  class="btn btn-outline-secondary projet" >
<div class="col-md-4 inputGroupContainer">
<option value="" class="form-control" >Projet</option>
@foreach($projet as $p)
<option value='{{$p->id}}' class="form-control"  >{{$p->rang_projet}}</option>
@endforeach

</div>
</select>

</div>
</div>
</div>




</div>
</div>
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAHY_ywZ1yIevnGptX-i6KpETLiU-Yoe0&callback=initMap&libraries=&v=weekly"
async
></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<script>

  const quartier = JSON.parse(`<?= json_encode($quartier) ?>`);
          
         
         
             const limite_quartier = JSON.parse(`<?= json_encode($limite_q) ?>`);
           
             const projet = JSON.parse(`<?= json_encode($projet) ?>`);
             
               
           
                 
                 
                 // variable to hold current active InfoWindow
                 var activeInfoWindow ;		
         
          
            var markers = [];
            var polygone = [];
     $(document).ready(function(){
      var uluru = { lat: 36.823475, lng:  10.060678};
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: uluru,
    });
         var line = new Array();
       
       var points = new Array();
       
     @isset($id)
     var id = '<?php echo $id; ?>';
     
     var nb
     for(var i=0;i<projet.length;i++)
     {
       if(projet[i].id==id)
       nb=i;
     }
     for (var i = 0; i < quartier.length; i++) {
     if(quartier[i].id_projet==id)
     {
     var marker =   new google.maps.Marker({
     position: new google.maps.LatLng(quartier[i].lat,quartieri].lng),
     map,
     
     label: "P"+quartier[i].id_projet.toString(),
     
     })
     google.maps.event.addListener(marker, 'click', (function (marker, i) {
     
       var infowindow = new google.maps.InfoWindow();
     
     return function () {
       href= '/quartier/update/'+quartier[i].id_projet+'/'+quartier[i].id;
       var  $id=quartier[i].id;
     infowindow.setContent("<h4>Rang projet:</h4>" + projet[nb].rang_projet+
     "<br><h4>nombre_quartier :</h4>"+projet[nb].nombre_quartier+
     "<br><h4>image1 :</h4>"+projet[nb].image1+"<br><h4>image2 :</h4>"+projet[nb].image3+
     '<a class="btn btn-success" href="'+href+'" role="button"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" onclick="quartierdelete($id)" class="btn btn-danger" role="button" ><i class="far fa-trash-alt"></i></a>');
     infowindow.open(map, marker);
     
     
     }
     })(marker, i));
     
     marker.setMap(map);	
     markers.push(marker);
     
     
     for (var j = 0; j < jsObject1.length; j++) {
     if(jsObject1[j].id_quartier==jsObject[i].id)
     {
     var line1= new google.maps.LatLng(jsObject1[j].lat_1,jsObject1[j].lng_1);
     console.log(line1);
     points.push(line1);
     console.log("hhhhh");
     }
     
     
     }
     
     
     console.log(points);
     var polygoneParcelleHeig = new google.maps.Polygon({
         paths: points,//sommets du polygone
         strokeColor: "#0FF000",//couleur des bords du polygone
         strokeOpacity: 0.8,//opacité des bords du polygone
         strokeWeight: 2,//épaisseur des bords du polygone
         fillColor: "#0FF000",//couleur de remplissage du polygone
         fillOpacity: 0.35////opacité de remplissage du polygone
       });
       line.push(polygoneParcelleHeig);
       //lier le polygone à la carte
       //ceci permet au polygone d'être affiché sur la carte
     
       polygoneParcelleHeig.setMap(map);
        
     
     
     }
     
     }
     
      @endisset
     
     $("button").click(function(){
     
         
         for (var i = 0; i < line.length; i++) {
     line[i].setMap(null);
        
        
     }
     
     line=[];
         for (var i = 0; i < markers.length; i++) {
         markers[i].setMap(null);
        
        
     }
     
     
     line=[];
     markers = [];
     
      $.ajax({
              type:'get',
              dataType: "json",
              url:"{{ route('quartier.tous') }}",
             
              crossDomain: true,
           
       cache: true,
      
              success:function(data){
               var i=0;
              console.log(data);
              
     
     
     do
     {  
     points.length=0; 
     var j=0;
     if(data.length!=0)
     {
     if (data[i].id!=0)
     {
     var line0 = new google.maps.LatLng(data[i].lat_1,data[i].lng_1);
     points.push(line0);
     console.log(data[i].id_projet);
     var infowindow = new google.maps.InfoWindow();
     
     var marker = new google.maps.Marker({
     position : new google.maps.LatLng(data[i].lat,data[i].lng),
     label: "P"+data[i].id_projet.toString(),
     animation: google.maps.Animation.DROP,
     });
     console.log(data[i].lat);
     google.maps.event.addListener(marker, 'click', (function (marker, i) {
     
     
     return function () {
      
       href= '/quartier/update/'+data[i].id_projet+'/'+data[i].id_quartier;
     
  var src1=data[i].image1;
$id=data[i].id;
 
      var  src='{{asset("backend/dist/img/image1.jpg")}}';
     infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
     "<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
     "<br><h4>image1 :</h4><img src="+src+"><br><h4>image2 :</h4>"+data[i].image3+
     '<a class="btn btn-success" href="'+href+'" role="button"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" onclick="quartierdelete($id)" class="btn btn-danger" role="button" ><i class="far fa-trash-alt"></i></a>');
     infowindow.open(map, marker);
     
     
     }
     })(marker, i));
     marker.setMap(map);	
     
     
     markers.push(marker);
     
     
     console.log(data[i].lat_1);
     console.log(data[i].id);
     
     
     
     
     
     
     do
     {
     
     if(i>=1 && data[i-1].id!=0 && data[i]!=0)
     {
     
     if(data[i].id==data[i-1].id)
     {console.log(data[i].id);
     
     
     console.log(data[i].lat_1);
     console.log(data[i].lng_1);
     var line1 = new google.maps.LatLng(data[i].lat_1,data[i].lng_1);
     points.push(line1)
     
     
       data[i-1].id=0;
       
     
     }
     
     }
     i=i+1; 
     
     }
     while(i<data.length && data[i].id==data[i-1].id)
     data[i-1].id=0;
     
     
     
     console.log("***");
     var l=0;
     
     
     
     }
     }
     
     var polygoneParcelleHeig = new google.maps.Polygon({
       paths: points,//sommets du polygone
       strokeColor: "#0FF000",//couleur des bords du polygone
       strokeOpacity: 0.8,//opacité des bords du polygone
       strokeWeight: 2,//épaisseur des bords du polygone
       fillColor: "#0FF000",//couleur de remplissage du polygone
       fillOpacity: 0.35////opacité de remplissage du polygone
     });
     console.log(points);
     
     
     line.push(polygoneParcelleHeig);
     //lier le polygone à la carte
     //ceci permet au polygone d'être affiché sur la carte
     
     polygoneParcelleHeig.setMap(map);
     
     
     j=j+1;
     
     }
     while(i<data.length && data[i].id!=0)
     
             
              
               
              
     
       
     
     
      
     
     
     
     
                
              },
              error:function (errorThrown) {
               alert(errorThrown);
               
                 },
      
      
      
                   
               })   ;
              }) ;
     
     
          $(document).on('change','.dynamic',function(){
        
         
           for (var i = 0; i < line.length; i++) {
     line[i].setMap(null);
          
          
     }
     
     
           for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
          
          
       }
     
     
     
       
            var cat_id=$(this).val();
        console.log(cat_id);
     
       
               $.ajax({
              type:'get',
              dataType: "json",
              url:"{{route('quartier.affiche')}}",
              data:{'id':cat_id},
              crossDomain: true,
           
       cache: true,
      
              success:function(data){
              var i=0;
              console.log(data);
             
          
           
      
     
     do
     {  
     points.length=0; 
     var j=0;
     if(data.length!=0)
     {
     if (data[i].id!=0)
     {
     var line0 = new google.maps.LatLng(data[i].lat_1,data[i].lng_1);
     points.push(line0);
     console.log(data[i].id_projet);
     var infowindow = new google.maps.InfoWindow();
     
     var marker = new google.maps.Marker({
     position : new google.maps.LatLng(data[i].lat,data[i].lng),
     label:"P"+ data[i].id_projet.toString(),
     animation: google.maps.Animation.DROP,
     });
     console.log(data[i].lat);
     google.maps.event.addListener(marker, 'click', (function (marker, i) {
     
     
     return function () {
       $id=data[i].id_quartier;
       href= '/quartier/update/'+data[i].id_projet+'/'+data[i].id_quartier;
     infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
     "<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
     "<br><h4>image1 :</h4>"+data[i].image1+"<br><h4>image2 :</h4>"+data[i].image3+
     '<a class="btn btn-success" href="'+href+'" role="button"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" onclick="quartierdelete($id)" class="btn btn-danger" role="button" ><i class="far fa-trash-alt"></i></a>');
     infowindow.open(map, marker);
     
     
     }
     })(marker, i));
     marker.setMap(map);	
     
     
     markers.push(marker);
     
     
     
     console.log(data[i].lat_1);
     console.log(data[i].id);
     
     
     
     
     
     
     do
     {
     
     if(i>=1 && data[i-1].id!=0 && data[i]!=0)
     {
     
     if(data[i].id==data[i-1].id)
     {console.log(data[i].id);
     
     
     console.log(data[i].lat_1);
     console.log(data[i].lng_1);
     var line1 = new google.maps.LatLng(data[i].lat_1,data[i].lng_1);
     points.push(line1)
     
     
       data[i-1].id=0;
       
     
     }
     
     }
     i=i+1; 
     
     }
     while(i<data.length && data[i].id==data[i-1].id)
     data[i-1].id=0;
     
     
     
     console.log("***");
     var l=0;
     
     
     
     }
     }
     
     var polygoneParcelleHeig = new google.maps.Polygon({
       paths: points,//sommets du polygone
       strokeColor: "#0FF000",//couleur des bords du polygone
       strokeOpacity: 0.8,//opacité des bords du polygone
       strokeWeight: 2,//épaisseur des bords du polygone
       fillColor: "#0FF000",//couleur de remplissage du polygone
       fillOpacity: 0.35////opacité de remplissage du polygone
     });
     console.log(points);
     
     
     line.push(polygoneParcelleHeig);
     //lier le polygone à la carte
     //ceci permet au polygone d'être affiché sur la carte
     
     polygoneParcelleHeig.setMap(map);
     
     
     j=j+1;
     
     }
     while(i<data.length && data[i].id!=0)
     
             
              
               
              
     
       
              
     
     
     
                
              },
              error:function (errorThrown) {
               alert(errorThrown);
               
                 },
      
      
      
                   
               })   ;
              }) ;
              $(document).on('change','.projet',function(){
        
         
         for (var i = 0; i < line.length; i++) {
     line[i].setMap(null);
        
        
     }
     
     
           for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
       }
     
       
       
            var cat_id=$(this).val();
        console.log(cat_id);
     
       
               $.ajax({
              type:'get',
              dataType: "json",
              url:"{{route('quartier.projet')}}",
              data:{'id':cat_id},
              crossDomain: true,
           
       cache: true,
             
              success:function(data){
             
              var i=0;
                console.log(data);
                var k=0;     
               
           
     
     do
     {  
     points.length=0; 
     var j=0;
     if(data.length!=0)
     {
     if (data[i].id!=0)
     {
     var line0 = new google.maps.LatLng(data[i].lat_1,data[i].lng_1);
     points.push(line0);
     console.log(data[i].id_projet);
     var infowindow = new google.maps.InfoWindow();
     
     var marker = new google.maps.Marker({
     position : new google.maps.LatLng(data[i].lat,data[i].lng),
     label:"P"+data[i].id_projet.toString(),
     animation: google.maps.Animation.DROP,
     });
     console.log(data[i].lat);
     google.maps.event.addListener(marker, 'click', (function (marker, i) {
     
     
     return function () {
     href= '/quartier/update/'+data[i].id_projet+'/'+data[i].id_quartier;
     
     $id=data[i].id_quartier;
     
     infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
     "<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
     "<br><h4>image1 :</h4>"+data[i].image1+"<br><h4>image2 :</h4>"+data[i].image3+
     ' <a class="btn btn-success" href="'+href+'" role="button"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" onclick="quartierdelete($id)" class="btn btn-danger" role="button" ><i class="far fa-trash-alt"></i></a>');
     infowindow.open(map, marker);
     
     
     }
     })(marker, i));
     
     
     
     marker.setMap(map);	
     
     
     markers.push(marker);
     
     console.log(i);
     
     
     console.log(data[i].lat_1);
     console.log(data[i].id);
     
     
     
     
     
     
     do
     {
     
     if(i>=1 && data[i-1].id!=0 && data[i]!=0)
     {
     
     if(data[i].id==data[i-1].id)
     {console.log(data[i].id);
     
     console.log(data[i].lat_1);
     console.log(data[i].lng_1);
     var line1 = new google.maps.LatLng(data[i].lat_1,data[i].lng_1);
     points.push(line1)
     
     
       data[i-1].id=0;
       
     
     }
     
     }
     i=i+1; 
     
     }
     while(i<data.length && data[i].id==data[i-1].id)
     data[i-1].id=0;
     
     
     
     console.log("***");
     var l=0;
     
     
     
     }
     }
     
     var polygoneParcelleHeig = new google.maps.Polygon({
       paths: points,//sommets du polygone
       strokeColor: "#0FF000",//couleur des bords du polygone
       strokeOpacity: 0.8,//opacité des bords du polygone
       strokeWeight: 2,//épaisseur des bords du polygone
       fillColor: "#0FF000",//couleur de remplissage du polygone
       fillOpacity: 0.35////opacité de remplissage du polygone
     });
     console.log(points);
     
     
     line.push(polygoneParcelleHeig);
     //lier le polygone à la carte
     //ceci permet au polygone d'être affiché sur la carte
     
     polygoneParcelleHeig.setMap(map);
     
     
     j=j+1;
     
     
     }
     while(i<data.length && data[i].id!=0)
     
             
     
     
       
              
     
     
     
     
     
     
       
            
              },
              error:function (errorThrown) {
               alert(errorThrown);
               
                 },
      
      
      
                   
               })   ;
              }) ;
               
     
     
     });
     
     function  quartierdelete(id) {
     
       if(confirm("Voullez-vous supprimer vraiment ce quartier ?"))
             {
              
               $.ajax({
                 url: "/quartierdelete/"+id,
                 type:'get',
                 data:{
                   _token:$('input[name=_token]').val()
                 },
                 success:function(response){
                  
      
     
     
         for (var i = 0; i < markers.length; i++) {
           if(i==id)
           {
             markers[i].setMap(null);
        
           }
           
     }
     
                 },
                 error:function (errorThrown) {
               alert(errorThrown);
               
                 },
     
                 
               })
             }
     }
     
  </script>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
   
