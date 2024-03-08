<label>{{$author->name}} - يمتلك - {{ count($author->books) }} - كتب</label>
<form class="update-form col-12 row " data-id="submit-{{$author}}" method="POST" action="{{route('admin.authors.update', $author)}}">
    @csrf
    @method('PATCH')
    <input class="form-control author-name" data-value="{{$author->id}}" value="{{$author->name}}" type="text" name="name">
    <button id="{{$author->id}}" style="display:none" type="submit" class="btn btn-primary btn-update ">تعديل</button>
</form>