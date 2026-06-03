<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">— Select a Category —</option>
        @foreach($categories as $item)
            <option value="{{ $item->id }}"
                {{ old('category_id', $product->category_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->title }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



<div class="mb-3">
<label class="form-label">User ID</label>
<input type = "number" name = "user_id"  value ="{{old('user_id', $product->user_id ?? '' )}}">
</div>


<div class="mb-3">
<label class="form-label">Title</label>
<input type = "text" name = "title"  value ="{{ old('title', $product->title ?? '') }}">
</div>

    <div class="mb-3">
<label class="form-label">Keywords</label>
<input type = "text" name = "keywords"  value ="{{ old('keywords', $product->keywords ?? '') }}">
    </div>

<div class="mb-3">
<label class="form-label">Description</label>
<input type = "text" name = "description"  value ="{{ old('description', $product->description ?? '') }}">
</div>

<div class="col-12 mb-3">
<label class="form-label">Details</label>
<textarea name="detail" id="detail" class="form-control" rows="4">{!!   old('detail', $product->detail ?? '') !!}</textarea>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('textarea[name="detail"]'))
        .catch(error => {
            console.error(error);
        });
</script>

<div class="mb-3">
    <label class="form-label">Image</label>
    {{-- ✅ Fixed: "form control" → "form-control" --}}
    <input type="file" name="image"
           class="form-control @error('image') is-invalid @enderror"
           accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml">
    @if(!empty($product->image))
        <div class="mt-2">
            {{-- ✅ Fixed: asset('storage/') . $category->image → asset('storage/' . $category->image) --}}
            <img src="{{ asset('storage/' . $product->image) }}"
                 width="80" height="80" style="object-fit:cover; border-radius:4px;">
            <small class="text-muted d-block">Upload a new image to replace this one</small>
        </div>
    @endif
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class = "row">
<div class="col-md-3 mb-3">
<label class="form-label">Price</label>
<input type = "number" name = "price"  value ="{{old('price', $product-> price ?? '')}}">
</div>

<div class="col-md-3 mb-3">
<label class="form-label">Stock</label>
<input type = "number" name = "stock"  value ="{{old('stock', $product->stock ?? '')}}">
</div>

<div class="col-md-3 mb-3">
<label class="form-label">MinStock</label>
<input type = "number" name = "minstock"  value ="{{old('minstock', $product -> minstock ?? '')}}">
</div>

<div class="col-md-3 mb-3">
<label class="form-label">Discount</label>
<input type = "number" name = "discount"  value ="{{old('discount', $product->discount ?? '')}}">
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" >
        <option value="1" {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>Passive</option>
    </select>
</div>
</div>
