<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('assets/dist/img/profile-photo.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('assets/dist/img/profile-photo.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  <p>
                    {{ Auth::user()->name }}
                    <small>{{ Auth::user()->nim }}<br>{{Auth::user()->role}}<br></small>
                  </p>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('ganti_password') }}" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                  {{--  <a href="#" class="btn btn-default btn-flat">Sign out</a>  --}}
                </div>
              </li>
            </ul>
          </li>
          <li>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            {{--  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>  --}}
          </li>
        </ul>
      </div>
    </nav>
