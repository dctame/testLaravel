@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                            <form method="POST" action="{{ route('patchNews') }}" enctype="multipart/form-data">
                                <input type="hidden" name="new_id" value={{$news->id}} >

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>News Name:</label>
                                    <input type="text" name="title" class="form-control" value="{{$news->title}}">
                                </div>
                                <div class="form-group">
                                    <label>News Description:</label>
                                    <input type="text" name="description" class="form-control" value="{{$news->description}}">
                                </div>
                                <div class="form-group">
                                    <label>News text:</label>
                                    <input type="text" name="text" class="form-control" value="{{$news->text}}">
                                </div>
                                <div class="form-group">
                                    <label>News author name:</label>
                                    <input type="text" name="author_name" class="form-control" value="{{$news->author_name}}">
                                </div>
                                <div class="form-group">
                                    <label>News Category:</label>
                                    <select name="category_id">
                                        @foreach ($categories as $category)
                                            <option value={{ $category->id }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>News status:</label>
                                    <select name="status">
                                        @foreach ($statuses as $status)
                                            <option value={{ $status->id }}>{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>News Img:</label>
                                    <input type="file" name="img" >
                                </div>
                                <div class="form-group">
                                    <button>Submit</button>
                                </div>

                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
