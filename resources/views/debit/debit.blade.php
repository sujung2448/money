@extends('layouts.master')

@section('section')
    <section class="w-2/3 mx-auto mt-20">
        <form action="{{route('debit.store')}}" method="post" id="debitForm">
            @csrf
            {{-- @method('get') --}}
            <table class=" w-full table-bordered text-white" style="font-family:Gothic A1; font-size:20px; background-color:#263343;">
                <div class="mb-2 flex " style="font-family:Gothic A1;">  
                    <a href="{{route('debit.list')}}">
                    <button type="button" class="btn btn-secondary btn-sm">신청내역</button></a>
                </div>
                <tr>
                    <th class="w-1/4 p-2 text-center">환전계좌정보</th>
                    <th class="pl-3">{{auth()->user()->bank}} {{auth()->user()->account}}</th>
                </tr>
                <tr>
                    <th class="w-1/4 p-2 text-center">환전금액</th>
                    <th class="w-3/4 pl-3 text-left">
                        <input type="text"  min="10000" max="3000000" value="0" name="inputMoney" id="inputMoney" size="12" class="text-black px-1"> 원 
                        <button type="button" data-money="10000" class="btn btn-secondary btn-money btn-sm">10,000</button>
                        <button type="button" data-money="50000" class="btn btn-secondary btn-money btn-sm">50,000</button>
                        <button type="button" data-money="100000" class="btn btn-secondary btn-money btn-sm">100,000</button>    
                        <button type="button" data-money="500000" class="btn btn-secondary btn-money btn-sm">500,000</button>
                        <button type="button" data-money="1000000" class="btn btn-secondary btn-money btn-sm">1,000,000</button>
                        <button type="button" data-money="3000000" class="btn btn-secondary btn-money btn-sm">3,000,000</button>
                        <button type="reset"  class="btn btn-secondary btn-reset btn-sm">초기화</button>
                    </th>
                </tr>    
              </table>  
            <p class="mt-10 flex justify-center" style="font-family:Gothic A1;">
                <span onclick="checkInputMoney()" class="btn px-4 py-1 bg-white text-2xl text-black  rounded">환전신청</span>
                
            </p>
        
        
        </form>                  
                
        
    </section>
    

    {{-- // 숫자버튼 입력 --}}
    <script>
        $('.btn-money').click(function (e) {
            e.preventDefault();
            let money = parseInt($(this).data('money'))
            let inputMoney = parseInt($('#inputMoney').val() || 0)
            money = money + inputMoney;
            money = (money > 3000000) ? 3000000 : money;
            $('#inputMoney').val(money)
        });

        $('.btn-reset').click(function (e) {
            e.preventDefault();
            $('#inputMoney').val(0)
        });
        // console.log(btns)
        

        // 숫자 콤마사용
        // const input = document.querySelector('#inputMoney');
        // input.addEventListener('keyup', function(e) {
        // let value = e.target.value;
        // value = Number(value.replaceAll(',', ''));
        // if(isNaN(value)) {         //NaN인지 판별
        //     input.value = 0;   
        // }else {                   //NaN이 아닌 경우
        //     const formatValue = value.toLocaleString('ko-KR');
        //     input.value = formatValue;
        // }
        // })
        
        
        // 만원단위사용
        
        
        function checkInputMoney(){
            let inputMoney = parseInt($('#inputMoney').val() || 0)
            if(inputMoney == 0 || inputMoney%10000 > 0){
                // alert('충전금액은 만원단위로입력해주세요')
                // Swal.fire({
                //     title: 'Error!',
                //     text: 'Do you want to continue',
                //     icon: 'error',
                //     confirmButtonText: 'Cool'
                // })
                toastr.error('환전신청은 "만원단위"로 가능합니다.', '환전금액확인!!')
                return;
            }else{
                Swal.fire({
                    title: '환전신청',
                    text: "해당금액을 환전하시겠습니까?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '확인',
                    cancelButtonText: '취소',
                }).then(result => {
                    if (result.value) {
                        $('#debitForm').submit()
                    } 
                })
            }
        }

    </script>

   
@endsection