@extends('layouts.app', ['page' => __('Novo Usuário'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Editar Usuário') }}</h5>
                </div>
                <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                    @csrf

                    @include('users.partials._form')
                </form>
            </div>
        </div>
        @if (isset($user))
            @include('users.partials.card', ['user' => $user])
        @endif
    </div>
@endsection
