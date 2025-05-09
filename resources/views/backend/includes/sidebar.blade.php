<!-- Sidebar -->

<nav class="bg-white border-end shadow-sm" style="min-width: 220px; height: 100vh; position: fixed;">
    <div class="p-4">
        <h5 class="text-primary mb-4">Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('dashboard') ? 'active text-primary fw-bold' : 'text-dark' }}"
                    href="{{ route('dashboard') }}">
                    📊 Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->is('course/master*') ? 'active text-primary fw-bold' : 'text-dark' }}"
                    href="{{ route('course.master') }}">
                    📚 Course Master
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('student/register*') ? 'active text-primary fw-bold' : 'text-dark' }}"
                    href="{{ route('students.index') }}">
                    🧑‍🎓 Student Registration
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link text-dark p-0 {{ request()->is('student/register*') ? 'active text-primary fw-bold' : 'text-dark' }}">
                        🚪 Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

{{-- <!-- Page content starts here -->
  <div style="margin-left: 220px; width: 100%;">
      @yield('content')
  </div> --}}
