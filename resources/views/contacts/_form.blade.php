@csrf
<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Name</label>
                <div class="col-md-8">
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name', $contact->name) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="company" class="col-md-3 col-form-label">Company</label>
                <div class="col-md-8">
                    <input type="text" name="company" id="company" class="form-control" value="{{ old('compnay', $contact->company) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-8">
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $contact->email) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-3 col-form-label">Phone</label>
                <div class="col-md-8">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $contact->phone) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-3 col-form-label">Address</label>
                <div class="col-md-8">
                    <textarea name="address" id="address" rows="3" class="form-control">{{ old('address', $contact->address) }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="group_id" class="col-md-3 col-form-label">Group</label>
                <div class="col-md-5">
                    <select name="group_id" id="group_id" class="form-control">
                        <option value="">Select group</option>
                        @foreach($groups as $group)
                            <option value='{{ $group['id'] }}'>
                                {{ $group['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <a href="#" id="add-group-btn" class="btn btn-outline-secondary btn-block">Add Group</a>
                </div>
            </div>
            <div class="form-group row" id="add-new-group">
                <div class="offset-md-3 col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="group" placeholder="Enter group name" aria-label="Enter group name" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                    <img src="http://via.placeholder.com/150x150"  alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                <div class="mt-2">
                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" class="btn btn-primary">{{ empty($contact->id) ? 'Save' : 'Update' }}</button>
                    <a href="#" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
