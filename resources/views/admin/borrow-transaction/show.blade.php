@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif


        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card" style="min-height: 100%">
                    <img src="{{ asset( 'storage/' .  $transaction->book->cover_url) }}" class="card-img-top border-bottom" alt="cover">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $transaction->book->title }}</h5>
                        <div class="d-flex flex-column">
                            <div><span class="fw-bold">Tahun :</span> {{ $transaction->book->year }}</div>
                            <div><span class="fw-bold">Penulis :</span> {{ $transaction->book->author }}</div>
                            <div><span class="fw-bold">Penerbit :</span> {{ $transaction->book->publisher }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-9">
                <div class="card">
                    <div class="card-header">Detail Peminjaman</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <table class="w-100 mb-3">
                                <tbody>
                                <tr>
                                    <td width="20%">Kode Peminjaman</td>
                                    <td width="2%">:</td>
                                    <td>{{ $transaction->code }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $transaction->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td>{{ $transaction->user->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengambilan</td>
                                    <td>:</td>
                                    <td>{{ $transaction->borrowed_at ?  date('d-m-Y', strtotime($transaction->borrowed_at)) : date('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Kode Buku</td>
                                    <td>:</td>
                                    <td>
                                        @if($transaction->stock_code)
                                            {{ $transaction->stock_code }}
                                        @else
                                            <select name="stock_id" class="form-control select2">
                                                @foreach($transaction->book->stocks as $stock)
                                                    <option value="{{ $stock->id }}">{{ $stock->code }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                </tr>
                                @if($transaction->stock_code)
                                    <tr>
                                        <td>Tanggal Pengembalian</td>
                                        <td>:</td>
                                        <td>
                                            @if($transaction->returned_at)
                                                {{ date('d-m-Y', strtotime($transaction->returned_at)) }}
                                            @else
                                                <input name="returned_at" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            @if (!$transaction->returned_at)
                                @if($transaction->stock_code)
                                    <button class="btn btn-primary" formaction="{{ route('admin.borrow-transactions.return', $transaction->id) }}">Konfirmasi Pengembalian</button>
                                @else
                                    <button class="btn btn-primary" formaction="{{ route('admin.borrow-transactions.borrow', $transaction->id) }}">Konfirmasi Peminjaman</button>
                                @endif
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
