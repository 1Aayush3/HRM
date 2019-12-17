<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{route('dashboard.index')}}">Dashboard</a>
    </li>
    @if(View::hasSection('title'))
    @if(isset($user->joined))
    <li class="breadcrumb-item active">
        <a href="{{route('employees.index')}}"> Employees List</a>
    </li>
    @endif
    <li class="breadcrumb-item active">
        @yield('title')
    </li>
    @endif
    @if(isset($user->name)&&isset($user->joined))
    <li class="breadcrumb-item active">
        {{$user->name}}
    </li>
    @endif
</ol>