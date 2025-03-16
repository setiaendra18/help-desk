  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
      <section class="sidebar">
          <div class="user-panel">
              <div class="pull-left image">
                  <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p>{{ Auth::user()->name }}</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">NAVIGASI MENU</li>
              <li class="@yield('dashboard')"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> <span>
                          Dashboard</span></a></li>
              <li class="@yield('pengaduans')"><a href="{{ route('admin.index-data-pengaduan') }}"><i
                          class="fa fa-bell"></i> <span> Data
                          Pengaduan</span></a>
              </li>
              <li class="@yield('pengguna')"><a href="{{ route('admin.index-pengguna') }}"><i
                          class="fa fa-users"></i>
                      Pengguna</a></li>
              <li class="@yield('jenis-laporan')"><a href="{{ route('admin.master.jenis-laporan') }}"><i
                          class="fa fa-tag"></i>
                      Jenis
                      Laporan</a></li>
              <li class="@yield('prioritas-laporan')"><a href="{{ route('admin.master.prioritas-laporan') }}"><i
                          class="fa fa-exclamation-circle"></i>
                     Prioritas
                     Laporan</a></li>
              <li class="@yield('pengaturan-sistem')"><a href="{{ route('admin.pengaturan.pengaturan-sistem') }}"><i
                          class="fa fa-gear"></i>Pengaturan Sistem</a>
              </li>
            {{-- <li class="@yield('pengaturan-email')"><a href="{{ route('admin.pengaturan.pengaturan-email') }}"><i
                                  class="fa fa-envelope"></i>E-Mail</a>
                      </li> --}}
                      {{-- <li class="@yield('pengaturan-slider')"><a href="{{ route('admin.pengaturan.pengaturan-slider') }}"><i
                                  class="fa fa-circle-o"></i>Slide Show
                              </a> --}}
          </ul>
      </section>
  </aside>
