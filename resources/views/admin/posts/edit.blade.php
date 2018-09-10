@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            {{ Form::open([
                'route' => ['posts.update', $post->id],
                'files' => true,
                'method' => 'put'

            ]) }}

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="Как изучить Laravel создавая Блог?">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->getImage() }}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input name="image" type="file" id="exampleInputFile">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select(
                             'category_id',
                              $categories,
                              $post->getCategoryID(),
                              ['class' => 'control select2', 'style' => 'width: 100%']) }}

                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                                {{Form::select(
                             'tags[]',
                              $tags,
                              $selectedTags,
                              ['class' => 'control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите теги', 'style' => 'width: 100%']) }}

                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
<<<<<<< HEAD
                                <input name="date" type="text" class="form-control pull-right" id="datepicker" value="{{$post->date}}">
=======
                                <input type="text" class="form-control pull-right" id="datepicker" value="08/29/2017">
>>>>>>> 7f247987a1e1fdab82e79257e5a96c2bd1c6a3f7
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
<<<<<<< HEAD
                                {{Form::checkbox('is_featured', '1', $post->is_featured, ['class' => 'minimal'])}}
=======
                                <input type="checkbox" class="minimal" checked>
>>>>>>> 7f247987a1e1fdab82e79257e5a96c2bd1c6a3f7
                            </label>
                            <label>
                                Рекомендовать
                            </label>
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
<<<<<<< HEAD
                                {{Form::checkbox('status', '1', $post->status, ['class' => 'minimal'])}}
=======
                                <input type="checkbox" class="minimal">
>>>>>>> 7f247987a1e1fdab82e79257e5a96c2bd1c6a3f7
                            </label>
                            <label>
                                Черновик
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
<<<<<<< HEAD
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">
                                {{$post->content}}
                            </textarea>
=======
                            <textarea name="" id="" cols="30" rows="10" class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum omnis error quae dicta quidem illo atque quisquam a enim accusantium molestias iste, consectetur voluptas reiciendis impedit doloribus ea mollitia, excepturi commodi ipsam aperiam, itaque explicabo.

Et dolore, unde non quod sint, blanditiis doloribus corporis quibusdam tempora commodi itaque cumque, velit officiis assumenda eveniet sed ad. Impedit voluptatibus excepturi ipsa, quidem architecto nulla, explicabo, ex eius quo nesciunt tempore dicta fugiat suscipit ipsum alias iste, vel consequatur optio libero doloremque fuga voluptas nam deleniti sint? Omnis vero voluptatum esse reiciendis veniam, animi quasi assumenda, delectus ut labore culpa pariatur fuga.

Est suscipit praesentium nihil, aliquid dolore minus, cupiditate natus ipsa magni consequatur animi nisi necessitatibus repellendus, incidunt eveniet atque facere, asperiores quos iste quam debitis eaque reiciendis. Iusto rem laudantium, laboriosam in similique maxime nulla eos, voluptatum sint optio esse dolorem ducimus saepe architecto repellendus. Incidunt cumque aliquam porro et eos?
              </textarea>
>>>>>>> 7f247987a1e1fdab82e79257e5a96c2bd1c6a3f7
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('posts.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
