@section('category_error')

@if ($errors->any())
    <small style="color:red;">Поле не может быть пустым!</small>
@endif

@endsection