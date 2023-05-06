@extends('layouts.app', ['page' => __('Novo Papel'), 'pageSlug' => 'role'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Novo Papel') }}</h5>
                </div>
                <form method="post" action="{{ route('role.store') }}" autocomplete="off">
                    @csrf

                    @include('role.partials._form')
                </form>
            </div>
        </div>
    </div>
@endsection
