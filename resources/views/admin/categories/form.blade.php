<!-- Parent Category -->
<div class="form-group">
    <label for="parent_id" class="font-weight-bold text-dark border-left-primary pl-2">Parent Category</label>
    <select id="parent_id" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
        <option value="">— Main Category (no parent) —</option>
        @foreach($categories as $item)
            @if($item->id !== ($category->id ?? null))
                <option value="{{ $item->id }}"
                    {{ old('parent_id', $category->parent_id ?? 0) == $item->id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
            @endif
        @endforeach
    </select>
    @error('parent_id')
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
        value="{{ old('title', $category->title ?? '') }}"
        placeholder="Enter category title"
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
        value="{{ old('keywords', $category->keywords ?? '') }}"
        placeholder="e.g. electronics, gadgets, phones"
    />
    <small class="form-text text-muted">Separate keywords with commas.</small>
    @error('keywords')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Description -->
<div class="form-group">
    <label for="description" class="font-weight-bold text-dark border-left-primary pl-2">Description</label>
    <textarea
        id="description"
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        rows="3"
        placeholder="Brief description of this category"
    >{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
