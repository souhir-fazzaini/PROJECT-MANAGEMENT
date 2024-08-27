
       
           <!-- Reference to the Bing Maps SDK -->
           <script type='text/javascript'>
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
    
    
      
    </script>
        <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AlHxWcdPzDYgl3G--u35VRhpYXffBSNAMnNcPjogHOjeA6GYRvS-SfHiQi0-bnCs' async defer></script>
    
        @extends('layouts.composants.main')
    
        @section('content')
        
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
       
      </ul>
    
      <!-- SEARCH FORM -->
    
        <div class="input-group input-group-sm">
         
        </div>
      
            
        
      
    </nav>
    <!-- /.navbar -->
            <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
    
      
    
                <div class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark">Ajouter une quartier</h1>
                        </div><!-
                
                        <div class="card card-primary card-outline">
                          
                          <div class="card-body">
                            <div class="content">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-lg-12">
                                      
                            
                                    <div class="card card-primary card-outline">
                                      
                                      <div class="card-body">
                                      
        <form method="post" action="{{route('quartier.save_1',['id_gv'=>$id_gv,'id'=>$id])}}">
          @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nom quartier</label>
                <input type="text" name="nom_quartier" required >
              </div>
            
               
              <br>
             
            <div class="form-group">
            
              <label class="col-md-4 control-label">nombre des images</label>
              <div class="col-md-4 selectContainer">
    <div class="input-group">
    <span class="glyphicon glyphicon-list"></span>
    <select name="nbr" class="form-control selectpicker image" >
    <option value="0" >0</option>
    <option value="1" >1</option>
    <option value="2" >2</option>
    <option value="3" >3</option>
    <option value="4" >4</option>
    <option value="5" >5</option>
                                    </select>
              </div>
          </div>
          </div>
       
    
            <div id="img" ></div>
                  <label class="col-md-4 control-label">Position</label> 
                  <div id="myMap" style="position:relative;width:600px;height:400px;"></div>
                  <td><div id="map"></div>
                 
                             <div id="limite"></div>
                             <div id="pos"></div>
                            
                  </td>
            </div>
            <div class="col-md-4">
     
              <input type="submit" class="btn btn-info" value="Confirmer">
                <button type="reset" class="btn btn-default" >Annuler</button>
                 
                   
               
            </form>
                                    </div>  
      </div><!-- /.container-fluid --> </div>
    </div>
    <!-- /.content -->
    </div>
     
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div> 
      
    </div>
        
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
      </div>
       
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div> 
        
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
    </aside>
    {{csrf_field()}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script type="text/javascript" src="{{asset('js/create_google.js')}}"></script>
    <!-- Control Sidebar -->
    
    <!-- /.control-sidebar -->
    @endsection