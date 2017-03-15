<?php
/**
 * Created by PhpStorm.
 * User: jrpikong
 * Date: 11/03/17
 * Time: 17:46
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="jrpikong">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap -->

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="./css/css/components.css" rel="stylesheet" type="text/css">


    <!-- Scripts -->
    <script>
        window.Laravel =<?php echo json_encode([
                    'csrfToken' => csrf_token(),
                    ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @include('partial.nav')

        <div class="container-fluid">
            <div class="row">
                <router-view></router-view>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>
    <!-- Core JS files -->
    <script type="text/javascript" src="js/js/plugins/loaders/pace.min.js"></script>
</body>
</html>