



@extends('layouts.composants.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
        
            <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0 text-dark">Modifier commune</h2>
            </div>
                <div class="col-sm-6">
                  <div class=" float-sm-right">
                    <a class="btn btn-info" href="{{route('commune.index')}}"><span class="fas fa-history"></span></a>
                  </div>
                </div><!
            
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
          
        
            <div class="card card-primary card-outline">
              @if ($errors->any())
              <div class="alert" style="background-color: #db8d8d;" role="alert" >
            
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
              <div class="card-body">
                <div class="mb-3">
                    <form method="post" action="{{route('commune.update')}}">
                      @csrf
                    <label for="exampleFormControlInput1" >id</label>
                    <input type="text" name="id" class="form-control"  value="{{$commune['id']}}" readonly  >
                  </div>
                  <label class="col-md-4 control-label">Gouvernorat</label> 
                  <div class="form-group"> 
                
                    <select name="id_gouvernorat" id="gouvernorat" class="gouvernorat" class="form-control selectpicker" data-dependent="gouvernorat" >
                      <div class="col-md-4 inputGroupContainer">
                        <option value='{{$id_gouvernorat}}'  class="form-control" >{{$gouvernorat1}}</option>
                @foreach($gouvernorats as $gouvernorat)
                  <option value='{{$gouvernorat->id}}'  class="form-control" >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                  @endforeach
                      </div>
                  </select>
                  </div>
                    
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom commune en Arabe</label>
                    <input type="text" name="nom_commune_fr" class="form-control"  value="{{$commune['nom_commune_fr']}}"  >
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom commune en Arabe</label>
                    <input type="text" name="nom_commune_ar" class="form-control" value="{{$commune['nom_commune_ar']}}" >
                  </div>

                  
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









