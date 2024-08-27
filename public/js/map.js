var map, drawingManager, outputPanel, outputPanel2;
function GetMap() {
 outputPanel = document.getElementById('pos');

outputPanel2 = document.getElementById('limite');

map = new Microsoft.Maps.Map('#myMap',{ center: new Microsoft.Maps.Location(36.8189700, 10.165790)});


//Load the DrawingTools module
Microsoft.Maps.loadModule('Microsoft.Maps.DrawingTools', function () {
 //Create an instance of the DrawingTools class and bind it to the map.
 var tools = new Microsoft.Maps.DrawingTools(map);
 //Show the drawing toolbar and enable editting on the map.
 tools.showDrawingManager(function (manager) {
     //Store a reference to the drawing manager as it will be useful later.
     drawingManager = manager;
    
     Microsoft.Maps.Events.addHandler(drawingManager, 'drawingChanging', measureShape);
     Microsoft.Maps.Events.addHandler(drawingManager, 'drawingStarted', measureShape);
 })
});
}
  function measureShape(shape) {
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
          outputPanel2.innerHTML = html;
      }

  }
 
  $(document).ready(function(){
  
   
      $(document).on('change', '.projet', function () {
          var id_projet = $(this).val(); 
          console.log(id_projet);
          $.ajax({
              type: 'get',
              
              url:'nom_gouvernorat/' ,
              dataType: "json",
              data: { 'id': id_projet },
              success: function (data) {
                  //console.log('success');
                  console.log(data);
                  i=0;
                  document.getElementById('gouvernorat').innerHTML = data[i].nom_gouvernorat_fr;
  
              },
  
              error:function (errorThrown) {
                  console.log(errorThrown);
                 
                  
                    },
  
  
  
  
  
  
          })
  
      })
  })