@extends('layouts.composants.main')

@section('content')

  <!-- SEARCH FORM -->
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
     
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h4 class="m-0 text-dark">Ajouter une municipalite</h4>
              </div><!-- /.col -->
         
            </div><!-- /.row -->
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
                 
                
                
                <div class="container">
                  <div class="row">
                  
                    <form method="post" action="{{route('municipalite.save')}}">
                      @csrf
                    
                    </div>
                    
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom Municipalite en Francais</label>
                    <input type="text" name="nom_municipalite_fr"  >
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom Municipalite en Arabe</label>
                    <input type="text" name="nom_municipalite_ar"  >
                    </div>
                    <div class="mb-3">
                    <label class="col-md-4 control-label">Gouvernorat</label> 
                    <div class="form-group" >
                    <select name="id_gouvernorat" id="gouvernorat" class="gouvernorat" class="form-control selectpicker" data-dependent="gouvernorat" >
                    <option value="" class="form-control" >Gouvernorat</option>
                    @foreach($gouvernorats as $gouvernorat)
                    <option value='{{$gouvernorat->id}}' class="form-control" >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                    @endforeach
                    </select>
                    </div>
                    
                    <label class="col-md-4 control-label">Commune</label> 
                    <div class="form-group" >
                    
                    <select style="width: 200px" class="dynamic_1" id="dynamic_1" name="id_commune">
                    
                    <option value="0" disabled="true" selected="true" class="dynamic_1" id="dynamic_1">Commune</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <input type="submit" class="btn btn-info" value="Confirmer">
                    <button type="reset" class="btn btn-default" >Annuler</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
               

                
          
              </div>
            </div>
          </div>
        
        </div>
       
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{asset('js/create_municipalite.js')}}">
   
    </script>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  @endsection