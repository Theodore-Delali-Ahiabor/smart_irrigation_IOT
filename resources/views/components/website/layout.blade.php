<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    {{-- head --}}
    <x-dashboard.head></x-dashboard.head>
    {{-- / head --}}
    <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
        
    {{-- Main Content --}}
        {{$slot}}
        {{-- / Main Content --}}

        {{-- Script --}}
        <x-dashboard.script></x-dashboard.script>
        {{-- / Script --}}
    </boby>
</html>
