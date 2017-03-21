
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">


        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
            </button>
            <!-- Branding Image -->
            <div><img class="logo" src="/images/prakeaw.png" style="width: 30px; height: 50px;"></div>

        </div>


            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;  <a class="navbar-brand" href="{{ url('home') }} " >
                    {{ config('app.name', 'Laravel') }}
                </a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">เข้าสู่ระบบ</a></li>
                    <li><a href="{{ url('/register') }}">ลงทะเบียน</a></li>

                @elseif( Auth::user()->role == 1 )   {{-- 1-->ADMIN--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{ url('/home') }}">
                                <span class="glyphicon glyphicon-home"  ></span>
                                หน้าหลัก
                            </a>
                        </li>

                        <li>
                            <a href="/users/{{ Auth::user()->id }}/edit">
                                <span class="glyphicon glyphicon-user"  ></span>
                                ประวัติส่วนตัวของฉัน
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('alllists') }}">
                                <span class="glyphicon glyphicon-blackboard"  ></span>
                                ห้องประชุมและยานพาหนะในระบบ
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/datatables/show') }}">
                                <span class="glyphicon glyphicon-list-alt"  ></span>
                                ประวัติการจองของฉัน
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/datatables') }}">
                                <span class="glyphicon glyphicon-list-alt"  ></span>
                                ประวัติการจองทั้งหมด
                            </a>
                        </li>

                        <li>

                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"  ></span>
                                ออกจากระบบ
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                @elseif( Auth::check() && Auth::user()->role >1 && Auth::user()->role <=6) {{-- 2-6 ->NORMAL USER--}}

                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a href="{{ url('/home') }}">
                                            <span class="glyphicon glyphicon-home"  ></span>
                                            หน้าหลัก
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/users/{{ Auth::user()->id }}/edit">
                                            <span class="glyphicon glyphicon-user"  ></span>
                                            ประวัติส่วนตัวของฉัน
                                        </a>
                                    </li>



                                    <li>
                                        <a href="{{ url('/alllists') }}">
                                            <span class="glyphicon glyphicon-blackboard"  ></span>
                                            ห้องประชุมและยานพาหนะในระบบ
                                        </a>
                                    </li>


                                    <li>
                                        <a href="{{ url('/datatables/show/') }}">
                                            <span class="glyphicon glyphicon-list-alt"  ></span>
                                            ประวัติการจองของฉัน
                                        </a>
                                    </li>

                                    <li>

                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"  ></span>
                                            ออกจากระบบ
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                    </li>

                @elseif( Auth::user()->role == 10 ) {{-- 10-->SAHA USER--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{ url('/home') }}">
                                <span class="glyphicon glyphicon-home"  ></span>
                                หน้าหลัก
                            </a>
                        </li>

                        <li>
                            <a href="/users/{{ Auth::user()->id }}/edit">
                                <span class="glyphicon glyphicon-user"  ></span>
                                ประวัติส่วนตัวของฉัน
                            </a>
                        </li>



                        <li>
                            <a href="{{ url('/alllists') }}">
                                <span class="glyphicon glyphicon-blackboard"  ></span>
                                ห้องประชุมและยานพาหนะในระบบ
                            </a>
                        </li>


                        <li>
                            <a href="{{ url('/datatables/showsaha/') }}">
                                <span class="glyphicon glyphicon-list-alt"  ></span>
                                ประวัติการจองของฉัน
                            </a>
                        </li>

                        <li>

                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"  ></span>
                                ออกจากระบบ
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                @elseif( Auth::user()->role == 7 ) {{-- 7-->Driver USER--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{ url('/home') }}">
                                <span class="glyphicon glyphicon-home"  ></span>
                                หน้าหลัก
                            </a>
                        </li>

                        <li>
                            <a href="/users/{{ Auth::user()->id }}/edit">
                                <span class="glyphicon glyphicon-user"  ></span>
                                ประวัติส่วนตัวของฉัน
                            </a>
                        </li>



                        <li>
                            <a href="{{ url('/alllists') }}">
                                <span class="glyphicon glyphicon-blackboard"  ></span>
                                ห้องประชุมและยานพาหนะในระบบ
                            </a>
                        </li>


                        <li>
                            <a href="{{ url('/datatables/showdriver/') }}">
                                <span class="glyphicon glyphicon-list-alt"  ></span>
                                รายละเอียดการจองยานพาหนะในระบบ
                            </a>
                        </li>

                        <li>

                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"  ></span>
                                ออกจากระบบ
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @elseif( Auth::user()->role == 8 ) {{-- 10-->Camera man USER--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{ url('/home') }}">
                                <span class="glyphicon glyphicon-home"  ></span>
                                หน้าหลัก
                            </a>
                        </li>

                        <li>
                            <a href="/users/{{ Auth::user()->id }}/edit">
                                <span class="glyphicon glyphicon-user"  ></span>
                                ประวัติส่วนตัวของฉัน
                            </a>
                        </li>



                        <li>
                            <a href="{{ url('/alllists') }}">
                                <span class="glyphicon glyphicon-blackboard"  ></span>
                                ห้องประชุมและยานพาหนะในระบบ
                            </a>
                        </li>


                        <li>
                            <a href="{{ url('/datatables/showeq/') }}">
                                <span class="glyphicon glyphicon-list-alt"  ></span>
                                ประวัติการจองของฉัน
                            </a>
                        </li>

                        <li>

                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"  ></span>
                                ออกจากระบบ
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </ul>

        @endif
    </div>

</nav>


