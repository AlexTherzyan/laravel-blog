@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить пользователя

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меняем Пользователя</h3>
                </div>

                @include('admin.errors')

                {!! Form::open(['route' => ['users.update' , $user->id ], 'method' => 'put', 'files' => true] ) !!}
                    <div class="box-body">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>

                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->name}}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>

                                <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->email}}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Пароль</label>

                                <input name="password"  type="password" class="form-control" id="exampleInputEmail1" placeholder="" >

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Аватар</label>

                                <img width="200" src="{{$user->getAvatar()}}" class="img-responsive" alt="">
                                <label for="exampleInputFile">Аватар</label>
                                <input name="avatar" type="file" id="exampleInputFile">

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
                        <button class="btn btn-warning pull-right">Изменить</button>
                    </div>
                    <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
