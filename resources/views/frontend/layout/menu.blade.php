<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li class="active"><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">{{trans('user.services')}}</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#pricing">Pricing</a></li>
        @guest
            <li class="drop-down"><a href="">{{trans('user.login')}}</a>
        @else
            <li class="drop-down"><a href="">{{auth()->user()->name}}</a>
        @endguest
        <ul>
            @guest
                <li><a href="{{url('login')}}">{{trans('user.login')}}</a></li>
                @if (Route::has('register'))
                    <li><a href="{{url('register')}}">{{trans('user.register')}}</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a  href="{{url('profile')}}">{{ auth()->user()->name . ' ' . trans('user.profile')}}</a>
                    <a class="dropdown-item" href="{{ url('account/setting') }}">{{trans('user.Account Setting')}}</a>
                    <a class="dropdown-item" href="{{ url('mailchimp') }}">{{trans('user.MailChimp')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                @endguest


            </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
        <li class="drop-down"><a href="">{{trans('user.Languages')}}</a>
            <ul>
                <li><a href="{{url('front_lang/ar')}}">{{trans('user.Arabic')}}</a></li>
                <li><a href="{{url('front_lang/en')}}">{{trans('user.English')}}</a></li>
            </ul>
        </li>
    </ul>
</nav><!-- .nav-menu -->
