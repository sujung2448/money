@extends('layouts.master')

@section('section')
<section class="w-2/3 mx-auto mt-20">
    <form id="creditListForm" action="{{route('credit.mass-delete')}}" method="post">
        @method('delete')
        @csrf  
        <div class="w-full mt-8">
            <table class="table text-white table-bordered" style="font-family:Gothic A1; background-color:#263343;">
                <div class="mb-2 flex " style="font-family:Gothic A1;">  
                    <a href="{{route('credit.credit')}}">
                    <button type="button" class="btn btn-secondary btn-sm">충전신청</button></a>
                </div>
                <thead>
                    <tr class="">
                        <th class="w-1/8 text-center "> 
                            <input type="checkbox" id="checkAll">
                        </th>
                        <th class="w-2/8 text-center">날짜</th>
                        <th class="w-3/8 text-center">신청금액</th>
                        <th class="w-1/8 text-center">처리상태</th>
                        <th class=""></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($credits as $credit)
                    <tr class="">
                        <td class="w-1/8 text-center">
                            <input type="checkbox" name="chk[]" class="chkbox" value="{{$credit->id}}">
                        </td>
                        <td class="w-2/8 text-center">{{$credit->created_at->format('Y-m-d H:i:s')}}</td>
                        <td class="w-3/8 text-right">{{number_format($credit->amount)}}</td>
                        <td class="w-1/8 text-center">
                            @if($credit->status == 1)
                                <span class="badge badge-success px-2">완료</span>
                            @elseif($credit->status == 2)    
                                <span class="badge badge-danger px-2">취소</span>
                            @else
                                <span class="badge badge-primary px-2">대기</span>
                            @endif       
                        </td>
                        <td class="w-1/8 text-center">
                            <span class="" onclick="DeleteItem({{$credit->id}})" style="cursor:pointer">
                                <i class="fa-solid fa-trash-can"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-2 flex " style="font-family:Gothic A1;">  
                <button type="button" class="btn btn-secondary btn-sm" onclick="checkDelete()">선택삭제</button>
            </div>                    
        </div>
    </form>

    <form id="deleteForm" action="{{route('credit.delete')}}" method="post">
        @method('delete')
        @csrf 
        <input type="hidden" name="id" id="deleteId" value="">
    </form>

    <div class="flex justify-center mt-10">
    {{ $credits->links() }}  
    </div>  
</section>



{{-- 체크박스 전체선택/전체해제 --}}
<script type="text/javascript">
    $(document).ready(function() {
        $("#checkAll").click(function() {
            if($("#checkAll").is(":checked")) $(".chkbox").prop("checked", true);
            else $(".chkbox").prop("checked", false);
        });
        
        $(".chkbox").click(function() {
            var total = $(".chkbox").length;
            var checked = $(".chkbox:checked").length;
            
            if(total != checked) $("#checkAll").prop("checked", false);
            else $("#checkAll").prop("checked", true); 
        });
    });

    // 선택삭제
    function checkDelete(){
        console.log($(".chkbox:checked").length)
        if($(".chkbox:checked").length === 0){        //왼쪽 변수와 우측 변수의 값과 데이터형이 같으면
            toastr.error('선택된 내역이 없습니다.', '선택확인')
            return;
        }
        $('#creditListForm').submit();
    }

    // 개별삭제
    function DeleteItem(id){
        console.log(id)
        $('#deleteId').val(id)
        $('#deleteForm').submit();
    }

</script>     
@endsection