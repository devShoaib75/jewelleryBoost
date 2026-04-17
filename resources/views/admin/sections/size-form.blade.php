@extends('admin.layout')

@section('page-title', isset($size) ? 'Edit Size' : 'Add New Size')
@section('page-subtitle', 'Define a necklace sizing option')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square"></i> Size Configuration
            </div>
            <div class="card-body">
                <form action="{{ isset($size) ? route('admin.size.update', $size->id) : route('admin.size.store') }}" method="POST">
                    @csrf
                    @if(isset($size))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label class="form-label">Size Name</label>
                        <input type="text" name="size_name" class="form-control"
                               value="{{ $size->size_name ?? '' }}" placeholder="e.g., S — Princess" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Length in Inches</label>
                                <input type="text" name="length_inches" class="form-control"
                                       value="{{ $size->length_inches ?? '' }}" placeholder="e.g., 16 – 17\"" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Length in CM</label>
                                <input type="text" name="length_cm" class="form-control"
                                       value="{{ $size->length_cm ?? '' }}" placeholder="e.g., 40 – 43 cm" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Best For (Body Type)</label>
                        <input type="text" name="best_for" class="form-control"
                               value="{{ $size->best_for ?? '' }}" placeholder="e.g., Most women (S–M)" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Style Description</label>
                        <input type="text" name="style" class="form-control"
                               value="{{ $size->style ?? '' }}" placeholder="e.g., Collarbone length" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="sort_order" class="form-control"
                               value="{{ $size->sort_order ?? 1 }}" min="1" required>
                        <small class="text-muted">Lower numbers appear first in the chart</small>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> {{ isset($size) ? 'Update Size' : 'Create Size' }}
                        </button>
                        <a href="{{ route('admin.size.index') }}" class="btn btn-secondary ms-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
