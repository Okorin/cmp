      <div class="fixed-top container-fluid bg-light headbar">
        <div class="row align-items-center h-100">
          <div class="col-md-8">
            <h1 class="bold font-weight-bold">Community Mentorship Program</h1>
          </div>
          <div class="col-md-4">
            <div class="container-fluid">
              @if( Auth::guest() )
                <div class="row form-group align-items-center h-100 mb-0">
                    <div class="col">
                      <a class="float-right btn btn-primary" href="{{ route('login') }}">Sign in</a>
                    </div>
                  </div>
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