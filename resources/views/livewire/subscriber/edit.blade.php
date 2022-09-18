<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.fname') ? 'invalid' : '' }}">
        <label class="form-label required" for="fname">{{ trans('cruds.user.fields.fname') }}</label>
        <input class="form-control" type="text" name="fname" id="fname" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.fname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.fname_helper') }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('user.mname') ? 'invalid' : '' }}">
        <label class="form-label required" for="mname">{{ trans('cruds.user.fields.mname') }}</label>
        <input class="form-control" type="text" name="mname" id="mname" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.mname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.mname_helper') }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('user.lname') ? 'invalid' : '' }}">
        <label class="form-label required" for="lname">{{ trans('cruds.user.fields.lname') }}</label>
        <input class="form-control" type="text" name="lname" id="lname" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.lname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>