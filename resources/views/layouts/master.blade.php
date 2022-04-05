<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>@yield('title', 'VETWORLD')</title>
    <script src="https://kit.fontawesome.com/028bc43324.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/master.js')}}" defer></script>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body>
@section('header')
    <nav class="navbar">
        <div class="navbar_logo">
            <i class="fas fa-user-secret"></i>
            <a href="{{route('home')}}">VetWorld</a>
        </div>

        <ul class="navbar_item">
            
        @guest()  
            <li><a href="{{route('auth.register.index')}}">회원가입</a></li>
            <li><a href="{{route('auth.login.index')}}">로그인</a></li>
        @endguest  
        @auth()
            <li><a href="{{route('credit.credit')}}">충전신청</a></li>
            <li><a href="{{route('debit.debit')}}">환전신청</a></li>
            <li><a href="#">보유금액</a></li>
            <div class=""style="display:flex; align-items:center; font-size:24px; color:orange; font-family:Gothic A1;">{{number_format(auth()->user()->balance)}}</div>
            <div class=""style="padding-right:20px; display:flex; align-items:center; font-family:Gothic A1;">원</div>
            <div class=""style="display:flex; align-items:center; font-size:24px; color:orange; font-family:Gothic A1;">{{auth()->user()->name}}</div>
            <div class=""style="padding-left:5px; display:flex; align-items:center; font-family:Gothic A1;">님</div>
            <li><form action="/auth/logout" method="post" class="inline-block">
                @csrf
                <a href="{{route('auth.logout')}}"><button class="">로그아웃</button></a>
            </form></li>
        @endauth
        </ul>    
            <a href="#" class="navbar_toogleBtn">
            <i class="fas fa-bars"></i>
            </a>
    </nav>   


         

@show
@section('section')
@show        
</body>
</html>






