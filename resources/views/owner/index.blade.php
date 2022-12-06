@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard Pet Hotel') }}</div> -->

                <div class="card-body">
                <h4 class="mt-2">Data Owner</h4>
            <a href="{{ route('owner.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
                <div class="row g-3 align-items-center mt-1">
                    <div class="col-auto">
                        <label for="search" class="col-form-label">Search</label>
                    </div>
                    <div class="col-auto">
                        <form action="/owner" method="GET">
                        <input type="search" id="Search" name="search" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    </div>

                @if($message = Session::get('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <table class="table table-hover mt-2">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    <a href="{{ route('owner.edit', $data->id) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapusModal{{ $data->owner_id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('owner.delete', $data->id) }}">
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
                        {{-- <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>test</td>
                            <td>
                                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                    Hapus
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="button" class="btn btn-primary">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
    </div>
</div>
        

@stop




