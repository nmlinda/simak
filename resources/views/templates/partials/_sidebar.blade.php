<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/profile-photo.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            {{ Auth::user()->name }}<br>
            @if (Auth::user()->role === 'Mahasiswa')
              {{ Auth::user()->gedung }} - {{Auth::user()->lorong}} - {{Auth::user()->kamar}}
            @else
              {{Auth::user()->role}}
            @endif<br>
          </p>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {{--  <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>  --}}
        <li @if ($active == 'beranda') class="active" @endif><a href="{{ route('pages.beranda') }}"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <li @if ($active == 'post') class="active" @endif><a href="{{ route('pages.post') }}"><i class="fa fa-pencil-square-o"></i> <span>Buat Post</span></a></li>
        <li @if ($active == 'nilai') class="active" @endif><a href="{{ route('pages.nilai') }}"><i class="fa fa-line-chart"></i> <span>Nilai</span></a></li>
        <li class="treeview @if ($active == 'absen') active @endif">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Kehadiran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if($absen== 'tambah') class="active" @endif><a href="{{ route('pages.absen')}}"><i class="fa fa-circle-o"></i> Tambah</a></li>
            <li @if($absen== 'lihat') class="active" @endif><a href="{{ route('pages.absen/lihat')}}"><i class="fa fa-circle-o"></i> Lihat</a></li>
            <li @if($absen== 'edit') class="active" @endif><a href="{{ route('pages.absen/edit') }}"><i class="fa fa-circle-o"></i> Edit</a></li>
          </ul>
        </li>

        <li @if ($active == 'timeline') class="active" @endif><a href="{{ route('pages.timeline') }}"><i class="fa fa-calendar"></i> <span>Timeline</span></a></li>

        @if($role === 'Administrator' or $role === 'Senior Resident')
        <li class="treeview @if ($active >= 1 and $active <= 3 ) active @endif">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span>Tambah User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($role === 'Administrator')
            <li @if ($active == 1 ) class="active" @endif><a href="{{ route('pages.tambah-administrator') }}"><i class="fa fa-circle-o"></i> Administrator</a></li>
            <li @if ($active == 2 ) class="active" @endif><a href="{{ route('pages.tambah-sr') }}"><i class="fa fa-circle-o"></i> Senior Resident</a></li>
            <li @if ($active == 3 ) class="active" @endif><a href="{{ route('pages.tambah-mahasiswa') }}"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
            @else
            <li @if ($active == 3 ) class="active" @endif><a href="{{ route('pages.tambah-mahasiswa') }}"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
            @endif
          </ul>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
