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
                
                <form action="{{route('user.store')}}"   method="post">
                  @csrf
                  <div class="form-group">
                    Choisir le role de l'utilisateur: <br>
                    <select id="role" name="role" required >
                      @foreach ($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach          
                    </select> <br>
                    <a href="#">créer un nouveau role</a><br>
                    
                  </div>
                  <div class="form-group">
                    Donner l'accés au gouvernorat : <br>
                    <select id="id_gouvernorat" name="id_gouvernorat" >
                      @foreach ($gouvernorats as $gouvernorat)
                      <option value="{{$gouvernorat->id}}"
                        @if ($all_gouvernorats->id == $gouvernorat->id) selected   @endif>
                        {{$gouvernorat->nom_gouvernorat_fr}}</option>
                      @endforeach          
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="le nom de nouveau utilisateur">
                  </div>
                  <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="l'email de nouveau utilisateur">
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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