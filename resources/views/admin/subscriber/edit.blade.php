@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                Profile for:                
                {{ $subscriber->account }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('subscriber.edit', [$subscriber])
    </div>
</div>
@endsection