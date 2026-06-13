@extends('layout.admin')

@section('title', 'Contact Details')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Contact Details</h1>
    <div>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning shadow-sm mr-2">
            <i class="fas fa-edit fa-sm text-white-50"></i> Edit
        </a>
        <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Contacts
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="row">

    {{-- Left column: contact info --}}
    <div class="col-lg-4 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sender Info</h6>
            </div>
            <div class="card-body">

                <div class="text-center mb-4">
                    <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                         style="width:72px; height:72px; font-size:1.8rem;">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <h5 class="mt-3 mb-0 font-weight-bold">{{ $contact->name }}</h5>
                    <small class="text-muted">{{ $contact->email }}</small>
                </div>

                <hr>

                <ul class="list-unstyled mb-0">
                    <li class="mb-3">
                        <span class="text-xs font-weight-bold text-uppercase text-muted d-block mb-1">Phone</span>
                        {{ $contact->phone ?? '—' }}
                    </li>
                    <li class="mb-3">
                        <span class="text-xs font-weight-bold text-uppercase text-muted d-block mb-1">Project</span>
                        {{ $contact->project ?? '—' }}
                    </li>
                    <li class="mb-3">
                        <span class="text-xs font-weight-bold text-uppercase text-muted d-block mb-1">Received</span>
                        {{ $contact->created_at->format('d M Y, H:i') }}
                    </li>
                    @if ($contact->updated_at != $contact->created_at)
                    <li>
                        <span class="text-xs font-weight-bold text-uppercase text-muted d-block mb-1">Last Updated</span>
                        {{ $contact->updated_at->format('d M Y, H:i') }}
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    {{-- Right column: message --}}
    <div class="col-lg-8 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Message</h6>
                <span class="badge badge-info">#{{ $contact->id }}</span>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <span class="text-xs font-weight-bold text-uppercase text-muted d-block mb-1">Subject</span>
                    <p class="font-weight-bold mb-0">{{ $contact->subject }}</p>
                </div>

                <hr>

                <div>
                    <span class="text-xs font-weight-bold text-uppercase text-muted d-block mb-2">Message Body</span>
                    <p class="mb-0" style="white-space: pre-wrap; line-height: 1.7;">{{ $contact->message }}</p>
                </div>

            </div>
            <div class="card-footer bg-transparent d-flex justify-content-end">
                <form
                    action="{{ route('contacts.destroy', $contact->id) }}"
                    method="POST"
                    onsubmit="return confirm('Delete this contact message?')"
                >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-trash fa-sm"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
