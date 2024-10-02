<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
<div class="container">
    <div class="auth-links">
        @if(Auth::guard('panel')->check())
            <form action="{{ route('panel.auth.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">{{ __('project.cikis') }}</button>
            </form>
        @else
            <p><a href="{{ route('panel.loginForm') }}">{{ __('project.giris') }}</a></p>
            <p><a href="{{ route('panel.registerForm') }}">{{ __('project.kayit') }}</a></p>
        @endif |
        @if (App::getLocale()==='tr')
        <a class="nav-link" href="/dilDegistir">İngilizce</a>
        @else
            <a class="nav-link" href="/dilDegistir">Turkish</a>
        @endif |
        <a href="/panel/urunler/ekle">{{__('project.urunekle')}}</a>
    </div>
    <h1>{{__('project.urunler')}}</h1>
    <table style="border: 1px solid black">
        <tr>
            <th style="border: 1px solid black">Id</th>
            <th style="border: 1px solid black">{{__('project.ad')}}</th>
            <th style="border: 1px solid black">{{__('project.fiyat')}}</th>
            <th style="border: 1px solid black">{{__('project.aciklama')}}</th>
            <th style="border: 1px solid black">{{__('project.islemler')}}</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td style="border: 1px solid black">{{$product->id}}</td>
                <td style="border: 1px solid black">{{$product->ad}}</td>
                <td style="border: 1px solid black">{{$product->fiyat}}</td>
                <td style="border: 1px solid black">{{$product->description}}</td>
                <td style="border: 1px solid black">
                    <a href="urunler/guncelle/{{$product->id}}">{{__('project.guncelle')}}</a> |
                    <a href="urunler/sil/{{$product->id}}">{{__('project.sil')}}</a>
                </td style="border: 1px solid black">
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>