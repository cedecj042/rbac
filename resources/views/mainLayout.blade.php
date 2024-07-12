<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.11.1/font/bootstrap-icons.css">
    <style>
        * {
            font-family: calibri;
            font-size: 1.3rem;
        }

        .auth-labels {
            font-size: 24px;
        }

        .auth-textbox {
            margin-bottom: .5em;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-end">
                <div class="fs-6">
                    @if(Auth::check())
                       {{ Auth::user()->userInfo->user_firstname.' '.Auth::user()->userInfo->user_lastname }}
                       <span class="fs-6" style="font-weight: bold;">
                       @if(Auth::user()->hasRole('admin'))
                          : Admin User
                       @else
                          : User
                       @endif
                       </span>
                       @include('slugs.logout')
                    @endif
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if(!Auth::check())
                    @yield('auth-content')
                @else
                    @yield('page-content')
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bu
ndle.min.js"></script>
</body>
</html>
