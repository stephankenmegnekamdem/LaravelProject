<form method="POST" action="{{ route('contacts.store') }}">
@csrf
<input name="name" type="text" class="form-control">
<input name="email" type="email" class="form-control">
<input name="phone" type="text" class="form-control">
<input name="project" type="text" class="form-control">
<input name="subject" type="text" class="form-control">
<textarea name="message" class="form-control"></textarea>
<button type="submit" class="btn btn-primary">Send Message</button>
</form>
<table class="table table-bordered table-hover align-middle">
<thead class="table-dark">
<tr>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Project</th>
<th>Subject</th>
<th>Message</th>
<th>Created</th>
<th width="160">Actions</th>
</tr>
</thead>
<tbody>
@forelse ($contacts as $contact)
<tr>
<td>{{ $contact->id }}</td>
<td>{{ $contact->name }}</td>
<td>{{ $contact->email }}</td>
<td>{{ $contact->phone ?? '
-' }}</td>
<td>{{ $contact->project ?? '
-' }}</td>
<td>{{ $contact->subject }}</td>
<td style="max-width: 250px;">
{{ Str::limit($contact->message, 80) }}
</td>
<td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
<td>
<div class="d-flex gap-1">
<a href="{{ route('contacts.show', $contact->id) }}"
class="btn btn-sm btn-info">
View
</a>
<a href="{{ route('contacts.edit', $contact->id) }}"
class="btn btn-sm btn-warning">
Edit
</a>
<form action="{{ route('contacts.destroy', $contact->id)
}}"
method="POST"
onsubmit="return confirm('Are you sure?')">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger">
Delete
</button>
</form>
</div>
</td>
    @empty
</tr>
@endforelse
</tbody>
</table>
