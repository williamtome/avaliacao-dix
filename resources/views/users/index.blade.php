@extends('layouts.app', ['page' => __('Usuários'), 'pageSlug' => 'users'])

@section('content')
    <!-- Users -->
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Usuários</h4>
                    </div>
                    @if (auth()->user()->role->resources()->where('resource', 'user.store')->exists())
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Novo</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Papel</th>
                                <th scope="col">Data de Criação</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->createdAt() }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @if (auth()->user()->role->resources()->where('resource', 'user.update')->exists())
                                                <a class="dropdown-item" href="{{ route('user.edit', $user) }}">Editar</a>
                                            @endif
                                            @if (auth()->user()->role->resources()->where('resource', 'user.destroy')->exists())
                                                <form method="post" action="{{ route('user.destroy', $user) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item">Remover</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        {{ $users->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Users -->
@endsection
