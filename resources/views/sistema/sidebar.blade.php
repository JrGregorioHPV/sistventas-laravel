    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('lib/AdminLTE/3.0.0/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/usuarios/'.Auth::user()->id.'.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nombre }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
               <!-- Dashboard -->
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ menuOpen('sistema/categoria') }}
          {{ menuOpen('sistema/departamento') }}">
            <a href="#" class="nav-link {{ active('sistema/categoria') }} 
            {{ active('sistema/departamento') }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Almacén
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!-- Departamento -->
            <li class="nav-item">
                <a href="{{ url('sistema/departamento') }}" class="nav-link {{ active('sistema/departamento') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departamento</p>
                </a>
              </li>
              <!-- Categoría -->
              <li class="nav-item">
                <a href="{{ url('sistema/categoria') }}" class="nav-link {{ active('sistema/categoria') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categoría</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- ALMACÉN -->
          <li class="nav-header">EXAMPLES</li>
          
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              Categoría
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
