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
                    {{-- trans('cruds.subscriber.fields.subscribername') --}}Reference Number
                    @include('components.table.sort', ['field' => 'account'])
                </th>
                <th>
                    {{-- trans('cruds.subscriber.fields.fullName') --}} Birthday
                    @include('components.table.sort', ['field' => 'bod'])
                </th>
                <th>
                    {{-- trans('cruds.subscriber.fields.email') --}}city
                    @include('components.table.sort', ['field' => 'city'])
                </th>
                <th>
                    {{-- trans('cruds.subscriber.fields.email_verified_at') --}} Country
                    @include('components.table.sort', ['field' => 'country'])
                </th>
                <th>
                    {{-- trans('cruds.subscriber.fields.roles') --}} Phase 
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($subscribers as $subscriber)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $subscriber->id }}" wire:model="selected">
                    </td>
                    <td>
                        {{ $subscriber->user->username }}
                    </td>
                    <td>
                        {{ $subscriber->dob }}
                    </td>
                    <td>
                        {{ $subscriber->city }}
                    </td>
                    <td>
                        {{ $subscriber->country }}
                    </td>
                    <td>
                        
                        {{ $subscriber->subphase->phase->name }}
                      
                    </td>
                    <td>
                        <div class="flex justify-end">
                            @can('subscriber_show')
                                <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.subscribers.show', $subscriber) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan
                            @can('subscriber_edit')
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.subscribers.edit', $subscriber) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan
                            @can('subscriber_delete')
                                <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $subscriber->id }})" wire:loading.attr="disabled">
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
            {{ $subscribers->links() }}
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