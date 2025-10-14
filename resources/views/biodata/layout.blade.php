<!DOCTYPE html>
<html>
<head>
    <title>CRUD Biodata Laravel</title>
</head>
<body>
    <h1>CRUD Biodata</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</body>
</html>
