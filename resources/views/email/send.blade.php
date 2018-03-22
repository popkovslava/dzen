<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<p>Name:{{$firstName}}</p>
<p>lastName:{{$lastName}}</p>
<p>Email: {{$email}}</p>
@if($phone)
<p>Phone:{{$phone}}</p>
@endif

@if($company)
    <p>Company:{{$company}}</p>
@endif

@if($url)
    <p>Website URL:{{$url}}</p>
@endif




@if($yourPosition)
<p>Role:{{$yourPosition}}</p>
@endif

@if($hearAboutUs)
    <p>Hear About Us:{{$hearAboutUs}}</p>
@endif


@if($messages)
<p>Messages:{{$messages}}</p>
@endif

</body>
</html>