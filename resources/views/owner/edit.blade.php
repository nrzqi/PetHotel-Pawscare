@extends('owner.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Owner</h5>

        <form method="post" action="{{ route('owner.update', $data->id) }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Owner</label>
                <input type="text" class="form-control" id="id" name="id" value="{{old('id',$data->id)}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Owner</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$data->name)}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{old('email',$data->email)}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone',$data->phone)}}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>

@stop



