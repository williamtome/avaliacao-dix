@extends('layouts.app', ['page' => __('Editar Papel'), 'pageSlug' => 'role'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Editar Papel') }}</h5>
                </div>
                <form method="post" action="{{ route('role.update', $role) }}" autocomplete="off">
                    @csrf
                    @method('put')

                    @include('role.partials._form')
                </form>
            </div>
        </div>
    </div>
@endsection
