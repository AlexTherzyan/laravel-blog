
{{--@section('category_error')--}}

@if ($errors->any())

    @foreach ($errors->all() as $error)
        <small style="color:red;">{{ $error }}</small>
    @endforeach

@endif

{{--@stop--}}