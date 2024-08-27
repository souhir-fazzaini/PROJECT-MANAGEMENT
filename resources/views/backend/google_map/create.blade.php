       
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Reference to the Bing Maps SDK -->
<script type="text/javascript" src="{{asset('js/map.js ')}}">

</script>
<script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AlHxWcdPzDYgl3G--u35VRhpYXffBSNAMnNcPjogHOjeA6GYRvS-SfHiQi0-bnCs' async defer></script>



@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter quartier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
   
    <!-- /.content-header -->
      

    
          <div class="col-lg-12">
         
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
          

            <div class="card card-primary card-outline">
              
              <div class="card-body">
                @if ($errors->any())
                <div class="alert" style="background-color: #db8d8d;" role="alert" >
              
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
                 
                <form action="{{route('quartier.store')}}"   method="post">
                  @csrf
                  <div class="form-group">
                 
                      <label for="nom_commune_fr">Saisir le nom du quartier</label>
                      <input type="text" class="form-control" name="nom" placeholder=" le nom du quartier">
                    </div>
                   
                 
                  <div class="form-group">
                    <?php if(!isset($id,$id_gv))
 {
?>

<div class="form-group">
 
<label class="col-md-4 control-label">Saisir le numéro du projet</label> 
<br>
<select name="projet" id="projet" class="projet" class="form-control selectpicker" >
 <div class="col-md-4 inputGroupContainer">
 <option value="" class="form-control" >Projet</option>
@foreach($projet as $p)
<option value='{{$p->id}}' class="form-control" >{{$p->rang_projet}}</option>
@endforeach

</select>

                  </div>
                  <div class="form-group">
                    <label class="col-md-4 control-label">Gouvernorat</label> 
<div id="gouvernorat"></div>
<br>

<?php  }?>

  
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">image</label>
  <br>
  
  <input type="file" name="image" style="color:rgb(138, 164, 190); border-color:rgb(10, 14, 4); " size="100" >

</div>
  
     <label class="col-md-4 control-label">Position</label> 
     <div id="myMap" style="position:relative;width:600px;height:400px;"></div>
     <td><div id="map"></div>
    
                <div id="limite"></div>
                <div id="pos"></div>
               
     </td>

                  </div>
                
                 
          
                  <input type="submit" class="btn btn-info" value="Confirmer">
                  <button  TYPE="reset"  name="cancel" class="btn btn-default" value="1">Annuler</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- /.control-sidebar -->
@endsection