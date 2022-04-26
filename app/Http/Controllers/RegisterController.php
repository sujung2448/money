<?php

namespace App\Http\Controllers;

use DB;
use Str;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Library\CommonLibrary;


class RegisterController extends Controller
{
   public $recommendCode;
   public $autoLogin;



    public function index(){

        $banks = DB::table('banks')
                ->get()->pluck('name')
                ->toArray();
        sort($banks);  //은행정보는 seeder로 따로 만듬.
            // dd($banks);
        
        return view('auth.register',[
            'banks' => $banks,
        ]);
    }

    public function store(Request $request, User $user){
        
        // dd($request->all());
        $validation = $request -> validate([
            'name' => ['required','regex:/^[ㄱ-ㅎ|가-힣|a-z|A-Z|]+$/'], 
            'email' => 'required|unique:users',
            'bank' => 'required',
            'account' => ['nullable', 'regex:/^[0-9.·-]+$/'],
            'account_name' => 'required',
            'password' => ['required','confirmed','min:4'],
            'code' => 'nullable',
        ]);    
        // dd($user);
        // 개인코드 회원가입시 자동생성
        $CommonLibrary = new CommonLibrary;
        $personal_code = $CommonLibrary::createPersonalCode();
        
        // 추천인코드 매칭하기
        try {
            $validation['code'] = $validation['code'] ? $validation['code'] : '123SSS';
            $codeUser = User::where('personal_code', $validation['code']) -> first();
            $user->recommend_id = $codeUser->id;
            $user->code = $codeUser->personal_code;
            // dd($codeUser);
            if($codeUser->status != 2){
                throw new Exception("사용할수 없는 추천코드입니다.코드를 확인해주세요");
            }
            
            // $user = new User();
            $user -> name = $validation['name']; 
            $user -> email = $validation['email'];
            $user -> bank = $validation['bank'];
            $user -> account = $validation['account'];
            $user -> account_name = $validation['account_name'];
            $user -> password = Hash::make($validation['password']);
            // $user -> code = Str::upper($validation['code']);
            $user -> personal_code = $personal_code;
            // $user -> recommend_id = $codeUser->id;
            
            $user -> save();
            
            // if($this->autoLogin){
            //     $loginInfo = $request->only(['email', 'password']);
            //     if(auth()->attempt($loginInfo)){
            //         return redirect()->route('home');
            //     }
            // }
            toastr()->success('가입이 완료되었습니다.');
        
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
        }

        return redirect() -> route('home');
    }
        
}
        
