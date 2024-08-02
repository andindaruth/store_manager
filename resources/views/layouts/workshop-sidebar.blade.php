  <!-- Main Sidebar Container -->
  <aside class="main-sidebar mi-side-color sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text text-success"><b>NASECO </b> Seeds</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- <li class="nav-item">
                    <a href="{{ route('items.create') }}" class="nav-link">
                        <i class="fas fa-plus"></i>
                        <p>
                            Add new Equipement
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('workshop.actions') }}" class="nav-link">
                    <i class="fas fa-tasks"></i>
                        <p>
                            Actions
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('fertiliser-out.index') }}" class="nav-link">
                    <i class="fas fa-undo"></i>
                        <p>
                            Return taken Equipement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fertiliser-out.index') }}" class="nav-link">
                    <i class="fas fa-undo"></i>
                        <p>
                            Reverse a give out action
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('workshop.items') }}" class="nav-link">
                    <i class="fas fa-wrench"></i>
                        <p>
                            Items
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.tools') }}" class="nav-link">
                    <i class="fas fa-toolbox"></i>
                        <p>
                            Tools
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.spare_parts') }}" class="nav-link">
                    <i class="fas fa-cogs"></i>
                        <p>
                            Spareparts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.farm') }}" class="nav-link">
                    <i class="fas fa-tractor"></i>
                        <p>
                            Farm Equipemnet
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.farm') }}" class="nav-link">
                    <i class="fas fa-tools"></i>
                        <p>
                            Workshop Equipement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.returned') }}" class="nav-link">
                    <i class="fas fa-redo"></i>
                        <p>
                            Returned Equipement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.taken_non_returnable') }}" class="nav-link">
                    <i class="fas fa-handshake-slash"></i>
                        <p>
                            Taken non returnable
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.repaired') }}" class="nav-link">
                    <i class="fas fa-check-circle"></i>
                        <p>
                            Repaired
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.disposed') }}" class="nav-link">
                    <i class="fas fa-trash"></i>
                        <p>
                            Disposed
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workshop.general') }}" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                        <p>
                            General report of taken items
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
