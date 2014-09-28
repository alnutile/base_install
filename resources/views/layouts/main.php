<!doctype html>
<html lang="en" ng-app="app">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title>App Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/app.css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">
</head>
<body>

    <div class="content">


        <!-- Main bar -->
        <div class="mainbar">

            <div class="matter">
                <div class="container">
                    <ng-view></ng-view>
                </div>
            </div>



        </div>


        <div class="clearfix"></div>


    </div>
    <!-- Content ends -->

    <!-- Footer starts -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </footer>

    <script src="/bower_components/angular/angular.js"></script>
    <script src="/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
    <script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script src="/bower_components/angular-route/angular-route.js"></script>
    <script src="/bower_components/angular-mocks/angular-mocks.js"></script>
    <script src="/bower_components/angular-animate/angular-animate.js"></script>
    <script src="/bower_components/angular-resource/angular-resource.js"></script>
    <script src="/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <script src="/bower_components/lodash/dist/lodash.compat.min.js"></script>
    <script src="/bower_components/restangular/dist/restangular.min.js"></script>

    <!-- to be moved into bower -->
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <script src="/bower_components/jquery-ui/jquery-ui.js"></script>
    <script src="/bower_components/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <!-- to be moved into bower -->

    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/routes-config.js"></script>
    <script src="/assets/js/dashboard/dataService.js"></script>
    <script src="/assets/js/dashboard/dashCtrl.js"></script>


</body>
</html>
