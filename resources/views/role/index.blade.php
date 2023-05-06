@extends('layouts.app', ['page' => __('Papéis'), 'pageSlug' => 'role'])

@section('content')
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Papéis e Permissões</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary">
                            Novo
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Data de criação</th>
                                <th></th>
{{--                                @if (auth()->user()->role->resource->where('resource', 'role.update'))--}}
{{--                                    <th></th>--}}
{{--                                @endif--}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->createdAt() }}</td>
{{--                                    @if (auth()->user()->role->resource->where('resource', 'role.update'))--}}
                                        <td class="text-rightr">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('role.edit', $role) }}">Editar</a>
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                </div>
                                            </div>
                                        </td>
{{--                                    @endif--}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
