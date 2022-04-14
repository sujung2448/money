@extends('layouts.master')

@section('section')
    <div class="w-2/3 mx-auto mt-16 text-white">
        <form action="/auth/login" method="post" class="w-1/2 mx-auto">
            @csrf
            <p>
                <div class="form-group">
                    <label for="email" >Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                @error('email')
                    <b class="text-danger">{{$message}}</b>
                @enderror
                </div>
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    <b class="text-danger">{{$message}}</b>
                @enderror
                </div>
            </p>
                <ul class="login_item">
                    <li><input type="submit" value="로그인"></li>
                    <li><input type="button" onclick="window.location.href = '{{route('home')}}'" value="취소"></li>
                </ul>
        </form>
    </div>
@endsection
