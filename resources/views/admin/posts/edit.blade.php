@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Изменение статьи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title }}" name="title">
                        </div>

                        <div class="form-group">
                            <label for="description">Цитата</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $post->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Контент</label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $post->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                @foreach($categories as $k => $v)
                                    <option value="{{ $k }}" @if($k == $post->category_id) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Теги</label>
                            <select multiple="multiple" data-placeholder="Выберите теги"                                       style="width: 100%;" name="tags[]">
                                @foreach($tags as $k => $v)
                                    <option value="{{ $k }}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Изображение</label>
                            <input class="form-control-file" type="file" id="thumbnail" name="thumbnail">
                            <div>{{ $post->thumbnail }}</div>
                        </div>

                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
