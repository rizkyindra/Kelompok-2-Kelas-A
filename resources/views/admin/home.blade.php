@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a class="col-md-4 text-decoration-none" href="{{ route('admin.books.index') }}">
            <div class="card py-5 pointer card-hover">
                <div class="card-body fs-2 text-center">
                    Data Buku
                </div>
            </div>
        </a>

        <a class="col-md-4 text-decoration-none" href="{{ route('admin.borrow-transactions.index') }}">
            <div class="card py-5 pointer card-hover">
                <div class="card-body fs-2 text-center">
                    Data Peminjaman Buku
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
