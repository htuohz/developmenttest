<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script>
        function validate() {
            var query = $('#querySelect').find(":selected").val();
            if (query == "") {
                return false;
            }
            return true;
        }
        $(document).ready(function() {


            $("#search-by-title-form").submit(function(e) {
                //e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $(this);
                if (!form.query) {
                    return;
                }

                $.ajax({
                    type: "GET",
                    url: "/search",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        console.log(data);
                        // alert(data); // show response from the php script.
                    }
                });

            });
        });
    </script>
</head>

<body class="antialiased">
    <div class="container">
        <h2>Movies</h2>
        <div class="row m-2">
            <div class="col-lg-12 m-2">
                <form class="well form-search" method="GET" id="search-by-title-form" action="/search" onsubmit="return validate();">
                    <div>
                        <label class="control-label">Title Includes:</label>
                        <select name="query" id="querySelect" style="width: 100px;">
                            <option value="">Please choose a color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                        </select>
                        &nbsp;&nbsp;
                        <button id="search-by-title-button" type="submit" class="btn-sm btn-primary">Search</button>
                        <button id="search-by-title-reset" type="reset" class="btn-sm">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        @if(isset($movies))
        <ul class="list-unstyled d-flex">
            @if(!is_array($movies))
            <li class="media">
                <img class="mr-3 cover pull-left" width="64" height="64" src={{$movies->Poster}} alt={{$movies->Title}}>
                <div class="media-body">
                    <h4 class="mt-0 mb-1">{{$movies->Title}}</h4>
                    <p>Year: {{date("Y",strtotime($movies->Released))}}</p>
                    <p>Runtime: {{$movies->Runtime}}</p>
                </div>
            </li>
            @else
            @foreach ($movies as $moive)
            <li class="media">
                <img class="mr-3 cover pull-left" width="64" height="64" src={{$movie->Poster}} alt={{$movie->Title}}>
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{$movie->Title}}</h5>
                    <p>{{$movie->Released}}</p>
                    <p>Year: {{date("Y",strtotime($movie->Released))}}</p>
                    <p>Runtime: {{$movie->Runtime}}</p>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
        @endif
    </div>
</body>

</html>