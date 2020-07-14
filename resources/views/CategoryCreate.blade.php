@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('putCat') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Category Description:</label>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label>Category Img:</label>
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
