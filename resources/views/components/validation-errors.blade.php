@if ($errors->any())
    <div style="color: red" {{ $attributes }} dir="rtl">
        <div class="font-medium text-red-600">{{ __('عذرًا! هناك خطأ ما.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
