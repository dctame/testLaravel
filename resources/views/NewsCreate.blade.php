@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('putNews') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>News Name:</label>
                            <input type="text" name="title" class="form-control" placeholder="title">
                        </div>
                        <div class="form-group">
                            <label>News Description:</label>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label>News text:</label>
                            <input type="text" name="text" class="form-control" placeholder="Text">
                        </div>
                        <div class="form-group">
                            <label>News author name:</label>
                            <input type="text" name="author_name" class="form-control" placeholder="Author name">
                        </div>
                        <div class="form-group">
                            <label>News Category:</label>
                            <select name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>News status:</label>
                            <select name="status">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>News Img:</label>
                            <input type="file" name="img">
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
