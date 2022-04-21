@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifiqueu la vostra adreça electrònica') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __("S'ha enviat un enllaç de verificació nou a la vostra adreça de correu electrònic.") }}
                        </div>
                    @endif

                    {{ __('Abans de continuar, comproveu el vostre correu electrònic per a un enllaç de verificació.') }}
                    {{ __('Si no heu rebut el correu electrònic') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('feu clic aquí per demanar-ne un altre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
