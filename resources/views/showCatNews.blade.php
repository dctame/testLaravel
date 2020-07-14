@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title m-b-md">
            News in category
        </div>
        <table border="1" >

            <tr>
                <td>
                    Image
                </td>
                <td>
                    Title
                </td>
                <td>
                    Description
                </td>
                <td>
                    Category
                </td>

            @foreach ($news as $newsItem)
                <tr>
                    <td><img src={{ asset($newsItem->img)}} alt="category" height="100" width="100">
                    </td>
                    <td>

                        <a href="{{route('showNewsItem', [$newsItem->id])}}">{{ $newsItem->title }}</a>
                    </td>
                    <td>
                        {{$newsItem->description}}
                    </td>
                    <td>
                        {{$catwgoryName}}
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
