<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Posts</title>
{{ HTML::script('js/uswds.min.js'); }}
{{ HTML::style('css/uswds.css'); }}
{{ HTML::style('css/main.css'); }}
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>