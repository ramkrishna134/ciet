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
        
        .success{
            padding: 3px 5px;
            color: white;
            background-color: green;
            border-radius: 3px;
        }

        .danger{
            padding: 3px 5px;
            color: white;
            background-color: red;
            border-radius: 3px;
        }


</style>

<body>

    <div class="container">
        <header>
            <a href="{{ url('/') }}"><img class="logo" src="{{ $message->embed( public_path('images/ciet-full-logo.jpg') ) }}" alt="CIET"></a>
        </header>
        <div class="heading">
            Status updated for Request id <a href="{{ route('message.show', $id) }}">#{{ $id }}</a>.
        </div>

        <div class="mail">
            Dear {{ $name }},

                <p>Your Request "{{ $title }}", has been @if($status == 1) <span class="success">Approved</span> @elseif($status == 2) <span class="danger">Declined</span> @endif by Admin.
                    Please contact at <a href="mailto:admin@ciet.nic.in">admin@ciet.nic.in</a> for more details.</p>

        </div>
    
        <footer>
            <small>&#169; {{ date('Y') }}. All rights reserved to <a href="{{ url('/') }}" style="color: #ffffff">Central Institute of Educational Technology, NCERT</a></small>
        </footer>
    
    </div>
    
</body>
</html>