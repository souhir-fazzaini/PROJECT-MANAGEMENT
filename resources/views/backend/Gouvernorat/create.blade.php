@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter gouvernorat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="{{route('gouvernorat.index')}}"><span class="fas fa-history"></span></a>
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
                <form action="{{route('gouvernorat.store')}}"   method="post">
                  @csrf
                
                  
                  <div class="form-group">
                    <label for="nom_gouvernorat_fr">Nom gouvernorat en Français :</label>
                    <input type="text" class="form-control" name="nom_gouvernorat_fr" placeholder="le nom du gouvernorat en français">
                  </div>
                  <div class="form-group">
                    <label for="nom_gouvernorat_ar">Nom gouvernorat en Arabe :</label>
                    <input type="text" class="form-control" name="nom_gouvernorat_ar" placeholder="le nom du gouvernorat en arabe">
                  </div>
                  
                 
          
                  <button type="submit" class="btn btn-info">Confirmer</button>
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