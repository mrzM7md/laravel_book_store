@extends('layouts.admin')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    عرض الأصناف
@endsection

@section('content')
<button onclick="showAddNewCat()" class="btn btn-primary"><i class="fas fa-plus"></i> أضف صنفًا جديدًا</button>
<div style="display: none" id="create-category">
    @include('admin.categories.create')
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>الاسم</th>
                </tr>
            </thead>

            <tbody>
                 @foreach ($categories as $category)
                    <tr id="tr-{{$category->id}}">
                        <td>
                            @include('admin.categories.edit', $category)
                            @include('admin.categories.destroy', $category)
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')


    <script>
        function showAddNewCat(){
            if (document.getElementById("create-category").style.display == "none")
                document.getElementById("create-category").style.display = "flex";
            else
                document.getElementById("create-category").style.display = "none";
        }
    </script>




    <script>
        $(function(){
            $('.category-name').on('keyup', function(){
                var data_id = $(this).attr('data-value');
                // alert(`btn-${data_id}`);
                document.getElementById(`${data_id}`).style.display = "flex";
            });
            });
    </script>
    

    <script>
            $('.update-form').on('submit', function(e) {
            e.preventDefault();
            var token = "{{ Session::token() }}";
            var thisForm = this;

            $.ajax({
                url: $(this).attr('action'),
                method: 'PATCH',
                token: token,
                data:$(this).serialize(),

                success: function(response) {
                    document.getElementById(thisForm.children[3].id).style.display = "none";
                    var labelElement = thisForm.previousElementSibling.textContent = response.name;
                    // toastr.success('تمت عملية التقييم بنجاح');
                },
                error: function() {
                    // toastr.error('حدث خطأ ما !!');
                    toastr.error('حدث خطأ ما');
                    // هنا يمكنك التعامل مع أي أخطاء تحدث أثناء الطلب
                }
            });
        });
    </script>
    
    <script>
            $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            var token = "{{ Session::token() }}";
            var thisForm = this;

            $.ajax({
                url: $(this).attr('action'),
                method: 'DELETE',
                token: token,
                data:$(this).serialize(),
                success: function(response) {
                    
                    // var tr_id = document.getElementById(thisForm.id);
                    // alert(tr_id);
                    // document.getElementById(`tr-${tr_id}`).style.display = "none";
                //    alert(thisForm.previousElementSibling.id);
                    // thisForm.previousElementSibling.style.display = "none"; // Gets the previous sibling element of the form
                    thisForm.parentNode.parentNode.remove();

                },
                error: function() {
                    // toastr.error('حدث خطأ ما !!');
                    toastr.error('حدث خطأ ما');
                    // هنا يمكنك التعامل مع أي أخطاء تحدث أثناء الطلب
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