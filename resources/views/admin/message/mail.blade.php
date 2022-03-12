<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Request Email</title>
</head>

<style>
    body{
            font-family: sans-serif;
        }
        .container{ width: 90%; max-width: 640px; margin: 0 auto}
        .mail{background: #fafafa; color: #1b1e21;  padding: 30px; min-height: 350px;
            -webkit-box-shadow:  0px 1px 5px rgba(0, 0, 0, 0.5);
            -moz-box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);}
            
        .logo{ display: inline-block; margin: 0 auto; width: 250px; height: auto; max-width: 100%;}
        .bold{
            font-weight: 600;
        }
        header{
            padding: 10px;
            background-color: #fff;
            text-align: center;
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);
            border-top-right-radius: 6px;
            border-top-left-radius: 6px;
            -webkit-box-shadow:  0px 1px 5px rgba(0, 0, 0, 0.5);
            -moz-box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);
        }

        header a{

        }
        .table{ border-collapse: collapse; width: 100%;}
        .table td, .table th{ padding: 14px; border-bottom: #f0f0f0 solid 1px; text-align: left; vertical-align: top }
        .table tr:last-child td, .table tr:last-child th{border-bottom: none;}

        .heading{
            padding: 10px;
            background-color: #343a40 ;
            text-align: center;
            color: #ffffff;
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);

        }

        .heading a{
            color: #fafafa;
        }

        .message{
            padding: 14px;
        }

        footer{
            padding: 10px;
            background-color: #343a40 ;
            text-align: center;
            color: #ffffff;
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);
            text-align: center;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);

        }


</style>

<body>

    <div class="container">
        <header>
            <a href="{{ url('/') }}"><img class="logo" src="{{ $message->embed( public_path('images/ciet-full-logo.jpg') ) }}" alt="CIET"></a>
        </header>
        <div class="heading">
            Below are the details of Request by {{ $name }}.
        </div>

        <div class="mail">
            <h4>{{ $title }}</h4>

            {!! $message_text !!}
        </div>
    
        <footer>
            <small>All rights reserved to <a href="{{ url('/') }}" style="color: #ffffff">Central Institute of Educational Technology, NCERT</a></small>
        </footer>
    
    </div>
    
</body>
</html>