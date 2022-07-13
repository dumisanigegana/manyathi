@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }} Profile for: 
                {{ $subscriber->user->full_name }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            Reference Number
                        </th>
                        <td>
                            {{ $subscriber->account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.name') }}
                        </th>
                        <td>
                            {{ $subscriber->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.email') }}
                        </th>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $subscriber->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $subscriber->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $subscriber->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.roles') }}
                        </th>
                        <td>
                            @foreach($subscriber->roles as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection