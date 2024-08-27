function initMap() {
    var uluru = { lat: 36.823475, lng:  10.060678};
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: uluru,
    });
   
    // Define the LatLng coordinates for the polygon's path.
    var ch= "new google.maps.LatLng(45588,12.547) new google.maps.LatLng(45588,12.547),"
    console.log(ch);
    const triangleCoords = [

   ch,
    ];
    // Construct the polygon.
    const bermudaTriangle = new google.maps.Polygon({
      paths: triangleCoords,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
    });
    bermudaTriangle.setMap(map);
  }
  $(document).ready(function(){
  
    $(document).on('change','.dynamic',function(){
      var map;
          
          // variable to hold current active InfoWindow
          var activeInfoWindow ;		
  
    
     var markers = [];
      console.log("heello");
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
  }
  markers = [];
  
       var cat_id=$(this).val();
   console.log(cat_id);
  
  
          $.ajax({
         type:'get',
         dataType: "json",
         url:"affiche_1/",
         data:{'id':cat_id},
         crossDomain: true,
      
  cache: true,
        
         success:function(data){
        
          var uluru = { lat: 36.823475, lng:  10.060678};
           // The map, centered at Uluru
           var map = new google.maps.Map(document.getElementById("map"), {
             zoom: 10,
             center: uluru,
           });
           console.log(data);
           console.log(data.length);
    
         
          
   var coord =new Array(); 
   var k=0;     
 do
 {          
var j=0;
if (data[i].id!=0)
{
  coord[k]=data[i].lat_1;
  k=k+1
  coord[k]=data[i].lng_1;
  console.log(data[i].lat_1);
  console.log(data[i].id);
  
  do
  {

if(i>=1 && data[i-1].id!=0)
{
    if(data[i].id==data[i-1].id)
    {console.log(data[i].id);
k=k+1;
coord[k]=data[i].lat_1;
k=k+1;
coord[k]=data[i].lng_1;
 console.log(data[i].lat_1);
        data[i-1].id=0;
        

    }
  
}
i=i+1; 

  }
    while(i<data.length && data[i].id==data[i-1].id)
data[i-1].id=0;
for(var l=0;l<k;l++)
console.log(coord[l]);

console.log("***");

}
j=j+1;
coord=[];
 }
 while(i<data.length && data[i].id!=0)



           
        },
        error:function (errorThrown) {
            alert(errorThrown);
            
              },

    });
});
  });


