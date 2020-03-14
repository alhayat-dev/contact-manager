<div class="col-md-3">
    <div class="list-group">

        @php
            $selected_group = \Request::get('group_id')
        @endphp
        <a href="{{ route('contacts.index') }}"
           class="{{ !$selected_group ? 'active' : '' }} list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            All Contact <span class="badge badge-warning badge-pill">{{ \App\Contact::count() }}</span>
        </a>

        @foreach(App\Group::all() as $group)
            <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}"
               class="{{ $selected_group == $group->id ? 'active' : '' }} list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                {{ $group->name }}
                <span class="badge badge-pill badge-warning">
                                {{ $group->contacts->count() }}
                            </span>
            </a>
        @endforeach

    </div>
</div><!-- /.col-md-3 -->
