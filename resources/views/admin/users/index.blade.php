@extends('layouts.admin')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .bg-delected-option {
        background-color: #222111;
        color: #face2f;
    }
</style>
@endsection

@section('heading')
عرض المستخدمين
@endsection

@section('content')
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>نوع المستخدم</th>
                    @superadmin
                    <th>تغيير الصلاحيات</th>
                    @endsuperadmin
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr id="tr-user-{{$user->id}}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td id="admName-{{$user->id}}">{{ $user->isSuperAdmin() ? 'مدير عام' : ($user->isAdmin() ? 'مدير' : 'مستخدم') }}</td>
                        
                        @superadmin
                        <td>
                            <form data-value="{{$user->id}}" class="change-level-form ml-4 form-inline" method="POST" action="{{ route('admin.users.update', $user->id) }}" style="display:inline-block">
                                @method('PATCH')
                                @csrf
                                <select {{ auth()->user() == $user ? 'disabled' : '' }} data-value="{{$user->id}}" id="selectId-{{$user->id}}" class="select-level form-control form-control-sm" name="administration_level">
                                    {{-- <option selected disabled>اختر نوعًا</option> --}}
                                    @switch($user->administration_level)
                                        @case($user->superAdmin())
                                            <option class="bg-delected-option" selected disabled value="{{$user->superAdmin()}}">مدير عام</option>
                                            <option value="{{$user->admin()}}">مدير</option>
                                            <option value="{{$user->user()}}">مستخدم</option>
                                            @break
                                        @case($user->admin())
                                            <option value="{{$user->superAdmin()}}">مدير عام</option>
                                            <option class="bg-delected-option" selected disabled value="{{$user->admin()}}">مدير</option>
                                            <option value="{{$user->user()}}">مستخدم</option>
                                            @break
                                        @default
                                        <option value="{{$user->superAdmin()}}">مدير عام</option>
                                        <option value="{{$user->admin()}}">مدير</option>
                                        <option class="bg-delected-option" selected disabled value="{{$user->user()}}">مستخدم</option>
                                    @endswitch
                                   </select>
                                <button id="btn-edit-{{$user->id}}" style="visibility: hidden" type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تأكيد</button> 
                            </form>

                            <form data-value="{{$user->id}}" class="delete-user-form" method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline-block">
                                @method('delete')
                                @csrf
                                @if (auth()->user() != $user)
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button> 
                                @else
                                    <div class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> حذف </div>
                                @endif
                            </form>
                        </td>
                        @endsuperadmin

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function(){
        $('.select-level').on('change', function(){
            
            var attrValue = $(this).attr('data-value')
            var btnEditId = 'btn-edit-' + attrValue;
            document.getElementById(btnEditId).style.visibility = "visible";
        });
        });
</script>


<script>
    $('.delete-user-form').on('submit', function(e) {
    e.preventDefault();
    var token = "{{ Session::token() }}";
    var attrValue = $(this).attr('data-value')

    var attrValue = $(this).attr('data-value')
    var trUserId = 'tr-user-' + attrValue;

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        method: 'DELETE',
        token: token,
        data:$(this).serialize(),
        success: function(response) {
            document.getElementById(trUserId).remove();
        }
            ,
        error: function() {
            toastr.error('حدث خطأ ما');
        }
    });
});        
</script>



<script>
    $('.change-level-form').on('submit', function(e) {
    e.preventDefault();
    var token = "{{ Session::token() }}";
    var thisForm = this;
    var attrValue = $(this).attr('data-value')
    var inputId = 'admName-'+attrValue;
    var btnEditId = 'btn-edit-' + attrValue;
    var selectId = 'selectId-'+attrValue

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        method: 'PATCH',
        token: token,
        data:$(this).serialize(),
        success: function(response) {
            var superAdmin = 0; var admin = 1; var user = 2;
            var administration_level = response.administration_level;
            var administration_name = response.administration_name;
        
            if (administration_level == superAdmin){
                $('#'+selectId).html( `
                    <option  class="bg-delected-option" selected disabled value="${superAdmin}">مدير عام</option>
                    <option value="${admin}">مدير</option>
                    <option value="${user}">مستخدم</option>
                    `);

                }
            else if(administration_level == admin){
                $('#'+selectId).html( `
                    <option value="${superAdmin}">مدير عام</option>
                    <option  class="bg-delected-option" selected disabled value="${admin}">مدير</option>
                    <option value="${user}">مستخدم</option>
                `);
            }
            else {
                $('#'+selectId).html( `
                        <option value="${superAdmin}">مدير عام</option>
                        <option value="${admin}">مدير</option>
                        <option  class="bg-delected-option" selected disabled value="${user}">مستخدم</option> 
                `);
            }
                
            document.getElementById(inputId).textContent = administration_name;
            document.getElementById(btnEditId).style.visibility = "hidden";

        },
        error: function() {
            toastr.error('حدث خطأ ما');
        }
    });
});        
</script>



<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#books-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
        });
    });
</script>
@endsection