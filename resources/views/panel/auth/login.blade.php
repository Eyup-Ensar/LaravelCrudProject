<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Giriş</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- CSS dosyasını belirt -->
</head>
<body>
    @if (App::getLocale()==='tr')
    <a class="nav-link" href="/dilDegistir">İngilizce</a>
    @else
        <a class="nav-link" href="/dilDegistir">Turkish</a>
    @endif
    <div class="login-container">
        <h1>{{__('project.panelgiris')}}</h1>
        
        <!-- Giriş Formu -->
        <form action="{{ route('panel.login') }}" method="POST">
            @csrf

            <!-- Kullanıcı Adı -->
            <div>
                <label for="kulad">{{__('project.kulad')}}</label>
                <input type="text" name="kulad" id="kulad" required autofocus>
            </div>

            <!-- Şifre -->
            <div>
                <label for="password">{{__('project.sifre')}}</label>
                <input type="password" name="password" id="password" required>
            </div>

            <!-- Hata Mesajı -->
            @if(session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Giriş Butonu -->
            <div>
                <button type="submit">{{__('project.giris')}}</button>
            </div>
        </form>

        <!-- Kayıt Linki -->
        <p>{{__('project.hesapyokmu')}} <a href="{{ route('panel.registerForm') }}">{{__('project.kayit')}}</a></p>
    </div>

</body>
</html>