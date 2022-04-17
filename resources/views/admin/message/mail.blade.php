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
        .container{ width: 90%; max-width: 640px; margin: 0 auto; background-color: #f5f3f3; padding: 10px;}
        .mail{background: white; color: #1b1e21;  padding: 20px; min-height: 350px;
            -webkit-box-shadow:  0px 1px 5px rgba(0, 0, 0, 0.5);
            -moz-box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5);
            box-shadow:  0px 1px 5px  rgba(0, 0, 0, 0.5); 
            border: 4px solid #D46142; border-radius: 10px;}
            
        .logo{ display: inline-block; margin: 0 auto; width: 250px; height: auto; max-width: 100%;}
        .bold{
            font-weight: 600;
        }
        header{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .subject{
            padding: 0 14px;
            margin: 10px 0;
        }



        header .date{
            color: #343a40;
            font-weight: 600;
            font-size: 0.8rem;
        }
        .table{ border-collapse: collapse; width: 100%; font-size: 0.8rem; overflow: auto;}
        .table td, .table th{ padding: 14px; border-bottom: #343a40 solid 1px; text-align: left; vertical-align: top }
        .table tr:last-child td, .table tr:last-child th{border-bottom: none;}

        .feedback{
            padding: 10px;
            background-color: #f5f3f3 ;
            border-radius: 10px;
            margin: 30px 0;

        }

        .heading a{
            color: #fafafa;
        }

        .message{
            padding: 14px;
        }

        footer{
            text-align: center;
            color: #343a40;
        }

        footer a{
            color: #343a40;
        }



</style>

<body>

    <div class="container">
        
        <div class="mail">

            <header>
                <a href="{{ url('/') }}"><img class="logo" src="{{ $message->embed( public_path('images/ciet-full-logo.jpg') ) }}" alt="CIET"></a>
            </header>
            <div class="feedback">
                <h3 class="subject">{{ $title }}</h3>

                {!! $message_text !!}
            </div>
    
            
        
            <hr>

            <footer>
                <small>&#169; {{ date('Y') }}. All rights reserved to <a href="{{ url('/') }}">Central Institute of Educational Technology, NCERT</a></small>
            </footer>

        </div>
    
    </div>
    
</body>
</html>