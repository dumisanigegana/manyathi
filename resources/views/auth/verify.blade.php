@extends('layouts.app')

@section('content')
<div class="md:flex no-wrap md:-mx-2 pt-8 object-contain place-content-center">
    <div class="w-full md:w-1/2 md:mx-2 mt-3">
        <div class="card">
            <div class="card-header text-xl">{{ __('Verify Your Email Address') }}</div>

            <div class="card-body bg-green-50">
                <div class="mt-3">
                    @if(session('resent'))
                        <div class="text-green-400" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email, click on resend email.') }}
                    <form class="flex justify-center" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="place-self-center bg-gray-600 text-white mt-3 py-1 px-3 rounded-md">{{ __('Resend email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection