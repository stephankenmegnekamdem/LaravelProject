<!-- Category -->
<div class="form-group">
    <label for="category_id" class="font-weight-bold text-dark border-left-primary pl-2">Category</label>
    <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">— Select a Category —</option>
        @foreach($categories as $item)
            <option value="{{ $item->id }}"
                {{ old('category_id', $product->category_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->title }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- User ID -->
<div class="form-group">
    <label for="user_id" class="font-weight-bold text-dark border-left-primary pl-2">User ID</label>
    <input
        type="number"
        id="user_id"
        name="user_id"
        class="form-control @error('user_id') is-invalid @enderror"
        value="{{ old('user_id', $product->user_id ?? '') }}"
    />
    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Title -->
<div class="form-group">
    <label for="title" class="font-weight-bold text-dark border-left-primary pl-2">Title <span class="text-danger">*</span></label>
    <input
        type="text"
        id="title"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $product->title ?? '') }}"
        placeholder="Enter product title"
    />
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Keywords -->
<div class="form-group">
    <label for="keywords" class="font-weight-bold text-dark border-left-primary pl-2">Keywords</label>
    <input
        type="text"
        id="keywords"
        name="keywords"
        class="form-control @error('keywords') is-invalid @enderror"
        value="{{ old('keywords', $product->keywords ?? '') }}"
        placeholder="e.g. electronics, gadgets"
    />
    <small class="form-text text-muted">Separate keywords with commas.</small>
    @error('keywords')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Description -->
<div class="form-group">
    <label for="description" class="font-weight-bold text-dark border-left-primary pl-2">Description</label>
    <input
        type="text"
        id="description"
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        value="{{ old('description', $product->description ?? '') }}"
        placeholder="Brief description of this product"
    />
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Detail -->
<div class="form-group">
    <label for="detail" class="font-weight-bold text-dark border-left-primary pl-2">Details</label>
    <textarea
        id="detail"
        name="detail"
        class="form-control @error('detail') is-invalid @enderror"
        rows="5"
        placeholder="Full product details"
    >{!! old('detail', $product->detail ?? '') !!}</textarea>
    @error('detail')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<script>
    ClassicEditor
        .create(document.querySelector('textarea[name="detail"]'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- Image -->
<div class="form-group">
    <label class="font-weight-bold text-dark border-left-primary pl-2">Product Image</label>
    <div class="input-group">
        <input
            type="file"
            class="form-control @error('image') is-invalid @enderror"
            name="image"
            id="image"
            accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml"
        />
        <label class="input-group-text" for="image">Upload</label>
    </div>
    @if(!empty($product->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $product->image) }}"
                 width="80" height="80"
                 style="object-fit: cover; border-radius: 4px;"
                 class="img-thumbnail">
            <small class="form-text text-muted">Upload a new image to replace this one.</small>
        </div>
    @endif
    @error('image')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<!-- Price, Stock, MinStock, Discount -->
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="price" class="font-weight-bold text-dark border-left-primary pl-2">Price</label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price', $product->price ?? '') }}"
                placeholder="0.00"
                step="0.01"
            />
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="stock" class="font-weight-bold text-dark border-left-primary pl-2">Stock</label>
            <input
                type="number"
                id="stock"
                name="stock"
                class="form-control @error('stock') is-invalid @enderror"
                value="{{ old('stock', $product->stock ?? '') }}"
                placeholder="0"
            />
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="minstock" class="font-weight-bold text-dark border-left-primary pl-2">Min Stock</label>
            <input
                type="number"
                id="minstock"
                name="minstock"
                class="form-control @error('minstock') is-invalid @enderror"
                value="{{ old('minstock', $product->minstock ?? '') }}"
                placeholder="0"
            />
            @error('minstock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="discount" class="font-weight-bold text-dark border-left-primary pl-2">Discount %</label>
            <input
                type="number"
                id="discount"
                name="discount"
                class="form-control @error('discount') is-invalid @enderror"
                value="{{ old('discount', $product->discount ?? '') }}"
                placeholder="0"
                min="0"
                max="100"
            />
            @error('discount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Status -->
<div class="form-group">
    <label for="status" class="font-weight-bold text-dark border-left-primary pl-2">Status</label>
    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
        <option value="1" {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
