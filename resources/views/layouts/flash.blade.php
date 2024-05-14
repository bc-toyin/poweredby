@if($errors->any())
    {!! implode('', $errors->all('<div class="bg-red-500 text-white px-3 py-2 mb-2">:message</div>')) !!}
@endif

@if(session('message'))
    <div class="bg-green-500 text-white px-3 py-2 mb-2">{{ session('message') }}</div>
@endif
