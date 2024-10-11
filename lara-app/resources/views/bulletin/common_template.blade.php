<?php
    // Be sure to define these values.
    //$page_title = 'Untitled';
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('bulletin.includes.header')

    <body>
        @include('bulletin.includes.breadcrumb')
        @include('bulletin.includes.actionBar')
        @yield('content')
    </body>

    @include('bulletin.includes.footer')

</html>
