@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a class="col-md-4 text-decoration-none" href="{{ route('borrow-transactions.index') }}">
            <div class="card py-5 pointer card-hover">
                <div class="card-body fs-2 text-center">
                    Peminjaman Buku
                </div>
            </div>
        </a>

        <a class="col-md-4 text-decoration-none" href="https://bit.ly/HibahBukuHMTI" target="_blank">
            <div class="card py-5 pointer card-hover">
                <div class="card-body fs-2 text-center">
                    Hibah Buku
                </div>
            </div>
        </a>

        <a class="col-md-4 text-decoration-none" href="{{ route('histories.index') }}">
            <div class="card py-5 pointer card-hover">
                <div class="card-body fs-2 text-center">
                    Riwayat Peminjaman Buku
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
