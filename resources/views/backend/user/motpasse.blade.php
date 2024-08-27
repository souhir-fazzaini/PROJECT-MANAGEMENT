@extends('layouts.composants.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="{{route('users.index')}}"><span class="fas fa-history"></span></a>
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
          
          <button type="button" data-toggle="modal" data-target="#myModal">changer mot depasse</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <form  method="get" action="{{route('mot.save',['id'=>auth()->user()->id])}}" >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
        </div>
        <div class="modal-body">
         <input type="text" value="{{auth()->user()->passwword}}" name="password"/>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-info" value="Confirmer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
      
    </div>
  </div>
  
          
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