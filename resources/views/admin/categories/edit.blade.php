<label>{{$category->name}} - يمتلك - {{ count($category->books) }} - كتب</label>
<form class="update-form col-12 row " data-id="submit-{{$category}}" method="POST" action="{{route('admin.categories.update', $category)}}">
    @csrf
    @method('PATCH')
    <input class="form-control category-name" data-value="{{$category->id}}" value="{{$category->name}}" type="text" name="name">
    <button id="{{$category->id}}" style="display:none" type="submit" class="btn btn-primary btn-update ">تعديل</button>
</form>