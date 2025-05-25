<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password Anda</h1>
    <p>Klik link berikut untuk mengatur ulang password Anda:</p>
    <a href="{{ route('reset.password', ['token' => $token]) }}">Reset Password</a>
    <p>Link ini akan kadaluarsa dalam 24 jam.</p>
</body>
</html>