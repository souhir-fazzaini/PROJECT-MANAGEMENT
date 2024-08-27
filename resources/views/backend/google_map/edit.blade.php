

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>var id_quartier = '<?php echo $id1; ?>';
const jsObject = JSON.parse(`<?= json_encode($quartier) ?>`)
        
      
      
        const jsObject1 = JSON.parse(`<?= json_encode($limite_q) ?>`)
        

     

</script>
<script type="text/javascript" src="{{asset('js/update_map.js')}}">
   
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


@extends('layouts.composants.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modifier quartier Numéro : {{$id1}}</h1>
          </div><!-- /.col -->
        <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
         
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
          
           
            <div class="card card-primary card-outline">
              
              <div class="card-body">
                <div class="mb-3">
                  @if ($errors->any())
                  <div class="alert" style="background-color: #db8d8d;" role="alert" >
                
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <form method="post" action="{{route('quartier.update',['id1'=>$id1])}}" enctype="multipart/form-data">
                      @csrf

                  
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Rang projet</label>
                    <input type="text" name="id" class="form-control" value="{{$data['rang_projet']}}" readonly >
                  </div>
                  <div class="form-group">
                    <label for="nom_commune_fr">Nom du quartier</label>
                    <input type="text" class="form-control" name="nom"  value="{{$quartier1['nom']}}" placeholder=" le nom du quartier">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">image</label>
                    <br>
                    <img src="http://127.0.0.1:8000/{{$quartier1['image']}}" class="rounded float-start" alt="...">
                    <br>
                    <input type="file" value="{{$quartier1['image']}}" name="image" style="color:rgb(138, 164, 190); border-color:rgb(10, 14, 4); " size="100" >

                  </div>
                 
<br>

<script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AlHxWcdPzDYgl3G--u35VRhpYXffBSNAMnNcPjogHOjeA6GYRvS-SfHiQi0-bnCs' async defer></script>

  <div id="img" ></div>
        <label class="col-md-4 control-label">Position</label> 
        <div id="myMap" style="position:relative;width:600px;height:400px;"></div>
        <td><div id="map"></div>
       
                   <div id="limite"></div>
                   <div id="pos"></div>
                   <div id="num"><div>
                  
        </td>
  </div>
  <div class="col-md-4">
 <input type="button" value="Get Shapes" onclick="getShapes()"/>
 <input type="submit" class="btn btn-info" value="Confirmer">

    <button type="reset" class="btn btn-default" >Annuler</button>
     
       
   
   
                </form>
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
  <!-- /.content-wrapper -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <!-- /.control-sidebar -->
@endsection









