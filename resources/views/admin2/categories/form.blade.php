<div class="mb-3">
    <label class="form-label">Parent Category</label>
    {{-- ✅ Fixed: "form control" → "form-select" --}}
    <select name="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
        <option value="0">— Main Category (no parent) —</option>
        @foreach($categories as $item)
            {{-- ✅ Fixed: exclude self to prevent circular reference --}}
            @if($item->id !== ($category->id ?? null))
                <option value="{{ $item->id }}"
                    {{ old('parent_id', $category->parent_id ?? 0) == $item->id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
            @endif
        @endforeach
    </select>
    @error('parent_id')
        {{-- ✅ Fixed: "text danger" → "text-danger" --}}
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Title</label>
    {{-- ✅ Fixed: "form control" → "form-control" --}}
    <input type="text" name="title"
           class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $category->title ?? '') }}">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Keywords</label>
    {{-- ✅ Fixed: "form control" → "form-control" --}}
    <input type="text" name="keywords"
           class="form-control @error('keywords') is-invalid @enderror"
           value="{{ old('keywords', $category->keywords ?? '') }}">
    @error('keywords')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description"
              class="form-control @error('description') is-invalid @enderror"
              rows="3">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Image</label>
    {{-- ✅ Fixed: "form control" → "form-control" --}}
    <input type="file" name="image"
           class="form-control @error('image') is-invalid @enderror"
           accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml">
    @if(!empty($category->image))
        <div class="mt-2">
            {{-- ✅ Fixed: asset('storage/') . $category->image → asset('storage/' . $category->image) --}}
            <img src="{{ asset('storage/' . $category->image) }}"
                 width="80" height="80" style="object-fit:cover; border-radius:4px;">
            <small class="text-muted d-block">Upload a new image to replace this one</small>
        </div>
    @endif
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    {{-- ✅ Fixed: "form control" → "form-select", name=" status" → name="status" --}}
    {{-- ✅ Fixed: both options had value="1", Passive must be value="0" --}}
    <select name="status" class="form-select @error('status') is-invalid @enderror">
        <option value="1" {{ old('status', $category->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $category->status ?? 1) == 0 ? 'selected' : '' }}>Passive</option>
    </select>
    @error('status')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
