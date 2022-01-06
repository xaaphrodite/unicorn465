<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/unicorn465.css') }}">
    <title>unicorn465 | hidden service</title>
</head>

<body>
    <div class="unicorn_465">
        <img src="{{ asset('assets/img/unicorn465-mark.png') }}" alt="unicorn465">
        <form action="{{ route('CaptchaCompare') }}" method="POST">
            @csrf
            <img src="{{ asset('assets/img/CaptchaBG.JPG') }}" alt="">
            <br>
            <p class="captcha__number">{{ $captcha }}</p>
            <input type="text" class="captcha__field" name="user_captcha" placeholder="CAPTCHA">
            <input type="submit" name="" id="" value="submit">
        </form>
        @if (session()->has('unicorn465_captcha_error'))
            <span class="error__section">{{ session()->get('unicorn465_captcha_error') }}</span>
        @endif
    </div>
</body>

</html>
