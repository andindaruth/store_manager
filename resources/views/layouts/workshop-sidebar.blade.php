  <!-- Main Sidebar Container -->
  <aside class="main-sidebar mi-side-color sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text text-success"><b>NASECO </b> Workshop</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('equipment.actions') }}" class="nav-link">
                    <i class="fas fa-tasks"></i>
                        <p>
                            Actions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.items') }}" class="nav-link">
                    <i class="fas fa-wrench"></i>
                        <p>
                            Items
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.tools') }}" class="nav-link">
                    <i class="fas fa-toolbox"></i>
                        <p>
                            Tools
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.spare_parts') }}" class="nav-link">
                    <i class="fas fa-cogs"></i>
                        <p>
                            Spareparts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.farm') }}" class="nav-link">
                    <i class="fas fa-tractor"></i>
                        <p>
                            Farm Equipemnet
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.workshop') }}" class="nav-link">
                    <i class="fas fa-tools"></i>
                        <p>
                            Workshop Equipment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.returned') }}" class="nav-link">
                    <i class="fas fa-redo"></i>
                        <p>
                            Returned Equipment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.taken_non_returnable') }}" class="nav-link">
                    <i class="fas fa-handshake-slash"></i>
                        <p>
                            Taken non returnable
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.repaired') }}" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                        <p>
                            Repaired
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.disposed') }}" class="nav-link">
                    <i class="fas fa-trash"></i>
                        <p>
                            Disposed
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.general_in') }}" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                        <p>
                            General report of Brought Equipment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipment.general') }}" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                        <p>
                            General report of taken Equipment
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
