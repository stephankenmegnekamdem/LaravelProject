<div class="mb-3">
    <label class="form-label">Parent Category</label>
    <select name="parent_id" class="form control">
        <option value ="0">Main Category</option>
        @foreach($parents as $parent)
            <option value="{{ $parent->id }}"
            {{ old('parent_id', $category->parent_id ?? 0)  == $parent->id ? 'selected' : ''}}>
            {{ $parent->title }}
            </option>
        @endforeach
    </select>
    @error('parent_id')
    <small class="text danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form control"
           value="{{ old('title', $category->title ?? '') }}">
    @error('title')
    <small class="text danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
     <label class="form-label">Keywords</label>
     <input type="text" name="keywords" class="form control"
           value="{{ old('keywords', $category->keywords ?? '') }}">
    @error('keywords')
    <small class="text danger">{{ $message }}</small>
    @enderror
</div>
