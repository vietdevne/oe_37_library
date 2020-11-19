<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
  <link href="{{ mix('css/notifications.css') }}" rel="stylesheet">
  <base href="{{ asset('') }}">
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('admin.index') }}">@lang('admin.home')</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3 flex-md-row">
      <li class="nav-item dropdown p-2 text-nowrap">
        <a class="nav-link" href="#notifications-panel" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i data-count="2" class="fas fa-bell notification-icon"></i>
        </a>
        <div class="dropdown-menu noti-content noti-content-fix" aria-labelledby="notiDropdown">
          <div class="dropdown-header">@lang('admin.notification.title')
            <span class="float-right"><a href="">@lang('admin.notification.view_all')</a></span>
          </div>
          <a class="dropdown-item bg-warning" href="#">....</a>
          <a class="dropdown-item" href="#">....</a>
          <a class="dropdown-item" href="#">....</a>
        </div>
      </li>
      <li class="nav-item p-2 text-nowrap">
        <a class="nav-link" href="{{ route('home') }}">@lang('main.home')</a>
      </li>
    </ul>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.categories.index') }}">
                @lang('admin.categories')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.users.index') }}">
                @lang('admin.users')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.authors.index') }}">
                @lang('admin.authors')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.publishers.index') }}">
                @lang('admin.publishers')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.books.index') }}">
                @lang('admin.books')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.borrows.index') }}">
                @lang('admin.borrows')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.reviews.index') }}">
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
  <script src="{{ mix('js/admin.js') }}"></script>
  <script>
</script>
</body>

</html>
