@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>birthday</th>
                        <th>gender</th>
                        <th>place_of_birth</th>
                         
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $author['first_name'] }}</td>
                        <td>{{ $author['last_name'] }}</td>
                        <td>{{ $author['birthday'] }}</td>
                        <td>{{ $author['gender'] }}</td>
                        <td>{{ $author['place_of_birth'] }}</td>
                         
                        @empty($author['books'])
                        <td><a href="#">DELETE</a></td>
                    @endempty
                    </tr>
                </tbody>
            </table>
             
            @if(!empty($author['books']))
            <h2>BOOKS</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>release_date</th>
                        <th>description</th>
                        <th>isbn</th>
                        <th>number_of_pages</th>
                         
                    </tr>
                </thead>
                <tbody>
                    @foreach ($author['books'] as $title)
                    <tr>
                        <td>{{ $title['title'] }}</td>
                        <td>{{ $title['release_date'] }}</td>
                        <td>{{ $title['description'] }}</td>
                        <td>{{ $title['isbn'] }}</td>
                        <td>{{ $title   ['number_of_pages'] }}</td> 
                        <td><a href="#">DELETE</a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection