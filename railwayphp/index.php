<!DOCTYPE html>
<html lang="en" ng-app="railwayApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Station System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://wallpaperaccess.com/full/1457224.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .header {
            width: 100%;
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
        }

        .container {
            text-align: center;
            padding: 100px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .login-option {
            margin: 20px;
            display: inline-block;
        }

        .login-option img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .login-option p {
            margin-top: 10px;
        }

        .login-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
</head>

<body ng-controller="RailwayController">
    <div class="header">
        <h1>RAILWAY PORTAL</h1>
        <marquee behavior="scroll" direction="left">
            Welcome to the Railway Station System - Providing Efficient Travel Solutions!
        </marquee>
    </div>
    <div class="container">
        <div class="login-option" ng-click="redirectTo('Loginpage.html')">
            <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_icon_149329.png" alt="User Login">
            <p><a href="#" class="login-link">User Login</a></p>
        </div>
        <div class="login-option" ng-click="redirectTo('admin-login.html')">
            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="Admin Login">
            <p><a href="#" class="login-link">Admin Login</a></p>
        </div>
    </div>

    <script>
        var app = angular.module('railwayApp', []);

        app.controller('RailwayController', function ($scope, $window) {
            $scope.redirectTo = function (url) {
                $window.location.href = url;
            };
        });
    </script>
</body>

</html>
