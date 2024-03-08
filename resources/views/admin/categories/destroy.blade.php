<form data-value="{{$category->id}}" class="delete-form" action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('سيتم حذف هذا التصنيف نهائيا وسيختفي من كل الكتب !!')" type="submit" class="btn btn-danger btn-delete">حذف</button>
</form>