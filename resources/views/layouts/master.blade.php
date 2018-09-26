<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Starter Template - Materialize</title>

    <!-- CSS  -->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="container">
        
        <form action="{{ route('logout') }}" method="POST" >
            @csrf
            <p>Logged as <b>{{ Auth::user()->name }}</b><button type="submit" class="waves-effect waves-light btn-small">
                Logout</button></p>
        </form>

       

        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">person_add</i>
                    Invitation
                    <span class="new badge red">4</span></div>
                <div class="collapsible-body">
                    <p>
                        <span class="red-text"><b>Bill Gate</b></span><a href="">accept</a> | <a href="">deny</a>
                    </p>
                    <p>
                        <span class="red-text"><b>Larry Page</b></span><a href="">accept</a> | <a href="">deny</a>
                    </p>
                    <p>
                        <span class="red-text"><b>Jack Ma</b></span><a href="">accept</a> | <a href="">deny</a>
                    </p>
                    <p>
                        <span class="red-text"><b>Steav Job</b></span><a href="">accept</a> | <a href="">deny</a>
                    </p>
                </div>
            </li>

        </ul>

        

        <h1 class="center-align green-text text-dark-4 ">Todo List</h1>

        @yield('content')

    </div>
    <!--End container-->



    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>

        var elems = document.querySelectorAll('.collapsible');
        var options;
        var instances = M.Collapsible.init(elems, options);

        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    </script>

</body>

</html>
