<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
</head>
<body>
    <h1>Contact List</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($contacts->isEmpty())
        <p>No contacts found.</p>
    @else
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
            </tr>
            @endforeach
        </table>
    @endif

    <br>
    <a href="{{ route('contacts.create') }}">Add New Contact</a>
</body>
</html>
```

---

### Your folder structure should look like:
```
resources/views/
├── home/
│   └── contactlist.blade.php   ← create this
├── contacts/
│   └── index.blade.php
├── home.blade.php
└── welcome.blade.php
