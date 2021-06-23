<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{route('profile.show')}}"><i class="material-icons">person</i>Profile</a></li>
                            <!-- <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li><a href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ request()->route()->getName() == 'home' ? 'active' : '' }}">
                        <a href="{{route('home')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'domain.index' ? 'active' : '' }}">
                        <a href="{{route('domain.index')}}">
                            <i class="material-icons">text_fields</i>
                            <span>Domains</span>
                        </a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'temp.index' ? 'active' : '' }}">
                        <a href="{{ route('temp.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Templates</span>
                        </a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'emailtemplate' ? 'active' : '' }}">
                        <a href="{{ route('emailtemplate') }}">
                            <i class="material-icons">widgets</i>
                            <span>Email Templates</span>
                        </a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'contact' ? 'active' : '' }}">
                        <a href="{{ route('contact.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'ph.show' ? 'active' : '' }}">
                        <a href="{{ route('ph.show') }}">
                            <i class="material-icons">layers</i>
                            <span>Placeholders</span>
                        </a>
                    </li>
                    <li class="{{request()->route()->getName() == 'query.show' ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle {{request()->route()->getName() == 'query.show' ? 'toggled' : ''}}">
                            <i class="material-icons">widgets</i>
                            <span>Qureies</span>
                        </a>
                        <ul class="ml-menu">
                        @foreach(getDomains() AS $id=>$url)
                            <li class="{{(isset($did) AND $did == $id) ? 'active' : ''}}">
                                <a href="{{route('query.show', $id)}}">
                                    <span>{{strtr($url, array('www'=>'', 'http://'=>'', 'https://'=>''))}}</span>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="https://webisticsmfn.xyz">Fahad Bin Tariq 2017-ag-8948</a>
                </div>
                <div class="version">
                    <b>Version: </b> 0.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->