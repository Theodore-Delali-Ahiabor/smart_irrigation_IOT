<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="A smart IOT irrigation project">
    <meta name="author" content="TeckPalz">
    <title>
        Smart Irrigation - {{ucfirst(request()->path())}}
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">

    <link rel="stylesheet" type="text/css" href="theme-assets/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    
    @vite('resources/js/app.js')
    {{-- @inertiaHead --}}
  </head>
    <x-dashboard.head></x-dashboard.head>
    {{-- / head --}}
    <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
        {{-- fixed-top --}}
        <x-dashboard.nav></x-dashboard.nav>
        {{-- / fixed-top --}}

        {{-- Sidebar --}}
        <x-dashboard.sidebar></x-dashboard.sidebar>
        {{-- / Sidebar --}}

        {{-- Main Content Slot--}}
        {{$slot}}
        {{-- / Main Content Slot--}}

        {{-- Footer --}}
        <x-dashboard.footer></x-dashboard.footer>
        {{-- / Footer --}}

        {{-- Script --}}
        <x-dashboard.script></x-dashboard.script>
        {{-- / Script --}}
    </boby>
</html>
