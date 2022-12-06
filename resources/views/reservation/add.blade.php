@extends('reservation.layout')

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

        <h5 class="card-title fw-bolder mb-3">Tambah Reservation</h5>

        <form method="post" action="{{ route('reservation.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Reservation</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="owner_id" class="form-label">ID Owner</label>
                <input type="text" class="form-control" id="owner_id" name="owner_id">
            </div>
            <div class="mb-3">
                <label for="pet_id" class="form-label">ID Pet</label>
                <input type="text" class="form-control" id="pet_id" name="pet_id">
            </div>
            <div class="mb-3">
                <label for="additional_service" class="form-label">Additional Service</label>
                <input type="text" class="form-control" id="additional_service" name="additional_service">
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <input type="text" class="form-control" id="notes" name="notes">
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="text" class="form-control" id="start_time" name="start_time">
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="text" class="form-control" id="end_time" name="end_time">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop


