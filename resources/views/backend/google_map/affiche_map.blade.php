@extends('layouts.composants.main')

@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="{{ asset('css/map1.css')}}">
    <script>

initmap();
    /*  function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 36.8189700, lng: 10.165790 },
          zoom: 8,
        });
      }*/
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
     

           <script>
             var nbr,id 
             @isset($id_gv)
             id='<?php echo $id ;?>'
             console.log(id);
            @foreach ($projet as $p)
              @if ($p->id==$id)
                nbr='<?php echo $p->nombre_quartier ;?>'
              @endif
            @endforeach
          
             console.log(nbr);
             @endisset

               </script>
           
      
         <li class='breadcrumb-item'><a class='btn btn-success' ><span class='fas fa-plus-square'></span></a></li>
           
               <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
         
     
      $(document).ready(function(){
        $("li a").click(function(){
          console.log(nbr);
          if(nbr==3)
          alert("impossible d'ajouter une quartier");
          else
          {
        @if (isset($id_gv))
        window.location = "{{route('quartier.create_1',['id_gv'=>$id_gv,'id'=>$id])}}";  

        @else
          
        

         
          window.location = "{{route('quartier.create')}}";  
          @endif

          }
        })

      })
 
      
       </script>
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
    <div id="map"></div>
    <div id="floating-panel" class="list-inline">
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
  
  </div>
  </div>
  
   
     
   
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAHY_ywZ1yIevnGptX-i6KpETLiU-Yoe0&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script>
      const jsObject = JSON.parse(`<?= json_encode($quartier) ?>`)
        console.log(jsObject) // Object { 1: "one", 2: "two", 3: "three" }
    
    
        const jsObject1 = JSON.parse(`<?= json_encode($limite_q) ?>`)
        console.log(jsObject1) //
          var map;
      
            
            // variable to hold current active InfoWindow
            var activeInfoWindow ;		
    
     
       var markers = [];
       var polygone = [];
$(document).ready(function(){
    var mapProp = {
        center: new google.maps.LatLng(36.8189700, 10.165790),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var map = new google.maps.Map(document.getElementById('map'), mapProp);
    var line = new Array();
  
  var points = new Array();
  
@isset($id)
var id = '<?php echo $id; ?>';
for (var i = 0; i < jsObject.length; i++) {
if(jsObject[i].id_projet==id)
{
var marker =   new google.maps.Marker({
position: new google.maps.LatLng(jsObject[i].lat,jsObject[i].lng),
map,
title: "Hello World!",
label: jsObject[i].id_projet.toString(),

})
google.maps.event.addListener(marker, 'click', (function (marker, i) {


return function () {
  href= '/quartier/update/'+jsObject[i]+jsObject[i];
infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
"<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
"<br><h4>image1 :</h4>"+data[i].image1+"<br><h4>image2 :</h4>"+data[i].image3+
'<br><a class="btn btn-danger" role="button"  onclick="quartierdelete($id)"   data-toggle="modal" data-target="#delete">delete</a><br><a class="btn btn-success" href="'+href+'" role="button">modifier</a>');
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
      for(var i=0;i<data.length;i++)
      {
        
        for(var j=0;j<data.length;j++)
      {
if(data[j].id==data[j].id
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
  href= '/quartier/update/'+data[i].id_projet+data[i].id_quartier;
infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
"<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
"<br><h4>image1 :</h4>"+data[i].image1+"<br><h4>image2 :</h4>"+data[i].image3+
'<br><a class="btn btn-danger" role="button"  onclick="quartierdelete($id)"   data-toggle="modal" data-target="#delete">delete</a><br><a class="btn btn-success" href="'+href+'" role="button">modifier</a>');
infowindow.open(map, marker);


}
})(marker, i));
marker.setMap(map);	


markers.push(marker);









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

        
      }
          
         

  
      }

 




           
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
         var coord =new Array(); 
     
      
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
label:"P"+ data[i].id_projet.toString(),
animation: google.maps.Animation.DROP,
});
console.log(data[i].lat);
google.maps.event.addListener(marker, 'click', (function (marker, i) {


return function () {
 
  href= '/quartier/update/'+data[i].id_projet+'/'+data[i].id_quartier;
infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
"<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
"<br><h4>image1 :</h4>"+data[i].image1+"<br><h4>image2 :</h4>"+data[i].image3+
'<br><a class="btn btn-danger" role="button"  onclick="quartierdelete($id)"   data-toggle="modal" data-target="#delete">delete</a><br><a class="btn btn-success" href="'+href+'" role="button">modifier</a>');
infowindow.open(map, marker);


}
})(marker, i));
marker.setMap(map);	


markers.push(marker);


coord[k]=data[i].lat_1;
k=k+1
coord[k]=data[i].lng_1;
console.log(data[i].lat_1);
console.log(data[i].id);






do
{

if(i>=1 && data[i-1].id!=0 && data[i]!=0)
{

if(data[i].id==data[i-1].id)
{console.log(data[i].id);
k=k+1;
coord[k]=data[i].lat_1;
k=k+1;
coord[k]=data[i].lng_1;
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
coord=[];

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
           var coord =new Array(); 
      

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
console.log(href);
$id=data[i].id_quartier;
console.log(id);
infowindow.setContent("<h4>Rang projet:</h4>" + data[i].rang_projet+
"<br><h4>nombre_quartier :</h4>"+data[i].nombre_quartier+
"<br><h4>image1 :</h4>"+data[i].image1+"<br><h4>image2 :</h4>"+data[i].image3+
'<br><a class="btn btn-danger" role="button"  onclick="quartierdelete($id)"   data-toggle="modal" data-target="#delete">delete</a><br><a class="btn btn-success" href="'+href+'" role="button">modifier</a>');
infowindow.open(map, marker);


}
})(marker, i));



marker.setMap(map);	


markers.push(marker);

console.log(i);
coord[k]=data[i].lat_1;
k=k+1
coord[k]=data[i].lng_1;
console.log(data[i].lat_1);
console.log(data[i].id);






do
{

if(i>=1 && data[i-1].id!=0 && data[i]!=0)
{

if(data[i].id==data[i-1].id)
{console.log(data[i].id);
k=k+1;
coord[k]=data[i].lat_1;
k=k+1;
coord[k]=data[i].lng_1;
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
coord=[];

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

  alert(id);
  console.log(id);
  
}


     </script>