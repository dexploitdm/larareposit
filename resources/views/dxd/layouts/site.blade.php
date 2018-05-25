<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset(env('THEME')) }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset(env('THEME')) }}/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ $title or 'Larareposit' }} | Паттерн Репозиторий</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset(env('THEME')) }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset(env('THEME')) }}/assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset(env('THEME')) }}/assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />

</head>

<body class="section-white">

@yield('navigation')


<div class="section-space"></div>

<div class="cd-section" id="headers">

    <div class="header-1">
        @yield('slider')
    </div>

</div>




</body>
<!--   Core JS Files   -->
<script src="{{ asset(env('THEME')) }}/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset(env('THEME')) }}/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset(env('THEME')) }}/assets/js/material.min.js"></script>

<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
<script src="{{ asset(env('THEME')) }}/assets/js/moment.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
<script src="{{ asset(env('THEME')) }}/assets/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
<script src="{{ asset(env('THEME')) }}/assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
<script src="{{ asset(env('THEME')) }}/assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
<script src="{{ asset(env('THEME')) }}/assets/js/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
<script src="{{ asset(env('THEME')) }}/assets/js/jasny-bootstrap.min.js"></script>

<!--    Plugin For Google Maps   -->
<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>




<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
<script src="{{ asset(env('THEME')) }}/assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

<script type="text/javascript">
    $().ready(function(){

        materialKitDemo.initContactUs2Map();
    });
</script>

</html>
