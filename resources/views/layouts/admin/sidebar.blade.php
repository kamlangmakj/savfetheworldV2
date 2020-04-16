<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item mt-4">
                <a href="{{ url('admin') }}" class="nav-link @if(Request::is('admin')) active @endif">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        แดชบอร์ด
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/users') }}" class="nav-link @if(Request::is('admin/users*')) active @endif">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        ผู้ใช้งาน
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/activities') }}" class="nav-link @if(Request::is('admin/activities*'))  active @endif">
                    <i class="nav-icon far fa-calendar"></i>
                    <p>
                        กิจกรรม
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/join_activities') }}" class="nav-link @if(Request::is('admin/join_activities*')) active @endif">
                    <i class="nav-icon far fa-calendar-plus"></i>
                    <p>
                        เข้าร่วมกิจกรรม
                        <span class="badge badge-info right" style="background-color: #FF0000;">
                            {{$joinActivitiesCount}}
                        </span>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/rewards') }}" class="nav-link @if(Request::is('admin/rewards*')) active @endif">
                    <i class="nav-icon far fa-star"></i>
                    <p>
                        ของรางวัล
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/tracking_rewards') }}" class="nav-link @if(Request::is('admin/tracking_rewards*')) active @endif">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        ติดตามของรางวัล
                        <span class="badge badge-info right" style="background-color: #FF0000;">
                            {{$trackingRewardCount}}
                        </span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/contacts') }}" class="nav-link @if(Request::is('admin/contacts*')) active @endif">
                    <i class="nav-icon fas fa-envelope-open-text"></i>
                    <p>
                        ติดต่อเรา
                        <span class="badge badge-info right" style="background-color: #FF0000;">
                            {{$contactCount}}
                        </span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/receive_news') }}" class="nav-link @if(Request::is('admin/receive_news*')) active @endif">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                        ส่งข่าวสาร
                        <span class="badge badge-info right" style="background-color: #FF0000;">
                            {{$receiveNewsCount}}
                        </span>
                    </p>
                </a>
            </li>
            @guest

            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="nav-icon fas fa-cog"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: #000000">
                            {{ __('ออกจากระบบ') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
           @endguest
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
