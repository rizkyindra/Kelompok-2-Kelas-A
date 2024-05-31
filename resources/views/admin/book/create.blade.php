@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('Create Book') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.books.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-md-3 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-7">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>

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
                            <input id="cover_url" type="text" class="form-control @error('cover_url') is-invalid @enderror" name="cover_url" value="{{ old('cover_url') }}" required>

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
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required>

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
                            <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher') }}" required>

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
                            <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required>

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
{{--                            <select multiple id="subject" name="subject_id[]" class="form-control select2 @error('subject_id') is-invalid @enderror" required>--}}
{{--                                @foreach($subjects as $key => $values)--}}
{{--                                    <optgroup label="Semester {{ $key }}">--}}
{{--                                        @foreach($values as $subject)--}}
{{--                                            <option value="{{ $subject->id }}" @if(in_array($subject->id, old('subject_id') ?? [])) selected @endif>--}}
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
                                    <option value="{{ $smt }}">Semester {{ $smt }}</option>
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
                                {{ __('Create') }}
                            </button>
                            <a class="btn btn-secondary" href="{{ route('admin.books.index') }}">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
