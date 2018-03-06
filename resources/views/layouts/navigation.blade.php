      <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary shadow-bottom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav navbar-nav nav-fill container-fluid">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cycle.index') }}">schedule</a>
            </li>
              @if(Auth::check())
              @if(Auth::user()->isOrganizer())
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                organization
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('role.index') }}">all roles</a>
              @can('create', App\Role::class)
                <a class="dropdown-item" href="{{ route('role.create') }}">new visible role</a>
              @endcan
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('cycle.index') }}">all cycles</a>
                @can('create', App\Cycle::class)
                <a class="dropdown-item" href="{{ route('cycle.create') }}">new cycle</a>
                @endcan
              </div>
            </li>
            @endif
            @endif
          </ul>
        </div>
      </nav>