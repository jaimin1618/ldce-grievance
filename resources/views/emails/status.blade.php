
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Hello {{$name}}
    </h1>
    
    <h1>    
        your status is updated to {{$status}}
    </h1>
    {{-- @if(isset($message))
    <h3>
        return message : {{$message}}
    </h3>
    @endif --}}
</body>
</html>