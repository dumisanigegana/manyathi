<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                {{ __('Delete Selected') }}
            </button>

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay class="col-12 alert alert-info">
        Loading...
    </div>
    <table class="table table-index w-full">
        <thead>
            <tr>
                <th class="w-9">
                </th>
                <th class="w-28">
                    {{-- trans('cruds.user.fields.username') --}}Username
                    @include('components.table.sort', ['field' => 'username'])
                </th>
                <th>
                    {{-- trans('cruds.user.fields.fullName') --}} Fullname
                    @include('components.table.sort', ['field' => 'fullName'])
                </th>
                <th>
                    {{-- trans('cruds.user.fields.email') --}}Email
                    @include('components.table.sort', ['field' => 'email'])
                </th>
                <th>
                    {{-- trans('cruds.user.fields.email_verified_at') --}} Email Verification
                    @include('components.table.sort', ['field' => 'email_verified_at'])
                </th>
                <th>
                    {{-- trans('cruds.user.fields.roles') --}} Roles
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                    </td>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td>
                        {{ $user->fullName }}
                    </td>
                    <td>
                        <a class="link-light-blue" href="mailto:{{ $user->email }}">
                            <i class="far fa-envelope fa-fw">
                            </i>
                            {{ $user->email }}
                        </a>
                    </td>
                    <td>
                        {{ $user->email_verified_at }}
                    </td>
                    <td>
                        @foreach($user->roles as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->title }}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="flex justify-end">
                            @can('user_show')
                                <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.users.show', $user) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan
                            @can('user_edit')
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.users.edit', $user) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan
                            @can('user_delete')
                                <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
                                    {{ trans('global.delete') }}
                                </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">No entries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $users->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush