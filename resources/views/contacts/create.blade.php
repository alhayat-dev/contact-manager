@extends('layouts.main')

@section('content')

<div class="card">
    <div class="card-header">
        <strong>Add Contact</strong>
    </div>

    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @include('contacts._form')
    </form>
</div>

@endsection
