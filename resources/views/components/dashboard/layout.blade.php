<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    {{-- head --}}
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
