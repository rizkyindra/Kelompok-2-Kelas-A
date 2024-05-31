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

        <form id="borrow-form" action="{{ route('borrow-transactions.store') }}" method="post" class="d-none">
            <input type="hidden" name="book_id">
            @csrf
        </form>

        <div class="card">
            <div class="card-header">Peminjaman Buku</div>
            <div class="card-body">

{{--                <div class="row mb-0">--}}
{{--                    <label for="subject" class="col-md-3 col-form-label text-md-end">{{ __('Subject') }}</label>--}}

{{--                    <div class="col-md-7">--}}
{{--                        <select id="subject" name="subject" class="form-control select2 @error('subject') is-invalid @enderror" onchange="location = this.value;">--}}
{{--                            <option value=""></option>--}}
{{--                            @foreach($subjects as $key => $values)--}}
{{--                                <optgroup label="Semester {{ $key }}">--}}
{{--                                    @foreach($values as $subject)--}}
{{--                                        <option value="{{ route('borrow-transactions.index', ['subject_id' => $subject->id]) }}" @if ($subject_id == $subject->id) selected @endif>--}}
{{--                                            {{ $subject->name }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </optgroup>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row mb-0">
                    <label for="semester" class="col-md-3 col-form-label text-md-end">{{ __('Semester') }}</label>

                    <div class="col-md-7">
                        <select id="semester" name="semester" class="form-control select2 @error('semester') is-invalid @enderror" onchange="location = this.value;">
                            <option value=""></option>
                            @foreach($semesters as $smt)
                                <option value="{{ route('borrow-transactions.index', ['semester' => $smt]) }}" @if ($semester == $smt) selected @endif>
                                    Semester {{ $smt }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if(count($books) > 0)
                    <hr>
                    <div class="row mt-4">
                        @foreach($books as $book)
                        <div class="col-3 mb-4">
                            <div class="card" style="min-height: 100%">
                                <img src="{{ asset( 'storage/' . $book->cover_url)  }}" class="card-img-top border-bottom" alt="cover">
                                <div class="card-body">
                                    <h5 class="fw-bold">{{ $book->title }}</h5>
                                    <div class="d-flex flex-column">
                                        <div><span class="fw-bold">Tahun :</span> {{ $book->year }}</div>
                                        <div><span class="fw-bold">Penulis :</span> {{ $book->author }}</div>
                                        <div><span class="fw-bold">Penerbit :</span> {{ $book->publisher }}</div>
                                        <div><span class="fw-bold">Stok :</span> {{ $book->available_stocks }}</div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button
                                        class="btn btn-primary w-100"
                                        onclick="document.querySelector('#borrow-form input').value = {{ $book->id }}; document.getElementById('borrow-form').submit()"
                                    >
                                        Pinjam Buku
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

{{--@push('scripts')--}}
{{--    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}--}}
{{--@endpush--}}
