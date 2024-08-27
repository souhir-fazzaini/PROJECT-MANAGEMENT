@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modifier utilisateur Numéro: {{$user->id}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="#"><span class="fas fa-history"></span></a>
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
                   @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif

            <div class="card card-primary card-outline">
              
              <div class="card-body">
                
                <div class="container">
                  <div class="row">
                    <div class="col-12">

                        <form action="{{route('user.update',['id'=>$user->id])}}"   method="post">
                          <div>
                            @csrf
                           
                            <div class="form-group">
                              <label for="id">id</label>
                              <input type="text" class="form-control" id="id"  value="{{$user->id}}" readonly >
                            </div>
                            <div class="form-group">
                               <label for="name">Nom de l'utilisateur : </label>
                               <input type="text" class="form-control" id="name" name="name" placeholder="nom de l'utilisateur" value="{{$user->name}}"  >
                            </div>  
                            <div class="form-group">
                                <label for="id_gouvernorat">gouvernorat : </label>
                                <select id="id_gouvernorat" name="id_gouvernorat"  > 
                                  @foreach ($gouvernorats as $gouvernorat)
                                  <option value="{{$gouvernorat->id}}"  @if ($userGouvernorat->contains($gouvernorat->id)) selected   @endif> {{$gouvernorat->nom_gouvernorat_fr}}</option>
                                  @endforeach          
                                </select>
                              </div> 
                            <div class="form-group"> 
                              <label for="role">Rôle : </label>
                                <select id="role" name="role"  > 
                                  @foreach ($roles as $role)
                                  <option value="{{$role->id}}"  @if ($userRole->contains($role->id)) selected   @endif> {{$role->name}}</option>
                                  @endforeach          
                                </select>
                              </div>  
                                    
                            
                
                                      
                              <button type="submit" class="btn btn-info">Confirmer</button>
                              <button  TYPE="reset"  name="cancel" class="btn btn-default" value="1">Annuler</button>
                         </div>
                        </div>
                        </form>
                        
                    </div>
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