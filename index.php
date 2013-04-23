<?php
    session_start();
?>
<!DOCTYPE html>
<html ng-app="loginApp">
<head>
    <script type="text/javascript" src="http://code.angularjs.org/1.1.1/angular.js"></script>
    <script type="text/javascript" src="http://code.angularjs.org/1.1.1/angular-resource.js"></script>
    <script type="text/javascript" src="http://code.angularjs.org/1.1.1/angular-sanitize.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/services.js"></script>
    <script type="text/javascript" src="js/ctrl.js"></script>
    <title>Login App</title>
</head>
<body ng-controller="appCtrl">
    <div id="fb-root"></div>
    <button ng-click="getLoginStatus()">Get Facebook Status</button>
    <br>
    <button ng-click="login()">Facebook Login</button>
    <br>
    <button ng-click="logout()">Facebook Logout</button>
    <br>
    <button ng-click="getInfo()">Get info</button>
    <hr>
    <button ng-click="unsubscribe()">unsubscribe</button>
    <hr>
    facebook status: {{fb_status}}
    <ul>
        <li ng-repeat="item in session">{{item}}</li>
    </ul>
</body>
</html>
