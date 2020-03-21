<div class="col-md-3">
    <div class="list-group">

        @php
            use Illuminate\Support\Facades\Auth;
            use Illuminate\Support\Facades\Request;

            $selected_group = Request::get('group_id');
            $listGroups = listGroups(Auth::user()->id);

        @endphp
        <a href="{{ route('contacts.index') }}"
           class="{{ !$selected_group ? 'active' : '' }} list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            All Contact <span class="badge badge-warning badge-pill">{{ collect($listGroups)->sum('total') }}</span>
        </a>

        @foreach($listGroups as $group)
            <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}"
               class="{{ $selected_group == $group->id ? 'active' : '' }} list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                {{ $group->name }}
                <span class="badge badge-pill badge-warning">
                                {{ $group->total }}
                            </span>
            </a>
        @endforeach

    </div>
</div><!-- /.col-md-3 -->
