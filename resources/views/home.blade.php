<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <p>
            <a href="/panel">{{__('project.panel')}}</a>
            @if (App::getLocale()==='tr')
                <a class="nav-link" href="/dilDegistir">İngilizce</a>
            @else
                <a class="nav-link" href="/dilDegistir">Turkish</a>
            @endif
        </p>
        
        <h1>{{__('project.anasayfa')}}</h1> 
        <table style="border: 1px solid black">
            <tr>
                <th style="border: 1px solid black">Id</th>
                <th style="border: 1px solid black">{{__('project.ad')}}</th>
                <th style="border: 1px solid black">{{__('project.fiyat')}}</th>
                <th style="border: 1px solid black">{{__('project.aciklama')}}</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td style="border: 1px solid black">{{$product->id}}</td>
                    <td style="border: 1px solid black">{{$product->ad}}</td>
                    <td style="border: 1px solid black">{{$product->fiyat}}</td>
                    <td style="border: 1px solid black">{{$product->description}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

</body>
</html>