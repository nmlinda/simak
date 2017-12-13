<nav class="navbar navbar-static-top">
    <div class="container">
        <div class="navbar-header">
          <a href="{{ route('home') }}" class="navbar-brand"><b>Simak</b>Asrama</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li @if ($active == 'home') class="active" @endif><a href="{{ route('home') }}">Beranda <span class="sr-only">(current)</span></a></li>
            <li @if ($active == 'panduan') class="active" @endif><a href="{{ route('panduan') }}"><i class="fa fa-fw fa-book"></i> Panduan</a></li>
            <li @if ($active == 'profil') class="active" @endif><a href="{{ route('profil') }}"><i class="fa fa-fw fa-group"></i> Profil</a></li>
            <li @if ($active == 'tl') class="active" @endif><a href="{{ route('timeline') }}"><i class="fa fa-fw fa-calendar-check-o"></i> Timeline</a></li>
            <li><a href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i> Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
           
    </div>  
    </div>
    <!-- /.container-fluid -->
    <div class="jumbotron" style="margin-bottom: 0px;>
        
        <div class="container">
            <div class="text-center">
                 <h2>Sistem Informasi Akademik Asrama PPKU IPB</h2>
            </div><!-- /.navbar-collapse -->
        </div>
    </div>
</nav>
