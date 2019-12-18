<ul class="sidebar navbar-nav " style=" background: linear-gradient(#F09819,#659999);">
  <li class="nav-item active">
    <a class="nav-link" href="{{route('dashboard.index')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
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

  <li class="nav-item">
    <a class="nav-link" href="javascript:;">
      <i class="fas fa-fw fa-table"></i>
      <span>Calender</span></a>
  </li>
</ul>