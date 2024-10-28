@extends('layouts.admin')
@section('title', 'Basic Table')
@section('content')


        <!-- update profile -->
        <div class="card">
            <div class="card-header border-none">
                <h2 class="h5 font-weight-bold text-dark">
                    Profile Information
                </h2>

                <p class="mt-1 text-muted small">
                    Update your account's profile information and email address.
                </p>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Form for sending verification email -->
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <!-- Profile update form -->
                    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                        @csrf
                        @method('patch')

                        <div class=" mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control w-25"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @if($errors->has('name'))
                            <div class="text-danger small mt-2">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class=" mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control w-25"
                                value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @if($errors->has('email'))
                            <div class="text-danger small mt-2">{{ $errors->first('email') }}</div>
                            @endif

                            <!-- Email Verification Section -->
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !
                            $user->hasVerifiedEmail())
                            <div class="mt-3">
                                <p class="small text-muted">
                                    Your email address is unverified.

                                    <button form="send-verification" class="btn btn-link p-0">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                <p class="small text-success mt-2">
                                    A new verification link has been sent to your email address.
                                </p>
                                @endif
                            </div>
                            @endif
                        </div>

                        <div class="d-flex align-items-center gap-3 mt-3">
                            {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                            <button type="submit" class="btn btn-primary">Save</button>

                            @if (session('status') === 'profile-updated')
                            <p class="small text-muted mb-0">Saved.</p>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- update password -->
        <div class="card">
            <div class="card-header">
                <h2 class="h5 font-weight-bold text-dark">
                    Update Password
                </h2>

                <p class="mt-1 text-muted small">
                    Ensure your account is using a long, random password to stay secure.
                </p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}" class="mt-4">
                    @csrf
                    @method('put')

                    <!-- Current Password -->
                    <div class="col-md-6">
                        <label for="update_password_current_password" class="form-label">Current Password</label>
                        <input type="password" id="update_password_current_password" name="current_password"
                            class="form-control" autocomplete="current-password">
                        @if($errors->updatePassword->has('current_password'))
                        <div class="text-danger small mt-2">{{ $errors->updatePassword->first('current_password') }}
                        </div>
                        @endif
                    </div>

                    <!-- New Password -->
                    <div class="col-md-6">
                        <label for="update_password_password" class="form-label">New Password</label>
                        <input type="password" id="update_password_password" name="password" class="form-control"
                            autocomplete="new-password">
                        @if($errors->updatePassword->has('password'))
                        <div class="text-danger small mt-2">{{ $errors->updatePassword->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">
                        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                            class="form-control" autocomplete="new-password">
                        @if($errors->updatePassword->has('password_confirmation'))
                        <div class="text-danger small mt-2">
                            {{ $errors->updatePassword->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <!-- Save Button and Success Message -->
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>

                        @if (session('status') === 'password-updated')
                        <p class="small text-muted mb-0">Saved.</p>
                        @endif
                    </div>
                </form>

            </div>
        </div>

@endsection



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
</x-app-layout> --}}
