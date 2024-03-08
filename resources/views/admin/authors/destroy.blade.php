<form data-value="{{$author->id}}" class="delete-form" action="{{route('admin.authors.destroy', $author->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('سيتم حذف هذا المؤلف نهائيا وسيختفي من كل الكتب !!')" type="submit" class="btn btn-danger btn-delete">حذف</button>
</form>