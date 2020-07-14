@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title m-b-md">
            {{ $newsItem->title }}
        </div>
        <table border="1" >

            <tr>
                <td>Image
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
                <td>
                    text
                </td>
                <td>
                    Author
                </td>
                <td>
                    Status
                </td>
                <td>
                    Views
                </td>
                <td>
                    Unic Users
                </td>

                <tr>
                    <td><img src={{ asset($newsItem->img)}} alt="category" height="100" width="100">
                    </td>
                    <td>

                        <a href="{{route('showCatNews', [$newsItem->id])}}">{{ $newsItem->title }}</a>
                    </td>
                    <td>
                        {{$newsItem->description}}
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        {{$newsItem->text}}
                    </td>
                    <td>
                        {{$newsItem->author_name}}
                    </td>
                    <td>
                        {{$status->name}}
                    </td>
                    <td>
                        Views
                        {{$newsItem->description}}
                    </td>
                    <td>
                        Unic Users
                        {{$newsItem->description}}
                    </td>

                </tr>
        </table>
        <table border="1" >
            <tr>
                <td>
                    views
                </td>
                <td>
                    {{$newsItem->views}}
                </td>
            </tr>
            <tr>
                <td>
                    unicUsers
                </td>
                <td>
                    {{$newsItem->unicUsers}}
                </td>
            </tr>
        </table>
    </div>
@endsection
