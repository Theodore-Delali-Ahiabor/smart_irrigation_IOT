<template>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="collapse navbar-collapse show" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-flex align-items-center">
              <span class="nav-link font-large-1">{{ date }}</span>
              <span class="nav-link font-large-1">{{ month }},</span>
              <span class="nav-link font-large-1">{{ year }}</span>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div>
                  <Link class="dropdown-item" href="/logout"><i class="ft-power"></i> Logout</Link>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>
<script setup>
    import { ref } from 'vue';
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let CopyrightDate = new Date;
    const year = ref(CopyrightDate.getFullYear());
    const month = ref(months[CopyrightDate.getUTCMonth()]);
    const date = ref(CopyrightDate.getDate());
</script>
