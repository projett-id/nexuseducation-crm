<nav class="app-header navbar navbar-expand-lg navbar-light bg-body">
    <div class="container-fluid">
        <!-- Logo on the left -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/main-logo-vertical.png') }}" alt="Logo" width="150">
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu and account -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <!-- Menu in the center -->
            <ul class="navbar-nav mx-auto">
                @foreach($menuItems as $item)
                    @can($item['permission'])
                        @if(isset($item['submenu']))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ collect($item['submenu'])->pluck('route')->contains(request()->route()->getName()) ? 'active' : '' }}" href="#" id="menuDropdown{{ $loop->index }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="{{ $item['icon'] }}"></i> {{ $item['title'] }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menuDropdown{{ $loop->index }}">
                                    @foreach($item['submenu'] as $sub)
                                        @can($sub['permission'])
                                            <li>
                                                <a class="dropdown-item {{ request()->routeIs($sub['route']) ? 'active' : '' }}" href="{{ route($sub['route']) }}">
                                                    {{ $sub['title'] }}
                                                </a>
                                            </li>
                                        @endcan
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
                                    <i class="{{ $item['icon'] }}"></i> {{ $item['title'] }}
                                </a>
                            </li>
                        @endif
                    @endcan
                @endforeach
            </ul>

            <!-- Account on the right -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sign out
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>