<!doctype html>
<html lang="{{ App::getLocale() }}">
  <head>
    @include('layouts.css')
	
	@yield('costum-css')

    <title>@yield('title', 'home') &middot; osu!cmp</title>
  </head>
<body>

    <header>
      @include('layouts.header')
      @include('layouts.navigation')
    </header>

    <main role="main">
      <div class="container h-100 complete-screen bg-light">
        <div class="col extra-space h-100 shadow-left-and-right overflow complete-screen">
          @yield('content')
        </div>
      <!-- FOOTER -->
    </main>
      <footer class="container-fluid bg-dark cust-footer text-light shadow-top-inset">
        @include('layouts.footer')
      </footer>
    </div>
    @include('layouts.footerScripts')
  </body>
</html>