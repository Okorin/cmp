      <div class="fixed-top container-fluid bg-light headbar">
        <div class="row align-items-center h-100">
          <div class="col-md-8">
            <h1 class="bold font-weight-bold">Community Mentorship Program</h1>
          </div>
          <div class="col-md-4">
            <div class="container-fluid">
              @if( Auth::guest() )
              <form>
                <div class="row form-group align-items-center h-100 mb-0">
                    <div class="col">
                      <input type="text" class="form-control" id="username" placeholder="Username" />
                    </div>
                    <div class="col">
                      <input type="password" class="form-control" id="pass" placeholder="Password" />
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col">
                      <span class="text-secondary">Don't have an account?</span> <a href="{{ url('/register') }}">Sign up</a>
                  </div>
                </div>
              </form>
              @else
                <h1 class="float-right font-weight-bold">Hello, {{ Auth::user()->name }}</h1>
              @endif
            </div>
          </div>
        </div>
      </div>