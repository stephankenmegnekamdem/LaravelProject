@extends('layout.admin')

@section('title', 'Edit Contact')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Contact</h1>
    <div>
        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-info shadow-sm mr-2">
            <i class="fas fa-eye fa-sm text-white-50"></i> View
        </a>
        <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Contacts
        </a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Editing Contact #{{ $contact->id }}</h6>
        <small class="text-muted">Created {{ $contact->created_at->format('d M Y, H:i') }}</small>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $contact->name) }}"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $contact->email) }}"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input
                        id="phone"
                        name="phone"
                        type="text"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $contact->phone) }}"
                    >
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="project">Project</label>
                    <input
                        id="project"
                        name="project"
                        type="text"
                        class="form-control @error('project') is-invalid @enderror"
                        value="{{ old('project', $contact->project) }}"
                    >
                    @error('project')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="subject">Subject <span class="text-danger">*</span></label>
                <input
                    id="subject"
                    name="subject"
                    type="text"
                    class="form-control @error('subject') is-invalid @enderror"
                    value="{{ old('subject', $contact->subject) }}"
                    required
                >
                @error('subject')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message <span class="text-danger">*</span></label>
                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    class="form-control @error('message') is-invalid @enderror"
                    required
                >{{ old('message', $contact->message) }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <div class="d-flex justify-content-between align-items-center">

                {{-- Danger zone --}}
                <form
                    action="{{ route('contacts.destroy', $contact->id) }}"
                    method="POST"
                    onsubmit="return confirm('Permanently delete this contact?')"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-trash fa-sm"></i> Delete
                    </button>
                </form>

                <div>
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save fa-sm"></i> Save Changes
                    </button>
                </div>

            </div>

        </form>
    </div>
</div>

@endsection
