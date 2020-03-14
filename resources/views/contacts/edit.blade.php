@extends('layouts.main')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Add Contact</strong>
        </div>

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('contacts._form')
        </form>
    </div>

@endsection
