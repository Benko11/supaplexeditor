<!DOCTYPE html>
<html>
<head>
    <title>Supaplex Editor</title>
    <meta charset="utf-8">

	<link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div id="app">
        {{-- @yield('content') --}}
    </div>
    <select name="elements" id="elements">
        @foreach ($elements as $hex=>$element)
        <option value="{{$elements_images[$hex]}}">{{$element}}</option>
        @endforeach
    </select>
    
    <script src="js/app.js"></script>
    <script src="js/version.js"></script>
    <script src="js/objects.js"></script>
    <script src="js/editor.js"></script>
</body>
</html>