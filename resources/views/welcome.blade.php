<!DOCTYPE html>
<html>
    <head>
        <title>Todo List</title>

        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                font-family: "Roboto", Helvetica, Arial, sans-serif;
                color: #3D7700;

            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Todo List Manager</div>
                <div>{!! link_to_route('auth.login', 'Login')!!} | {!! link_to_route('auth.register', 'Register') !!}</div>
            </div>
        </div>
    </body>
</html>
