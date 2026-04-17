@extends('admin.layout')

@section('page-title', 'Edit Product Details')
@section('page-subtitle', 'Update product information, pricing, and specifications')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square"></i> Product Information
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" 
                               value="{{ $product->product_name ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" 
                               value="{{ $product->category ?? '' }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Current Price (৳)</label>
                                <input type="number" name="current_price" class="form-control price-input" 
                                       value="{{ $product->current_price ?? 0 }}" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Original Price (৳) <span class="badge bg-warning">On Sale</span></label>
                                <input type="number" name="old_price" class="form-control price-input" 
                                       value="{{ $product->old_price ?? 0 }}" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Product Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ $product->description ?? '' }}</textarea>
                        <small class="text-muted">Detailed product description for customers</small>
                    </div>

                    <hr>

                    <h6 class="mt-4 mb-3"><i class="bi bi-list"></i> Specifications</h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gold Purity</label>
                                <input type="text" name="gold_purity" class="form-control" 
                                       value="{{ $product->gold_purity ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Total Weight</label>
                                <input type="text" name="total_weight" class="form-control" 
                                       value="{{ $product->total_weight ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Stone Setting</label>
                                <input type="text" name="stone_setting" class="form-control" 
                                       value="{{ $product->stone_setting ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Includes</label>
                                <input type="text" name="includes" class="form-control" 
                                       value="{{ $product->includes ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Certification</label>
                                <input type="text" name="certification" class="form-control" 
                                       value="{{ $product->certification ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Delivery Time</label>
                                <input type="text" name="delivery" class="form-control" 
                                       value="{{ $product->delivery ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Save Changes
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Price Info --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-cash-coin"></i> Pricing Summary
            </div>
            <div class="card-body">
                <div style="padding: 15px; background: #f8f9fa; border-radius: 6px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <strong>Current Price:</strong>
                        <span class="price-current" style="color: #C9A84C; font-weight: 600;">
                            ৳ {{ number_format($product->current_price ?? 0, 0) }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <strong>Original Price:</strong>
                        <span class="price-old" style="text-decoration: line-through; color: #999;">
                            ৳ {{ number_format($product->old_price ?? 0, 0) }}
                        </span>
                    </div>
                    <hr>
                    <div style="display: flex; justify-content: space-between;">
                        <strong>Discount:</strong>
                        <span class="discount" style="color: #28a745; font-weight: 600;">
                            {{ $product->old_price && $product->current_price ? round((($product->old_price - $product->current_price) / $product->old_price) * 100) : 0 }}%
                        </span>
                    </div>
                </div>
                <div class="mt-3 p-3" style="background: #FFF3CD; border-radius: 6px; font-size: 13px;">
                    <i class="bi bi-info-circle"></i> Update prices to reflect market changes. The website will automatically display the discount percentage.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    const currentPriceInput = document.querySelector('input[name="current_price"]');
    const oldPriceInput = document.querySelector('input[name="old_price"]');

    function updatePriceSummary() {
        const current = parseFloat(currentPriceInput.value) || 0;
        const old = parseFloat(oldPriceInput.value) || 0;
        
        document.querySelector('.price-current').textContent = '৳ ' + current.toLocaleString();
        document.querySelector('.price-old').textContent = '৳ ' + old.toLocaleString();
        
        const discount = old > 0 ? Math.round(((old - current) / old) * 100) : 0;
        document.querySelector('.discount').textContent = discount + '%';
    }

    currentPriceInput.addEventListener('input', updatePriceSummary);
    oldPriceInput.addEventListener('input', updatePriceSummary);
</script>
@endsection
