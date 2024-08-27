@extends('layouts.composants.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ajouter projet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="{{route('projet.index')}}"><span class="fas fa-history"></span></a>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
              <form  action="{{route('projet.store')}}" method="post" >
                @csrf
              <div class="form-group">
              <label class="col-md-4 control-label">Rang projet</label>  
            
              
              <input name="rang_projet" type="text" placeholder="nombre quartier" class="form-control">
            
              </div>
             
                  
                            <!-- Select Basic -->
                            <label class="col-md-4 control-label">Gouvernorat</label> 
                            <div class="form-group"> 
                          
                              <select name="gouvernorat" id="gouvernorat" class="dynamic" class="form-control selectpicker" data-dependent="gouvernorat" >
                                <div class="col-md-4 inputGroupContainer">
                                <option value="" class="form-control" >Gouvernorat</option>
                          @foreach($gouvernaux as $gouvernorat)
                            <option value='{{$gouvernorat->id}}' class="form-control" >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                            @endforeach
                                </div>
                            </select>
                            </div>
                            <label class="col-md-4 control-label">Commune</label> 
                            <div class="form-group" >
                            
                              <select style="width: 200px" class="dynamic_1" id="commune" name="commune">
                            
                                <option value="0" disabled="true" selected="true" class="dynamic_1" id="dynamic_1">Commune</option>
                             

                              </select>
                            </div>
                            <label class="col-md-4 control-label">Municipalite</label> 
                            <div class="form-group" >
                             
                              <select style="width: 200px" class="dynamic_2" id="dynamic_2" name="municipalite">
                            
                                <option value="0" disabled="true" selected="true" class="dynamic_2" id="dynamic_2">Municipalite</option>
                              </select>
                           
                            
                            <div class="form-group">
                            <label class="col-md-4 control-label">nombre maison</label>  
                            
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="m" type="number" placeholder="nombre maison" class="form-control" >
                            
                            </div>
                            
                            <div class="form-group">
                            <label class="col-md-4 control-label">nombre habitant</label>  
                            
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="h" type="number" placeholder="nombre habitant" class="form-control" >
                            
                            </div>
                            
                            <div class="form-group">
                            <label class="col-md-4 control-label">assainissement cout</label>  
                            
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                            <input  name="c" type="number" placeholder="assainissement cout" class="form-control" >
                          
                            </div>
                            
                            <div class="form-group">
                            <label class="col-md-4 control-label">superficie quartier</label>  
                         
                            <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                            <input  name="superficie_quartier" type="number" placeholder="superficie quartier" class="form-control" >
                        
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">rapport superificie</label>  
                      
                            <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                            <input name="rapport_superificie" type="number" placeholder="rapport superificie" class="form-control" >
                           
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">taux habitation</label>  
                          
                            <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                            <input name="taux_habitation" type="number" placeholder="taux habitation" class="form-control" >
                           
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">superficie quartier couvert</label>  
                         
                            <span class="input-group-addon"><i class="glyphicon glyphicon-fullscreen"></i></span>
                            <input name="superficie_quartier_couvert" type="number" placeholder="superficie quartier couvert" class="form-control" >
                          
                            
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">taux habitation</label>  
                            
                            <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                            <input name="taux_habitation" type="number" placeholder="taux habitation" class="form-control" >
                            </div>
                            
                            <div class="form-group">
                            <label class="col-md-4 control-label">rapport depense maison</label>  
                           
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="rapport_depense_maison" type="number" placeholder="rapport depense maison" class="form-control" >
                           
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">composante projet</label>
                           
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                  <textarea class="form-control" name="comment"style="margin:0" placeholder="composante projet"></textarea>
                            
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label">assainissement qte</label>  
                         
                              <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                              <input name="assainissement_qte" type="number" placeholder="assainissement qte" class="form-control" >
                             
                              </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">assainissement taux</label>  
                            
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                <input name="assainissement_taux" type="number" placeholder="assainissement taux" class="form-control" >
                               
                            </div>
                              <div class="form-group">
                              <label class="col-md-4 control-label">assainissement_qte</label>  
                          
                              <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                              <input name="assainissement_qte" type="number" placeholder="assainissement_qte" class="form-control" >
                              
                              </div>
                              <div class="form-group">
                              <label class="col-md-4 control-label">eclairage public qte</label>  
                             
                              <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                              <input name="eclairage_public_qte" type="number" placeholder="eclairage public qte" class="form-control" >
                              
                              </div>
                              <div class="form-group">
                              <label class="col-md-4 control-label">eclairage public cout</label>  
                              
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="eclairage_public_cout" type="number" placeholder="eclairage public cout" class="form-control" >
                              </div>
                             
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">eclairage public taux</label>  
                         
                              <span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
                              <input name="eclairage_public_taux" type="number" placeholder="eclairage public taux" class="form-control" >
                            </div>
                              
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">voirie qte</label>  
                              
                              <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                              <input name="voirie_qte" type="number" placeholder="voirie qte" class="form-control" >
                              </div>
                             
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">voirie cout</label>  
                          
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="voirie_cout" type="number" placeholder="voirie cout" class="form-control" >
                            
                              </div>
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">voirie taux</label>  
                              
                              <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                              <input name="voirie_taux" type="number" placeholder="voirie taux" class="form-control" >
                              </div>
                             
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">eau potable qte</label>  
                             
                              <span class="input-group-addon"><i class="	glyphicon glyphicon-tint"></i></span>
                              <input name="eau_potable_qte" type="number" placeholder="eau potable qte" class="form-control" >
                              </div>
                           
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">eau potable cout</label>  
                              
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="eau_potable_cout" type="number" placeholder="eau potable cout" class="form-control" >
                              </div>
                              
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">eau potable taux</label>  
                             
                              <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                              <input name="eau_potable_taux" type="number" placeholder="eau potable taux" class="form-control" >
                              </div>
                            
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">drainage qte</label>  
                             
                              <span class="input-group-addon"><i class="glyphicon glyphicon-adjust"></i></span>
                              <input name="drainage_qte" type="number" placeholder="drainage qte" class="form-control" >
                              
                              </div>
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">drainage cout</label>  
                           
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="drainage_cout" type="number" placeholder="drainage cout" class="form-control" >
                           
                              </div>
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">drainage taux</label>  
                              
                              <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                              <input name="drainage_taux" type="number" placeholder="drainage taux" class="form-control" >
                              </div>
                             
                              <div class="form-group">
                              <label class="col-md-4 control-label">amel habitat qte</label>  
                            
                              <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>
                              <input name="amel_habitat_qte" type="number" placeholder="amel habitat qte" class="form-control" >
                             
                              </div>
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">amel habitat cout</label>  
                             
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="amel_habitat_cout" type="number" placeholder="amel habitat cout" class="form-control" >
                              </div>
                             
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">socio collectif cout</label>  
                            
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="socio_collectif_cout" type="number" placeholder="socio collectif cout" class="form-control" >
                              </div>
                            
                              <div class="form-group">
                              <label class="col-md-4 control-label">industriel cout</label>  
                             
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="industriel_cout" type="number" placeholder="industriel cout" class="form-control" >
                              </div>
                            
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">cout total</label>  
                             
                              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="cout_total" type="number" placeholder="cout total" class="form-control" >
                              
                              </div>
                              <!-- Text input-->
                              
                              <div class="form-group">
                              <label class="col-md-4 control-label">type</label>  
                            
                                  <span class="input-group-addon"><i class="	glyphicon glyphicon-folder-close"></i></span>
                              <input name="type" placeholder="type" class="form-control"  type="text" >
                            
                              </div>
                            
                           <br>
                          
              
                           <input type="submit" class="btn btn-info" value="Confirmer">
                  <button type="reset" class="btn btn-default" >Annuler</button>
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{asset('js/create_projet.js')}}">
   
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
@endsection