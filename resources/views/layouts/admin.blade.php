<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">@lang('admin.home')</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="...." aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.categories')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.users')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.authors')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.publishers')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.books')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.borrows')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                @lang('admin.reviews')
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
    </div>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
