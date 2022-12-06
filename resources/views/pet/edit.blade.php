@extends('pet.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
    <div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Pet</h5>

        <form method="post" action="{{ route('pet.update', $data->id) }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Pet</label>
                <input type="text" class="form-control" id="id" name="id" value="{{old('id',$data->id)}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pet</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$data->name)}}">
            </div>
            <div class="mb-3">
                <label for="species" class="form-label">Spesies</label>
                <input type="text" class="form-control" id="species" name="species" value="{{old('species',$data->species)}}">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{old('birthdate',$data->birthdate)}}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>

@stop


