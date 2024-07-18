<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png"/>
            <h3 class="brand-text">Smart Farm</h3></a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="{{(request()->path() == 'dashboard') ? 'active' : 'nav-item'}}"><a href="{{'/dashboard'}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>
        <li class="{{(request()->path() == 'statistics') ? 'active' : 'nav-item'}}"><a href="{{'/statistics'}}"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Statistics</span></a>
        </li>
        <li class="{{(request()->path() == 'users') ? 'active' : 'nav-item'}}"><a href="{{'/users'}}"><i class="la la-users"></i><span class="menu-title" data-i18n="">Users</span></a>
        </li>
        <li class="{{(request()->path() == 'settings') ? 'active' : 'nav-item'}}"><a href="{{'/settings'}}"><i class="la la-gear"></i><span class="menu-title" data-i18n="">Settings</span></a>
        </li>
      </ul>
    </div>
    <div class="navigation-background"></div>
</div>
