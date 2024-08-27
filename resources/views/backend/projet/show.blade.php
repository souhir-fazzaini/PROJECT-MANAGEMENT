@extends('layouts.composants.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des projets</h1>
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
            
          
          
            <div class="card card-primary card-outline">
             
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                      <form method="get" action="/projet/search/">

                      <div class="input-group rounded">

                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                          aria-describedby="search-addon"  name="search"/>
                        <span class="input-group-text " id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                      </div>
                    </div>
                  </form>
                    
                  </div><br>
                    
                  
                  
                  
                
                      @if (Session::has('success'))
                      <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                       </div>
                      @endif
                    

                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">rang projet</th>
                            <th scope="col">nombre_quartier</th>
                            <th scope="col">nombre_maison</th>
                            <th scope="col">nombre_habitant</th>
                            <th scope="col">assainissement_cout</th>
                            <th scope="col">action
                               <div class=" float-sm-right">
                                <a class="btn btn-info" href="{{route('projet.create')}}"><span class="fas fa-plus-square"></span></a>
                               </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($projets as $projet)
                          <tr>
                             
                            <td>{{$projet->rang_projet}}</td>
                            <td>{{$projet->nombre_quartier}}</td>
                            <td>{{$projet->nombre_maison}}</td>
                            <td>{{$projet->nombre_habitant}}</td>
                            <td>{{$projet->assainissement_cout}}</td>

                              <td> 
                                <a class="btn btn-success" href="{{route('projet.edit',['id'=>$projet->id])}}" role="button"><i class="fas fa-edit"></i></a>

                                <a class="btn btn-danger" href="#delete" role="button" onclick="projetdelete({{$projet->id}})"   data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i></a> 
                              </td>
                            </tr>
                            @endforeach
                       
                        </tbody>
                      </table>
                           
              <span>
                <div class="d-flex justify-content-center">
                  {!! $projets->links() !!}
              </div>
             </span>
             <style>
                 .w-5
                 {
                     display: 
                     none;
                 }
             </style>
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

  
  <!-- delete modal -->
  <script>

function  projetdelete(id) {

if(confirm("Voullez-vous supprimer vraiment ce projet?"))
      {
       
        $.ajax({
          url: "/projetdelete/"+id,
          type:'get',
          data:{
            _token:$('input[name=_token]').val()
          },
          success:function(response){
            $('#del'+id).remove();

          }
          
        })
      }
}
   
    
    
         </script>

    <!-- /.delete modal -->
@endsection