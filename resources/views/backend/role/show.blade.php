@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter rôle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
                <a class="btn btn-info" href="{{route('roles.index')}}"><span class="fas fa-history"></span></a>
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
                <div class=" float-sm-right">
                    <a class="btn btn-success" href="{{route('roles.edit',['id'=>$role->id])}}" role="button"><i class="fas fa-edit"></i></a>
                </div>
                <ul id="treeview1">
                    <li><a href="#">{{ $role->name }}</a>
                        <ul>
                            @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                            <li>{{ $v->name }}</li>
                            @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
          
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