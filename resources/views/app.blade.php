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
    <link rel="shortcut png" href="{{asset('theme-assets/images/logo/logo.png')}}">

    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">

    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">

    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">

    @vite('resources/js/app.js')
    {{-- @inertiaHead --}}
  </head>
    <body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

        {{-- Main Content Slot--}}
            @inertia
        {{-- / Main Content Slot--}}

        {{-- Script --}}
        <script src="theme-assets/js/core/libraries/jquery.min.js"></script>

        <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

        <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
        <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
        {{-- / Script --}}
    </boby>
</html>
