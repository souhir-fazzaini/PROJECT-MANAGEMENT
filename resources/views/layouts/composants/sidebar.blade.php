<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <br><a href="#" class="brand-link">
      <img src="{{asset('backend/dist/img/arru.jpg')}}" alt="AdminLTE Logo" class="nav-icon brand-image img-circle elevation-3"
           style="opacity: .8">
    <h6>&nbsp;&nbsp;&nbsp;&nbsp;Agence de Réhabilitation <br>&nbsp;&nbsp; et de Rénovation Urbaine</h6> <br>
     
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user.png')}}" class=" img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('dashboard')}}" class="d-block"> {{auth()->user()->name}}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <br>
             <li class="nav-item">
              <a href="{{route('users.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Gestion des utilisateurs
                </p>
              </a>
            </li><br>
             

          <li class="nav-item">
            <a href="{{route('roles.index')}}"  class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Gestion des rôles<br>
              </p>
            </a>
          </li><br>
          

         
          <li class="nav-item">
            <a href="{{route('permissions.index')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                 Gestion des fonctionnalités<br>
              </p>
            </a>
          </li><br>
       
          <li class="nav-item">
            <a href="{{route('gouvernorat.index')}}" class="nav-link">
              <i class="nav-icon fas fa-globe-americas"></i>
              <p>
                 Gestion des gouvernorats<br>
              </p>
            </a>
          </li><br>
       
          <li class="nav-item">
            <a href="{{route('commune.index')}}" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                 Gestion des communes<br>
              </p>
            </a>
          </li><br>
       
          <li class="nav-item">
            <a href="{{route('municipalite.index')}}" class="nav-link">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
                 Gestion des municipalités<br>
              </p>
            </a>
          </li><br>
     

          
          <li class="nav-item">
            <a 
            @if(!empty(auth()->user()->id_gouvernorat))
            @if (auth()->user()->id_gouvernorat == 25)
             href="{{route('carte_tunisie')}}" 
            @else
                    @switch(auth()->user()->id_gouvernorat)
                     @case(23)
                          href="{{route('Tozeur',['id'=>'23'])}}"
                     @case(15)
                          href="{{route('Manubah',['id'=>'15'])}}"
                     @case(6)
                          href="{{route('Béja',['id'=>'6'])}}"
                     @case(7)
                          href="{{route('Ben_Arous',['id'=>'7'])}}"
                     @case(8)
                          href="{{route('Bizerte',['id'=>'8'])}}"
                     @case(9)
                          href="{{route('Jandouba',['id'=>'9'])}}"
                     @case(1)
                          href="{{route('Tunis',['id'=>'1'])}}"
                     @case(18)
                          href="{{route('Nabeul',['id'=>'18'])}}"
                     @case(13)
                          href="{{route('Kef',['id'=>'13'])}}"
                     @case(11)
                          href="{{route('Kassérine',['id'=>'11'])}}"
                     @case(2)
                          href="{{route('Gabés',['id'=>'2'])}}"
                     @case(3)
                          href="{{route('Gafsa',['id'=>'3'])}}" 
                     @case(19)
                          href="{{route('Sidi_bouzid',['id'=>'19'])}}"   
                     @case(4)
                          href="{{route('Sfax',['id'=>'4'])}}"  
                     @case(20)
                          href="{{route('Siliana',['id'=>'20'])}}"  
                     @case(14)
                          href="{{route('Mahdia',['id'=>'14'])}}"
                     @case(17)
                          href="{{route('Monastir',['id'=>'17'])}}"
                     @case(10)
                          href="{{route('Kairouan',['id'=>'10'])}}"   
                     @case(21)
                          href="{{route('Sousse',['id'=>'21'])}}" 
                     @case(24)
                          href="{{route('Zaghouen',['id'=>'24'])}}"  
                     @case(16)
                          href="{{route('Médnine',['id'=>'16'])}}"  
                     @case(12)
                          href="{{route('Kebili',['id'=>'12'])}}" 
                     @case(5)
                          href="{{route('Ariena',['id'=>'5'])}}" 
                     @case(12)
                          href="{{route('Tataouine',['id'=>'22'])}}"
                 @endswitch
              
            @endif 
            @endif
            class="nav-link">

           
              <i class="nav-icon fas fa-hard-hat"></i>
              <p>
                 Gestion des projets
              </p>
            </a>
          </li><br>
  

       
          <li class="nav-item">
            <a href="{{route('quartier.index')}}" class="nav-link">
              <i class="nav-icon fas fa-drafting-compass "></i>
              <p>
                 Gestion des quartiers
              </p>
            </a>
          </li>
       

          <br><br>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
            this.closest('form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Déconnecter
              </p>
            </a>
          </form>
          </li><br><br><br><br>
          
   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>