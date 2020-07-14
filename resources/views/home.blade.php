@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <form action="{{ route('createCat') }}">
                            <input type="submit" value="create category"/>
                        </form>

                        <form action="{{ route('createNews') }}">
                            <input type="submit" value="create news"/>
                        </form>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($categories as $category)
                            <li><img src={{ asset($category->img)}} alt="category" height="100" width="100"><br><a
                                    href="{{route('editCat', [$category->id])}}">{{ $category->name }}</a></li>
                            <ul>
                                @foreach ($category->news as $news)
                                    <li><img src={{ asset($news->img)}} alt="category" height="100" width="100"><a
                                            href="{{route('editNews', [$news->id])}}"> {{ $news->title }}</a></li>
                                @endforeach
                            </ul>
                            </li>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
