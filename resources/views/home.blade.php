@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header mt-1">{{ __('Dashboard Pet Hotel') }}</div> -->

                <!-- <div class="card-body">
                <h4 class="mt-2">Firstly, fill your data</h4>
                <a href="{{ route('owner.index') }}" type="button" class="btn btn-success rounded-3">Owner Data</a>
                <h4 class="mt-2">Add your pet's data here</h4>
                <a href="{{ route('pet.index') }}" type="button" class="btn btn-success rounded-3">Pet Data</a>
                <h4 class="mt-2">Make reservation now</h4>
                <a href="{{ route('reservation.index') }}" type="button" class="btn btn-success rounded-3">Reservation Data</a>   -->
        
                <h2 class="mt-4 mb-4 fw-bold text-center">PAWSCARE </h2>
                <a href="{{ route('owner.index') }}" type="button" class="btn btn-primary rounded-1 btn-block">Owner Data</a>
                <a href="{{ route('pet.index') }}" type="button" class="btn btn-success rounded-1 btn-block mt-2">Pet Data</a>
                <a href="{{ route('reservation.index') }}" type="button" class="btn btn-dark rounded-1 btn-block mt-2 mb-4">Reservation Data</a>
                
                <!-- <h4 class="mt-4">Pawscare </h4>
                <div class="container">
                <div class="row">
                    <div class="col-md-auto">
                    <form>
                        <a href="{{ route('owner.index') }}" type="button" class="btn btn-primary rounded-3">Owner</a>
                    </form>
                    </div>
                    <div class="col-md-auto">
                    <form>
                        <a href="{{ route('pet.index') }}" type="button" class="btn btn-primary rounded-3"> Pet </a>
                    </form>
                    </div>
                    <div class="col-md-auto">
                    <form>
                        <a href="{{ route('reservation.index') }}" type="button" class="btn btn-primary rounded-3">Reservation</a>
                    </form>
                    </div>
                </div>
                </div> -->


                <!-- <h4 class="mt-4">Pawscare </h4>
                <div class="container">
                <div class="row">
                    <div class="col-md-auto">
                    <button type="button" class="btn btn-info .btn-block">
                        <a href="{{ route('owner.index') }}" style="color:inherit">Owner</a>
                    </button>
                    </div>
                    <div class="col-md-auto">
                    <button type="button" class="btn btn-info .btn-block">
                        <a href="{{ route('owner.index') }}">Pet</a>
                    </button>
                    </div>
                    <div class="col-md-auto">
                    <button type="button" class="btn btn-info .btn-block">
                        <a href="{{ route('owner.index') }}">Reservation</a>
                    </button>
                    </div>
                </div>
                </div>
                 -->
                
                <h4 class="mt-4 fw-bold">Reservation Detail</h4>
                <table class="table table-hover mt-2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Owner</th>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Additional Service</th>
                            <th>Notes</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->owner_id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->species }}</td>
                                    <td>{{ $data->additional_service }}</td>
                                    <td>{{ $data->notes }}</td>
                                    <td>{{ $data->start_time }}</td>
                                    <td>{{ $data->end_time }}</td>
                                </tr>
                            @endforeach
                    
                        </tbody>
                    </table>

                <!-- <form action="">
                <div class="input-group mt-3 mb-2">
                <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
                </form>

                <table class="table table-hover mt-4 text-center align-middle">
                    <thead>
                    <tr>
                    <th>No</th>
                        <th>Owner Name</th>
                        <th>Pet Name</th>
                        <th>Species</th>
                        <th>Additional Service</th>
                        <th>Notes</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->species }}</td>
                                <td>{{ $data->additional_service }}</td>
                                <td>{{ $data->notes }}</td>
                                <td>{{ $data->start_time }}</td>
                                <td>{{ $data->end_time }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> -->


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
