    <div class="card-body">
        <form action="{{ route('admin.categories.index') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">اسم الصنف</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> 


            <div class="form-group row mb-0">
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">أضف</button>
                </div>
            </div>
        </form>
    </div>
