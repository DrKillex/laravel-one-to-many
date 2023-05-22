@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger mb-3 mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.records.update', $record) }}" method="POST" enctype="multipart/form-data"  class="form-input-image">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $record->title) }}">
                </div>
                <div class="mb-3">
                    <label for="creation_date" class="form-label">creation_date</label>
                    <input type="date" class="form-control" id="creation_date" name="creation_date" value="{{ old('creation_date', $record->creation_date) }}">
                </div>
                <div class="mb-3">
                    <label for="record_description" class="form-label">record_description</label>
                    <textarea class="form-control" id="record_description" rows="3" name="record_description">{{ old('record_description', $record->record_description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="completed" class="form-label">is completed?</label>
                    <select name="completed" id="completed">
                        <option value="" {{ old('completed', $record->completed) == null ? 'selected' : '' }}>choose</option>
                        <option value="1" {{ old('completed', $record->completed) == '1' ? 'selected' : '' }}>yes</option>
                        <option value="0" {{ old('completed', $record->completed) == '0' ? 'selected' : '' }}>no</option>
                    </select>
                </div>

                <div class="mb-3">

                    <div class="preview">
                        <img id="image-preview" @if($record->image) src="{{ asset('storage/' . $record->image) }}" @endif>
                    </div>
             
        
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" value="1" id="delete_image" name="delete_image">
                    <label class="form-check-label" for="delete_image">delete image</label>
                  </div>
                <button type="submit" class="btn btn-primary">edit</button>
            </form>
        </div>
    </div>
@endsection