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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                     
                        <tr>
                            <td>{{ $author['first_name'] }}</td>
                            <td>{{ $author['last_name'] }}</td>
                            <td>{{ $author['birthday'] }}</td>
                            <td>{{ $author['gender'] }}</td>
                            <td>{{ $author['place_of_birth'] }}</td>
                            <td><a href="/author/{{ $author['id'] }}">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection