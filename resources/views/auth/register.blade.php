@extends('layouts.master')

@section('section')
    <div class="w-2/3 mx-auto mt-10 text-white">
        <form action="/auth/register" method="post" class="w-1/2 mx-auto">
            @csrf
            <p>
                <div class="form-group pb-1">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="이름">
                @error('name')
                    <b class="text-danger">{{$message}}</b>
                @enderror
                </div>
                <div class="form-group pb-1">
                    <label for="email" >Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                @error('email')
                    <b class="text-danger">{{$message}}</b>
                @enderror
                </div>       
                <div class="form-group pb-1 ">
                    <label for="bank">Bank</label>
                    <select name="bank" class="form-control text-black" id="bank">
                        @foreach ($banks as $bank)
                            <option value="{{ $bank }}">{{ $bank }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group pb-1">
                    <label for="account">Account</label>
                    <input type="text" class="form-control" id="account" name="account" placeholder="계좌번호">
                @error('account')
                    <b class="text-danger">{{$message}}</b>
                @enderror
                </div>
                <div class="form-group pb-1">
                    <label for="account_name">Account_Name</label>
                    <input type="text" class="form-control" id="account_name" name="account_name" placeholder="예금주">
                </div>
                <div class="form-group pb-1">    
                    <label for="password" >Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호">
                </div>       
                <div class="form-group pb-1">
                    <label for="password_confirmation">Password Confirm</label>
                    <input type="password" class="form-control" id="password_confirmation" 
                           name="password_confirmation" placeholder="비밀번호 확인">
                @error('password')
                    <b class="text-danger">{{$message}}</b>
                @enderror
                </div>       
                <div class="form-group pb-1">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="추천코드">
                </div>
                <ul class="join_item">
                  <li><input type="submit" value="가입"></li>
                  <li><input type="button" onclick="window.location.href = '{{route('home')}}'" value="취소"></li>
                </ul>      
            </p>    
        </form>        
    </div>
@endsection

    
