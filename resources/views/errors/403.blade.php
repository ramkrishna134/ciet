<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unauthorized - CIET</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white">

    <div class="container mt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-sm-4 text-center">
                <img class="img-responsive mx-auto d-block" src="/images/403.png" alt="">

                <p class="mt-2 text-center">Please contact to your Administration <a href="mailto:administration@ciet.nic.in">administration@ciet.nic.in</a></p>

                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
    
</body>
</html>