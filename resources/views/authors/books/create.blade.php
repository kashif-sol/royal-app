@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                <form method="POST" action="{{ route('book') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">author</label>
                        <div class="col-md-6">
                             <select name="author" required>
                                @foreach ($authors as $author)
                                    <option value="{{$author["id"]}}" >{{$author["first_name"]}} {{$author["last_name"]}}</option>
                                @endforeach
                             </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">description</label>
                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" value="" >
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="release_date" class="col-md-4 col-form-label text-md-end">release_date</label>
                        <div class="col-md-6">
                            <input id="release_date" type="date" class="form-control" name="release_date" value="" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="isbn" class="col-md-4 col-form-label text-md-end">isbn</label>
                        <div class="col-md-6">
                            <input id="isbn" type="text" class="form-control" name="isbn" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="format" class="col-md-4 col-form-label text-md-end">format</label>
                        <div class="col-md-6">
                            <input id="format" type="text" class="form-control" name="format" value="" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="number_of_pages" class="col-md-4 col-form-label text-md-end">number_of_pages</label>
                        <div class="col-md-6">
                            <input id="number_of_pages" type="number" class="form-control" name="number_of_pages" value="" >
                        </div>
                    </div>
                     
                    <input type="submit" value="create">
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
