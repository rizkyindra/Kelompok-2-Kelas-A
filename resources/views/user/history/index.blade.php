@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form id="delete-form" action="" method="post" class="d-none">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
        </form>

        <div class="card">
            <div class="card-header">Riwayat Peminjaman Buku</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
