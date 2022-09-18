@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.subscriber.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('subscriber_create')
                <a class="btn btn-indigo" href="{{ route('admin.subscribers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.subscriber.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    @livewire('subscriber.index')

</div>
@endsection