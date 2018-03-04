      <div class="fixed-top container-fluid bg-light headbar">
        <div class="row align-items-center h-100">
          <div class="col-md-8">
            <h1 class="bold font-weight-bold">Community Mentorship Program</h1>
          </div>
          <div class="col-md-4">
            <div class="container-fluid">
              @if( Auth::guest() )
              <form action="{{ route('login') }}" method='POST'>
                {{ csrf_field() }}
                <div class="row form-group align-items-center h-100 mb-0">
                    <div class="col">
                      <input type="text" class="form-control" name="name" placeholder="Username" />
                    </div>
                    <div class="col">
                      <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <span class="text-secondary">Don't have an account?</span> <a href="{{ url('/register') }}">Sign up</a>
                  </div>
                  @if (false !== isset($errors) )
                  @foreach ($errors->all() as $error)
                      <span class="help-block">
                          <strong>{{ $error }}</strong>
                      </span>
                  @endforeach
                  @endif
                </div>
              </form>
              @else
                <div class="row form-group align-items-center h-100 mb-0">
                  <div class="col">
                  <h1 class="float-right font-weight-bold">
                    Hello, 
                    <span style="color:#{{ Auth::user()->getColor() }};">{{ Auth::user()->name }}</span>
                  </h1>
                </div>
                </div>
                <div class="row">
                  <div class="col">
                  <span class="float-right text-primary">Not {{ Auth::user()->name }}? <a  href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a></span>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>