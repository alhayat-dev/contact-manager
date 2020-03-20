@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header"><strong>All Contacts</strong></div>
        <div class="card-body">
            <div class="float-left">
                <h4>All Contacts</h4>
            </div>
            <div class="float-right">
                <a href="{{ route('contacts.create') }}" class="btn btn-outline-primary">
                    <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                    Add Contact
                </a>
            </div>
        </div>
        <table class="table">
            @foreach($contacts as $contact)
                <tr>
                <td class="middle">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object"
                                     src="{{  $contact->photo ? asset('uploads/' . $contact->photo) : 'http://placehold.it/100x100' }}"
                                     alt="image her"
                                     style="width: 100px; height: 100px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $contact->name }}</h4>
                            <address>
                                <strong>{{ $contact->company }}</strong><br>
                                {{ $contact->address }}
                            </address>
                        </div>
                    </div>
                </td>
                <td width="100" class="middle">
                    <div>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-outline-secondary btn-circle btn-xs" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-circle btn-xs" title="Delete" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="card-footer">
                {{ $contacts->appends( Request::query())->render() }}
        </div>
    </div>
@endsection
