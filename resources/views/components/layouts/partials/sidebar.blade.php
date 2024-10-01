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

          <li class="nav-item">
            <a href="{{ route('categorias') }}" class="nav-link">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  Categorias
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('proyectos') }}" class="nav-link">
                <i class="nav-icon fas fa-project-diagram"></i>
                <p>
                  Nuestros Proyectos
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('sedes') }}" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>
                  Sedes
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('productos') }}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Productos
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('cupones') }}" class="nav-link">
               <i class="nav-icon  fas fa-ticket-alt"></i>
                <p>
                  Cupones
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('usuarios') }}" class="nav-link">
               <i class="nav-icon  fas fa-users"></i>
                <p>
                  Usuarios
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('roles') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Roles
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('permisos') }}" class="nav-link">
              <i class="nav-icon fas fa-user-times"></i>
              <p>
                Permisos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('clientes') }}" class="nav-link">
              <i class="nav-icon fas fa-user-times"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ventas.create')}}" class="nav-link">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Crear venta</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p>Mostrar ventas</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>