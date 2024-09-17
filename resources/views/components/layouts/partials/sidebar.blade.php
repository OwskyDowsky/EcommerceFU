<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->imagen}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Inicio
                </p>
              </a>
          </li>
          @can('Categoria ver')
          <li class="nav-item">
            <a href="{{ route('categorias') }}" class="nav-link">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  Categorias
                </p>
            </a>
          </li>
          @endcan

          @can('Proyecto ver')
          <li class="nav-item">
            <a href="{{ route('proyectos') }}" class="nav-link">
                <i class="nav-icon fas fa-project-diagram"></i>
                <p>
                  Nuestros Proyectos
                </p>
            </a>
          </li>
          @endcan

          @can('Sede ver')
          <li class="nav-item">
            <a href="{{ route('sedes') }}" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>
                  Sedes
                </p>
            </a>
          </li>
          @endcan

          @can('Producto ver')
          <li class="nav-item">
            <a href="{{ route('productos') }}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Productos
                </p>
            </a>
          </li>
          @endcan

          @can('Cupon ver')
          <li class="nav-item">
            <a href="{{ route('cupones') }}" class="nav-link">
               <i class="nav-icon  fas fa-ticket-alt"></i>
                <p>
                  Cupones
                </p>
            </a>
          </li>
          @endcan

          @can('Usuario ver')
          <li class="nav-item">
            <a href="{{ route('usuarios') }}" class="nav-link">
               <i class="nav-icon  fas fa-users"></i>
                <p>
                  Usuarios
                </p>
            </a>
          </li>
          @endcan

          @can('Rol ver')
          <li class="nav-item">
            <a href="{{ route('roles') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan

          @can('Permiso ver')
          <li class="nav-item">
            <a href="{{ route('permisos') }}" class="nav-link">
              <i class="nav-icon fas fa-user-times"></i>
              <p>
                Permisos
              </p>
            </a>
          </li>
          @endcan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>