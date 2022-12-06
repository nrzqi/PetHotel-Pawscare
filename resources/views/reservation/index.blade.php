@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard Pet Hotel') }}</div> -->

                <div class="card-body">

                <h4 class="mt-2">Data reservation</h4>
            <a href="{{ route('reservation.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
                <div class="row g-3 align-items-center mt-1">
                    <div class="col-auto">
                        <label for="search" class="col-form-label">Search</label>
                    </div>
                    <div class="col-auto">
                        <form action="/reservation" method="GET">
                        <input type="search" id="Search" name="search" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    </div>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-4 text-center align-middle">
    <thead>
      <tr>
        <th>No</th>
        <th>Owner ID</th>
        <th>Pet ID</th>
        <th>Additional Service</th>
        <th>Notes</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->owner_id }}</td>
                <td>{{ $data->pet_id }}</td>
                <td>{{ $data->additional_service }}</td>
                <td>{{ $data->notes }}</td>
                <td>{{ $data->start_time }}</td>
                <td>{{ $data->end_time }}</td>
                <td>
                    <a href="{{ route('reservation.edit', $data->id) }}" type="button" class="btn btn-warning rounded-3 mx-1 my-1">Ubah</a>

                 
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('reservation.delete', $data->id) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recycle{{ $data->id }}">
                        Recycle
                    </button>

                    <div class="modal fade" id="recycle{{ $data->id }}" tabindex="-1" aria-labelledby="recycleLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recycleLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('reservation.recycle', $data->id) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2 class="mt-4 fw-bold">Recycle</h2>



<table class="table table-hover mt-4 text-center align-middle">
    <thead>
      <tr>
        <th>No</th>
        <th>Owner ID</th>
        <th>Pet ID</th>
        <th>Additional Service</th>
        <th>Notes</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datasrecycle as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->owner_id }}</td>
                <td>{{ $data->pet_id }}</td>
                <td>{{ $data->additional_service }}</td>
                <td>{{ $data->notes }}</td>
                <td>{{ $data->start_time }}</td>
                <td>{{ $data->end_time }}</td>
                <td>

                    <a href="{{ route('reservation.restore', $data->id) }}" type="button" class="btn btn-secondary rounded-3">Restore</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>





                </div>
            </div>
        </div>
    </div>
</div>


@stop


