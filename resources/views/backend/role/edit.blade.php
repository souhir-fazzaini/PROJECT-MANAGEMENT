@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modifier rôle Numéro: {{$role->id}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="{{route('roles.show',['id'=>$role->id])}}"><span class="fas fa-history"></span></a>
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
                
                <div class="container">
                  <div class="row">
                    <div class="col-12">

                      @if (Session::has('success'))
                      <div  class="alert alert-info" role="alert">
                        {{Session::get('success')}}
                       </div>
                      @endif

                        <form action="{{route('role.update',['id'=>$role->id])}}"   method="post">
                          <div>
                            @csrf
                           
                            <div class="form-group">
                              <label for="id">id</label>
                              <input type="text" class="form-control" id="id"  value="{{$role->id}}" readonly >
                            </div>
                               <div class="form-group">
                                 <label for="name">Nom</label>
                                 <input type="text" class="form-control" id="name" name="name" placeholder="nom de rôle" value="{{$role->name}}" required >
                               </div>    
                                    
                           

                              <div class="row">
                                 <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des utilisateurs</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    
                                      @foreach ($utilisateurs as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                      {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                 </div>
                              
                                 <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des rôles</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($rôles as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                       {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                 </div>
                              
                                

                                <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des fonctionnalités</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($fonctionnalités as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}">
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
                              </div>
                           
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des projets</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($projets as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                       {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                 
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
                              
        
                              
                              
                                <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des gouvernorats</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($gouvernorats as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                       {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
                              
        
                              
                                <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des communes</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($communes as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                       {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
                              </div>
                           
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des quartiers </h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($quartiers as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                       {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                 
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
        
                                <div class="col-md-4">
                                  <div class="card card-outline card-info" >
                                    <div class="card-header">
                                      <h3 class="card-title">Gestion des municipalités</h3>
                      
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      @foreach ($municipalités as $permission)
                                 
                                      <input type="checkbox" id="{{$permission['id']}}" name="permission[]" value="{{$permission['id']}}"
                                       {{$rolePermissions->contains($permission->id) ? 'checked' : '' }}>
                                      <label for="{{$permission['id']}}">{{$permission['name']}}</label>
                                      <br>
                                    
                                      @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>   
                                </div>   
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