<!DOCTYPE html>
<html>
  @include('templates.partials._head')
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
  
        <header class="main-header">
            @include('templates.partials._topnav')
        </header>
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('templates.partials._footer')
    </div>
    @include('templates.partials._scripts')
    @yield('scripts')
  </body>
</html>
