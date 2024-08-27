@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modifier fonctionnalité numéro: {{$permission->id}}</h1>
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
          

            <div class="card card-primary card-outline">
              
              <div class="card-body">
                
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                        <form action="{{route('permission.update',['id'=>$permission->id])}}"   method="post">
                          <div>
                            @csrf
                           
                            <div class="form-group">
                              <label for="id">Id :</label>
                              <input type="text" class="form-control" id="id"  value="{{$permission->id}}" readonly >
                            </div>
                            <div class="form-group">
                               <label for="name">Name : </label>
                               <input type="text" class="form-control" id="name" name="name" placeholder="nom de fonctionnalité" value="{{$permission->name}}" required >
                            </div> 
                            <div class="form-group">
                                <label for="groupe">Groupe :</label>
                                <input type="text" class="form-control" id="groupe"  value="{{$permission->groupe}}"  >
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