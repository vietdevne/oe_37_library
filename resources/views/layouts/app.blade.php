<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/site.css') }}" rel="stylesheet">
  <base href="{{ asset('') }}">
</head>
<body class="bg-white">
  <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">HVBook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">@lang('main.home')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">@lang('main.categories')</a>
            </li>
            @if (!Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">@lang('main.login')</a>
            </li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @lang('main.hello'), <b>{{ Auth::user()->username }}</b>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">@lang('main.my_account')</a>
                @if(Auth::user()->can('accessAdmin', 1)) <a class="dropdown-item text-danger"
                  href="{{ route('admin.index') }}">@lang('admin.home')</a> @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" id="logout">@lang('auth.logout')</a>
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main role="main">
    @yield('content')
    <footer class="container">
      <p>&copy; 2020 &middot; <a href="{{ route('locale','vi') }}" class="text-dark">@lang('main.locate_vi')</a>
        &middot; <a href="{{ route('locale','en') }}" class="text-dark">@lang('main.locate_en')</a></p>
    </footer>
  </main>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/site.js') }}"></script>
</body>
</html>
