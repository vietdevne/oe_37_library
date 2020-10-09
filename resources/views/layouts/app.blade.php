<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/site.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
  <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">HVBook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">@lang('main.home')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">@lang('main.categories')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">@lang('main.login')</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main role="main">
    @yield('content')
    <footer class="container">
      <p>&copy; 2020 &middot; <a href="{{ route('locale','vi') }}">@lang('main.locate_vi')</a> &middot; <a
          href="{{ route('locale','en') }}">@lang('main.locate_en')</a></p>
    </footer>
  </main>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
