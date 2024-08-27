@extends('layouts.composants.main')

@section('content')

  <!-- SEARCH FORM -->
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    
    <br>
          
    <div class="content">
      <div class="container-fluid">
        <div class="row">
     
              <div class="col-sm-6">
                <h3 class="m-0 text-dark">Modifer un projet</h3>
              </div><!-- /.col -->
           <div class="col-sm-6">
            <div class=" float-sm-right">
              <a class="btn btn-info" href="{{route('projet.index')}}"><span class="fas fa-history"></span></a>
            </div>
          </div>
        </div>
        <br>
          
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
                  
                    <form method="post" action="{{route('projet.update')}}"enctype="multipart/form-data" style="margin-left: auto;
                    margin-right: auto; width : 1000px;"  class="needs-validation">
                      @csrf
                      <div class="form-group">
                        <label class="col-md-4 control-label">id</label>  
                      
                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                        <input name="id" type="number" value="{{$projet['id']}}"  class="form-control" readonly>
                     
                        </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Rang projet</label>  
                      
                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                        <input name="q" type="number" value="{{$projet['rang_projet']}}" placeholder="nombre quartier" class="form-control" readonly>
                     
                        </div>
                    
                                      
                                      <!-- Select Basic -->
                                      <label class="col-md-4 control-label">Gouvernorat</label> 
                                      <div class="form-group"> 
                                    
                                        <select name="gouvernorat" id="gouvernorat" class="dynamic" class="form-control selectpicker" data-dependent="gouvernorat" >
                                          <div class="col-md-4 inputGroupContainer">
                                            <option value='{{$id_gouvernorat}}'  class="form-control" >{{$gouvernorat1}}</option>
                                    @foreach($gouvernorats as $gouvernorat)
                                      <option value='{{$gouvernorat->id}}'  class="form-control" >{{$gouvernorat->nom_gouvernorat_fr}}</option>
                                      @endforeach
                                          </div>
                                      </select>
                                      </div>
                                      <label class="col-md-4 control-label">Commune</label> 
                                      <div class="form-group" >
                                      
                                        <select style="width: 200px" class="dynamic_1" id="commune" name="commune">
                                      
                                          
                                          <option value='{{$id_commune}}' disabled="true" selected="true" class="dynamic_1" id="dynamic_1">{{$commune}}</option>
                                          <input id="prodId" name="commune" type="hidden" value="{{$id_commune}}" >
                                        </select>
                                      </div>
                                      <label class="col-md-4 control-label">Municipalite</label> 
                                      <div class="form-group" >
                                        <select style="width: 200px" class="dynamic_2" id="dynamic_2" name="municipalite">

                                          <option value='{{$id_municipalite}}' disabled="true" selected="true" class="dynamic_2" id="dynamic_2">{{$municipalite}}</option>
                                          <input id="prodId" name="municipalite" type="hidden" value="{{$id_municipalite}}" >

                                        </select>
                                      </div>
                                   
                                    <div class="form-group">
                                      <label class="col-md-4 control-label">nombre quartier</label>  
                                   
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                                      <input name="q" type="number" value="{{$projet['nombre_quartier']}}" placeholder="nombre quartier" class="form-control">
                                      </div>
                                      
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">nombre maison</label>  
                                      
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                      <input name="m" type="number" value="{{$projet['nombre_maison']}}"  placeholder="nombre maison" class="form-control" >
                                      </div>
                                      
                                      
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">nombre habitant</label>  
                                    
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <input name="h" type="number" value="{{$projet['nombre_habitant']}}"  placeholder="nombre habitant" class="form-control" >
                                      </div>
                                    
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">assainissement cout</label>  
                                    
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                      <input  name="c" type="number" value="{{$projet['assainissement_cout']}}"  placeholder="assainissement cout" class="form-control" >
                                    
                                      </div>
                                      
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">superficie quartier</label>  
                                    
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                                      <input  name="superficie_quartier" value="{{$projet['superficie_quartier']}}"  type="number" placeholder="superficie quartier" class="form-control" >
                                      </div>
                                     
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">rapport superificie</label>  
                                     
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                      <input name="rapport_superificie" value="{{$projet['rapport_superificie']}}"  type="number" placeholder="rapport superificie" class="form-control" >
                                     
                                      </div>
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">taux habitation</label>  
                                    
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                                      <input name="taux_habitation" value="{{$projet['taux_habitation']}}"  type="number" placeholder="taux habitation" class="form-control" >
                                     
                                      </div>
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">superficie quartier couvert</label>  
                                   
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-fullscreen"></i></span>
                                      <input name="superficie_quartier_couvert"  value="{{$projet['superficie_quartier_couvert']}}"  type="number" placeholder="superficie quartier couvert" class="form-control" >
                                      </div>
                                      
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">taux habitation</label>  
                                   
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                                      <input name="taux_habitation" type="number" value="{{$projet['taux_habitation']}}"  placeholder="taux habitation" class="form-control" >
                                      </div>
                                   
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">rapport depense maison</label>  
                                    
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                      <input name="rapport_depense_maison" type="number" value="{{$projet['rapport_depense_maison']}}"  placeholder="rapport depense maison" class="form-control" >
                                      </div>
                                    
                                      <div class="form-group">
                                      <label class="col-md-4 control-label">composante projet</label>
                                    
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                            <textarea class="form-control" name="comment" value="{{$projet['composante_projet']}}" style="margin:0" placeholder="composante projet"></textarea>
                                      </div>
                                     
                                      <div class="form-group">
                                        <label class="col-md-4 control-label">assainissement qte</label>  
                                    
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                                        <input name="assainissement_qte" type="number" value="{{$projet['assainissement_qte']}}" placeholder="assainissement qte" class="form-control" >
                                        </div>
                                      
                                        <div class="form-group">
                                          <label class="col-md-4 control-label">assainissement taux</label>  
                                         
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                          <input name="assainissement_taux" type="number" value="{{$projet['assainissement_taux']}}" placeholder="assainissement taux" class="form-control" >
                                          </div>
                                        </div>
                                      </div>
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">assainissement_qte</label>  
                                    
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                        <input name="assainissement_qte" type="number" value="{{$projet['assainissement_qte']}}"  placeholder="assainissement_qte" class="form-control" >
                                        </div>
                                      
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">eclairage public qte</label>  
                                      
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                                        <input name="eclairage_public_qte" type="number" value="{{$projet['eclairage_public_qte']}}"  placeholder="eclairage public qte" class="form-control" >
                                        
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">eclairage public cout</label>  
                                     
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="eclairage_public_cout" type="number" value="{{$projet['eclairage_public_cout']}}"  placeholder="eclairage public cout" class="form-control" >
                                        </div>
                                     
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">eclairage public taux</label>  
                                 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
                                        <input name="eclairage_public_taux" type="number" value="{{$projet['eclairage_public_taux']}}"  placeholder="eclairage public taux" class="form-control" >
                                     
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">voirie qte</label>  
                                   
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                                        <input name="voirie_qte" type="number" value="{{$projet['voirie_qte']}}" placeholder="voirie qte" class="form-control" >
                                        </div>
                                     
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">voirie cout</label>  
                                    
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="voirie_cout" type="number" value="{{$projet['voirie_cout']}}"  placeholder="voirie cout" class="form-control" >
                                        </div>
                                     
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">voirie taux</label>  
                                        
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                                        <input name="voirie_taux" type="number" value="{{$projet['voirie_taux']}}" placeholder="voirie taux" class="form-control" >
                                        </div>
                                      
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">eau potable qte</label>  
                                      
                                        <span class="input-group-addon"><i class="	glyphicon glyphicon-tint"></i></span>
                                        <input name="eau_potable_qte" type="number" value="{{$projet['eau_potable_qte']}}"  placeholder="eau potable qte" class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">eau potable cout</label>  
                                     
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="eau_potable_cout" type="number" value="{{$projet['eau_potable_cout']}}"  placeholder="eau potable cout" class="form-control" >
                                       
                                        </div>
                                        
                                        <div class="form-group">
                                      
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                                        <input name="eau_potable_taux" type="number" value="{{$projet['eau_potable_taux']}}"  placeholder="eau potable taux" class="form-control" >
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">drainage qte</label>  
                                   
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-adjust"></i></span>
                                        <input name="drainage_qte" type="number" value="{{$projet['drainage_qte']}}"  placeholder="drainage qte" class="form-control" >
                                        </div>
                                      
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">drainage cout</label>  
                                     
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="drainage_cout" type="number"  value="{{$projet['drainage_cout']}}"  placeholder="drainage cout" class="form-control" >
                                      
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">drainage taux</label>  
                                      
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                                        <input name="drainage_taux" type="number"  value="{{$projet['drainage_taux']}}"  placeholder="drainage taux" class="form-control" >
                                       
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">amel habitat qte</label>  
                                     
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>
                                        <input name="amel_habitat_qte" type="number" value="{{$projet['amel_habitat_qte']}}"  placeholder="amel habitat qte" class="form-control" >
                                       
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">amel habitat cout</label>  
                                    
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="amel_habitat_cout" type="number" value="{{$projet['amel_habitat_cout']}}"  placeholder="amel habitat cout" class="form-control" >
                                     
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">socio collectif cout</label>  
                                      
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="socio_collectif_cout" type="number" value="{{$projet['socio_collectif_cout']}}"  placeholder="socio collectif cout" class="form-control" >
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">industriel cout</label>  
                                      
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="industriel_cout" type="number" value="{{$projet['industriel_cout']}}"  placeholder="industriel cout" class="form-control" >
                                      
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">cout total</label>  
                                        
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input name="cout_total" type="number" value="{{$projet['cout_total']}}"  placeholder="cout total" class="form-control" >
                                       
                                        </div>
                                        <!-- Text input-->
                                        
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">type</label>  
                                   
                                            <span class="input-group-addon"><i class="	glyphicon glyphicon-folder-close"></i></span>
                                        <input name="type" placeholder="type" value="{{$projet['type']}}"  class="form-control"  type="text" >
                                      
                                        </div>
                                      
                                     <br>
                                  
                                     <input type="submit" class="btn btn-info" value="Confirmer">
                            <button type="reset" class="btn btn-default" >Annuler</button>
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
  <script type="text/javascript" src="{{asset('js/create_projet.js')}}">
   
    </script>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  @endsection