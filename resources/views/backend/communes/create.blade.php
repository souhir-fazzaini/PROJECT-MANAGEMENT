@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter commune</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
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
                 
                <form action="{{route('commune.store')}}"   method="post">
                  @csrf
                  <div class="form-group">
                    Choisir le Gouvernorat: <br>
                    <select name="id_gouvernorat" id="gouvernorat" class="gouvernorat" class="form-control selectpicker" data-dependent="gouvernorat" >
                      <option value="" class="form-control" >Gouvernorat</option>
                      @foreach($gouvernorats as $gouvernorat)
                      <option value='{{$gouvernorat->id}}' class="form-control" >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                      @endforeach
                      </select> <br>
                   
                  </div>
                  <div class="form-group">
                    <label for="nom_commune_fr">Saisir le nom de la commune en Français</label>
                    <input type="text" class="form-control" name="nom_commune_fr" placeholder="le nom de la commune en français">
                  </div>
                  <div class="form-group">
                    <label for="nom_commune_ar">Saisir le nom de la commune en Arabe</label>
                    <input type="text" class="form-control" name="nom_commune_ar"placeholder="le nom de la commune en arabe">
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