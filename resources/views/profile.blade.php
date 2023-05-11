@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>email</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>gender</th>
                       
                         
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['first_name'] }}</td>
                        <td>{{ $user['last_name'] }}</td>
                        <td>{{ $user['gender'] }}</td>
                      
                         
                        @empty($author['books'])
                        <td><a href="#">DELETE</a></td>
                    @endempty
                    </tr>
                </tbody>
            </table>
             
           
        </div>
    </div>
</div>
@endsection