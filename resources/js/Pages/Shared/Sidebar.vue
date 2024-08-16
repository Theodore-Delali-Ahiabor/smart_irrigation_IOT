<template>
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto w-100 d-flex align-items0center justify-content-center">
                    <a class="navbar-brand" href="index.html">
                    <img class="brand-log" alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png" width="25">
                    <h3 class="brand-text">SAMS</h3></a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item" :class="{'active' : $page.component == 'Dashboard'}"><Link href="/dashboard"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></Link>
                </li>
                <li class="nav-item" :class="{'active' : $page.component == 'Statistics'}"><Link href="/statistics"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Statistics</span></Link>
                </li>
                <li class="nav-item" :class="{'active' : $page.component == 'Users'}"><Link href="/users"><i class="la la-users"></i><span class="menu-title" data-i18n="">Users</span></Link>
                </li>
                <li class="nav-item" :class="{'active' : $page.component == 'Settings'}"><Link href="/settings"><i class="la la-gear"></i><span class="menu-title" data-i18n="">Settings</span></Link>
                </li>
            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>
</template>
