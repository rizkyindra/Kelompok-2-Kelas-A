@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Update Book') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.books.update', $book->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="row mb-3">
                        <label for="title" class="col-md-3 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-7">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title') : $book->title }}" required>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cover_url" class="col-md-3 col-form-label text-md-end">{{ __('Cover Url') }}</label>

                        <div class="col-md-7">
                            <input id="cover_url" type="text" class="form-control @error('cover_url') is-invalid @enderror" name="cover_url" value="{{ old('cover_url') ? old('cover_url') : $book->cover_url }}" required>

                            @error('cover_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-3 col-form-label text-md-end">{{ __('Author') }}</label>

                        <div class="col-md-7">
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') ? old('author') : $book->author }}" required>

                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="publisher" class="col-md-3 col-form-label text-md-end">{{ __('Publisher') }}</label>

                        <div class="col-md-7">
                            <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher') ? old('publisher') : $book->publisher }}" required>

                            @error('publisher')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Year') }}</label>

                        <div class="col-md-7">
                            <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') ? old('year') : $book->year }}" required>

                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

{{--                    <div class="row mb-3">--}}
{{--                        <label for="subject" class="col-md-3 col-form-label text-md-end">{{ __('Subject') }}</label>--}}

{{--                        <div class="col-md-7">--}}
{{--                            <select multiple id="subject" name="subject_id[]" class="form-control select2 @error('subject') is-invalid @enderror" required>--}}
{{--                                @foreach($subjects as $key => $values)--}}
{{--                                    <optgroup label="Semester {{ $key }}">--}}
{{--                                        @foreach($values as $subject)--}}
{{--                                            <option value="{{ $subject->id }}" @if(in_array($subject->id, old('subject_id') ? old('subject_id') : $book->subject_id)) selected @endif>--}}
{{--                                                {{ $subject->name }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </optgroup>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}

{{--                            @error('subject_id')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="row mb-3">
                        <label for="semester" class="col-md-3 col-form-label text-md-end">{{ __('Semester') }}</label>

                        <div class="col-md-7">
                            <select multiple id="semester" name="semester[]" class="form-control select2 @error('semester') is-invalid @enderror" required>
                                @foreach($semesters as $smt)
                                    <option value="{{ $smt }}" @if(in_array($smt, old('semester') ? old('semester') : $book->semester)) selected @endif>Semester {{ $smt }}</option>
                                @endforeach
                            </select>

                            @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                            <a class="btn btn-secondary" href="{{ route('admin.books.index') }}">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ __('Stock') }}
            </div>
            <div class="card-body pb-1">
                <form id="create-stock-form" action="{{ route('admin.books.stocks.generate', $book->id) }}" method="post" class="d-none">
                    @csrf
                </form>

                <form id="delete-stock-form" action="" method="post" class="d-none">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                </form>

                <div class="row">
                    @foreach($book->stocks as $stock)
                        <div class="col-2 mb-2">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $stock->code }}" disabled>
                                <button type="button" class="btn btn-danger" onclick="
                                    if(confirm('Konfirmasi')) {
                                        document.getElementById('delete-stock-form').setAttribute('action', '{{ route('admin.books.stocks.destroy', ['book' => $book->id, 'stock' => $stock->id]) }}');
                                        document.getElementById('delete-stock-form').submit();
                                    }"
                                >
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-2 mb-2">
                        <button class="btn btn-primary" onclick="document.getElementById('create-stock-form').submit()">Create New</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}

{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}


