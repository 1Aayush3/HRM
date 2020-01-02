<ul class="sidebar navbar-nav " style=" background: linear-gradient(#F09819,#659999);">
  <li class="nav-item active">
    <a class="nav-link" href="{{route('dashboard.index')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  @can('roles-list')
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Employee</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="{{route('employees.index')}}">List</a>
      <a class="dropdown-item" href="{{route('employees.create')}}">Register</a>
    </div>
  </li>
  @endcan
  @if(Auth::user()->roles[0]['id']==3)
  <li class="nav-item">
    <a class="nav-link" href="{{route('users.index')}}">
      <i class="fas fa-fw fa-folder"></i>
      <span>My Profile</span></a>
  </li>
  @endif
  <li class="nav-item">
    <a class="nav-link" href="javascript:;">
      <i class="fas fa-fw fa-table"></i>
      <span>Calender</span></a>
  </li>

  @can('role-list')
  <li class="nav-item">
    <a class="nav-link" href="{{route('roles.index')}}">
      <i class="fas fa-user"></i>
      <span>Manage Role</span></a>
  </li>
  @endcan
  @can('role-list')
  <li class="nav-item">
    <a class="nav-link" href="{{route('settings.index')}}">
      <i class="fas fa-fw fa-cog"></i>
      <span>Settings</span></a>
  </li>
  @endcan
</ul>