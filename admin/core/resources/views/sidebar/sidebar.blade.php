<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::to('')}}/dist/img/IMG_20170213_160705_152.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->nama}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">PORTAL</li>
        <li class="treeview">
          <a href="{{URL::to('')}}">
            <i class="fa fa-dashboard"></i>
            <span>Home</span>
          </a>
        </li>
        @foreach (Settings::getGroupMenu() as $grupmenu)
        <li class="treeview">
          <a href="#">
            <i class="{{$grupmenu->icon}}"></i>
            <span>{{$grupmenu->namagrupmenu}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach (Settings::getMenu() as $menu)
              @if ($menu->idgrupmenu == $grupmenu->id)
                <li><a href="{{URL::to('')}}/{{$menu->menu}}""><i class="fa fa-circle-o"></i>{{$menu->nama_menu}}</a></li>
              @endif
            @endforeach
          </ul>

        </li>
        @endforeach
        <li class="treeview">
          <a href="{{URL::to('aboutus')}}">
            <i class="fa fa-user"></i>
            <span>About Us</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>