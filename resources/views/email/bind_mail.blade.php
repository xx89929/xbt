<html xmlns="http://www.w3.org/1999/html">
<body>
    <h1>尊敬的{{$username}}用户您好！</h1>
    <p>请点击以下链接绑定您的邮箱：</p>
    <p><a href="{{route('safe.vBEmail',['userId' => $userid,'email' => $email])}}">绑定邮箱</a></p>
</body>
</html>