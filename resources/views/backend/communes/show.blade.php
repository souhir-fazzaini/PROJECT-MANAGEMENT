
@extends('layouts.composants.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des communes</h1>
          </div><!-- /.col -->
          <!-- /.col -->
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
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                      <form method="get" action="/commune/search">

                      <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                          aria-describedby="search-addon" name="search" />
                        <span class="input-group-text " id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                      </div>
                    </div>
                  </form>
                    
                  </div><br>
                  <div class="row">
                    @if (Session::has('success'))
                    <div class="alert" style="background-color: #e3f2fd;" role="alert" >
                      {{Session::get('success')}}
                     </div>
                    @endif
                    <div class="col-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom commune en Français</th>
                            <th scope="col">Nom commune en Arabe</th>
                            <th scope="col">action
                              <div class=" float-sm-right">
                                <a class="btn btn-info" href="{{route('commune.create')}}"><span class="fas fa-plus-square"></span></a>
                               </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($communes as $commune)
                            
                            <tr>
                              <tr id="del{{$commune->id}}">
                              <td>{{$commune->id}}</td>
                              <td>{{$commune->nom_commune_fr}}</td>
                              <td>{{$commune->nom_commune_ar}}</td>

                              
                              <td>

                                <a class="btn btn-success" href="{{route('commune.edit',['id'=>$commune->id])}}" role="button"><i class="fas fa-edit"></i></a>


                                <a href="javascript:void(0)" onclick="communedelete({{ $commune->id }})" class="btn btn-danger" role="button" ><i class="far fa-trash-alt"></i></a>                              </td>

                              </td>
                            </tr>
                            @endforeach
                       
                        </tbody>
                      </table>
                      
                      
              <span>
                <div class="d-flex justify-content-center">
                  {!! $communes->links() !!}
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  </div>
  <!-- /.content-wrapper -->
<script>
 function  communedelete(id) {

if(confirm("Voullez-vous supprimer vraiment cette commune ?"))
      {
       
        $.ajax({
          url: "/communedelete/"+id,
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
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <script>
 

   /* function communedelete(id)
{
if (confirm("do you really want todelte this"))
{

$.ajax(
{
  url:id,
  type:"get",
  data:{
    _token:$("input[name=_token]").val()



  },
  success:function(response)
  {
    $("#sid"+id).remove();
  }
  


});
}
else
{
alert("hello");
}

}/*
</script>
  
  <!-- delete modal -->
  

    <!-- /.delete modal -->
@endsection