<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subcriber;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscriber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscriber.index');
    }

    public function create()
    {
        abort_if(Gate::denies('subscriber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscriber.create');
    }

    public function edit(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscriber_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscriber.edit', compact('subscriber'));
    }

    public function show(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscriber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriber->load('roles');

        return view('admin.subscriber.show', compact('subscriber'));
    }
}
