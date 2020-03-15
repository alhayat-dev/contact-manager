@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header"><strong>All Contacts</strong></div>
        <table class="table">
            @foreach($contacts as $contact)
                <tr>
                <td class="middle">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
{{--                                http://placehold.it/100x100--}}

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
                        <a href="#" class="btn btn-outline-danger btn-circle btn-xs" title="Delete">
                            <i class="fa fa-times"></i>
                        </a>
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
