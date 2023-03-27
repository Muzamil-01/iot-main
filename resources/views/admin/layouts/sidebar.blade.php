<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Material inc.</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->
        <li class="nav-item">
            <span class="text-dark">Country</span>
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <span class="text-dark">Select Country</span><i class="bi bi-chevron-down ms-auto mb-3"></i>
            </a>

            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Country 1</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
            <span class="text-dark">Branch</span>

            <a class="nav-link collapsed text-dark border-bottom border-2" data-bs-target="#forms-nav"
                data-bs-toggle="collapse" href="#">
                <span>Select Branch</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Branch 1</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Forms Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('building') }}">
                <i class="bi bi-building-fill"></i>
                <span>Buildings</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('items') }}">
                <i class="bi bi-plus"></i>
                <span>items</span>
            </a>
        </li>
        <!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sensors') }}">
                <i class="bi bi-gear"></i>
                <span>Sensors</span>
            </a>
        </li>
        <!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('suppliers') }}">
                <i class="bi bi-cart3"></i>
                <span>Suppliers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('peoples.index') }}">
                <i class="bi bi-person"></i>
                <span>People</span>
            </a>
        </li>
        <!-- End Register Page Nav -->



        <!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('trainings') }}">
                <i class="bi bi-book"></i>
                <span>Trainings</span>
            </a>
        </li>
        <!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('issues') }}">
                <i class="bi bi-exclamation-triangle"></i>
                <span>issues</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('permissions') }}">
                <i class="bi bi-exclamation-triangle"></i>
                <span>Permissions</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('roles') }}">
                <i class="bi bi-exclamation-triangle"></i>
                <span>Roles</span>
            </a>
        </li>
        <li class="nav-item">

            <a class="btn btn-outline-primary w-100" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        {{--     
    <li class="nav-item">
      <button class="btn btn-outline-primary w-100">Logout</button>
    </li> --}}
        <!-- End Blank Page Nav -->
    </ul>
</aside>