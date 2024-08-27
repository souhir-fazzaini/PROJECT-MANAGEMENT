
  $tableau = new Array();
  $tableau1 = new Array();

  
  console.log(id_quartier);
  var i;
  
       var id1; 
       var k=0;
  
  
    for (var j = 0; j < jsObject1.length; j++) {
      if(id_quartier==jsObject1[j].id_quartier)
      {
    $tableau[k]=jsObject1[j].lat_1;
    $tableau1[k]=jsObject1[j].lng_1;
    k=k+1;
  
    
      }
  
    }
  console.log($tableau);
    for (var j = 0; j < $tableau.length; j++) {
      console.log("hhhhh");
      console.log($tableau[j]);
  var line1= new google.maps.LatLng($tableau[j],$tableau1[j]);
  console.log(line1);
  
  
  }
  
  
  
          
  
  
  
  



  var map, drawingManager, outputPanel;
  var layer = new Array();
  var num;
  function GetMap() {
   outputPanel = document.getElementById('pos');
 
outputPanel2 = document.getElementById('limite');
num = document.getElementById('num');
    map = new Microsoft.Maps.Map('#myMap', 
      {center: new Microsoft.Maps.Location(36.8189700, 10.165790)}
        );
    
        rings = new Array();
        for (var j = 0; j < $tableau.length; j++) {
        var line0 =new Microsoft.Maps.Location($tableau[j], $tableau1[j]);
rings.push(line0);
        }
       
        //Create a complex polygon
        var polygon = new Microsoft.Maps.Polygon(rings, {
            fillColor: new Microsoft.Maps.Color(150, 0, 255, 0),
            strokeColor: new Microsoft.Maps.Color(150, 0, 0, 255)
        });
        map.entities.push(polygon);

        
  //Load the DrawingTools module
Microsoft.Maps.loadModule('Microsoft.Maps.DrawingTools', function () {
  
   //Create an instance of the DrawingTools class and bind it to the map.
   var tools = new Microsoft.Maps.DrawingTools(map);
   //Show the drawing toolbar and enable editting on the map.
   tools.showDrawingManager(function (manager) {
       //Store a reference to the drawing manager as it will be useful later.
       drawingManager = manager;
       
                Microsoft.Maps.Events.addHandler(polygon, 'click', function () {
                  num=1;
            //Remove the polygon from the map as the drawing tools will display it in the drawing layer.
            map.entities.remove(polygon);
            
            //Pass the polygon to the drawing tools to be edited.
            tools.edit(polygon);
           
layer.push(polygon);
               

     


            });
     
   })



        
        
          });  
    
       
}
function getShapes() {
  var shape = layer[0];
  if (shape instanceof Microsoft.Maps.Pushpin) {
          html="coords : ";
          html=html+"<input type='number' name='pinlat' readonly value='"+shape.getLocation().latitude+"'> / ";
    html=html+"<input type='number' name='pinlon' readonly value='"+shape.getLocation().longitude+"'>";
            outputPanel.innerHTML = 'Shape: Pushpin<br/>' +html;
        }
        if (shape instanceof Microsoft.Maps.Polygon && shape.getLocations().length > 3) {
         
            
            var locs = shape.getLocations();
var html="<br/> coords : <br/>";
//Loop through and display every coordinate in the drawing area
var j=0;
for (i = locs.length - 2; i >= 0; i--) {

    html=html+"<input type='number' name='polylat"+j+"' readonly value='"+locs[i].latitude+"'> / ";
    html=html+"<input type='number' name='polylon"+j+"' readonly value='"+locs[i].longitude+"'><br/>";
    j++;
}
html=html+"nombre des points :<input type='number' name='coordsnum' readonly value='"+j+"'><br/>";
html=html+"<input type='hidden' name='num' readonly value='"+num+"'><br/>";
            outputPanel2.innerHTML = html;
        }
      
     
      

      
        

        
    }






