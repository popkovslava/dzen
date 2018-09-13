
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<p>Your Name :{{$firstName}} {{$lastName}}</p>
<p>Your Email:    {{$email}}</p>

@if($phone)
<p>Your Phone:{{$phone}}</p>
@endif

@if($yourPosition)
<p>Your Role:{{$yourPosition}}</p>
@endif

@if($company)
    <p>Your company:{{$company}}</p>
@endif

@if($url)
    <p>Your website URL:{{$url}}</p>
@endif

@if($messages)
<p>Your Messages:{{$messages}}</p>
@endif


<h3>Please look out from next email from us</h3>

<h3> Best regards,</h3>
<h3> Dzensoft team</h3>
</body>
</html>