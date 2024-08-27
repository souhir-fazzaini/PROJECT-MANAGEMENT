@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter municipalite</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="{{route('municipalite.index')}}"><span class="fas fa-history"></span></a>
            </div>
          </div><!-- /.col -->
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
                @if ($errors->any())
                <div class="alert" style="background-color: #db8d8d;" role="alert" >
              
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
                <form action="{{route('municipalite.store')}}"   method="post">
                  @csrf
                
                  
                  <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Nom Municipalite en Francais</label>
                    <input type="text" class="form-control" name="nom_municipalite_fr" placeholder="le nom de la municipalite en Français"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Nom Municipalite en Arabe</label>
                    <input type="text" class="form-control" name="nom_municipalite_ar" placeholder="le nom de la municipalite en Arabe" >
                  </div>
                  <label class="col-md-4 control-label">Gouvernorat</label> 
                  <div class="form-group" >
                  <select name="id_gouvernorat" id="gouvernorat" class="gouvernorat" class="form-control selectpicker" data-dependent="gouvernorat" >
                  <option value="" class="form-control" >Gouvernorat</option>
                  @foreach($gouvernorats as $gouvernorat)
                  <option value='{{$gouvernorat->id}}' class="form-control" >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                  @endforeach
                  </select>
                  </div>
                  
                  <label class="col-md-4 control-label">Commune</label> 
                  <div class="form-group" >
                  
                  <select style="width: 200px" class="dynamic_1" id="dynamic_1" name="id_commune">
                  
                  <option value="0" disabled="true" selected="true" class="dynamic_1" id="dynamic_1">Commune</option>
                  </select>
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{asset('js/create_municipalite.js')}}">
   
    </script>
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