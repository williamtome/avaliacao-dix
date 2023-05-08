@extends('layouts.app', ['page' => __('Notícias'), 'pageSlug' => 'news'])

@section('content')
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Notícias</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Data de Criação</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $n)
                            <tr>
                                <td>{{ $n->title }}</td>
                                <td>{{ $n->user->name }}</td>
                                <td>{{ $n->createdAt() }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('news.edit', $n) }}">Editar</a>
                                            <a class="dropdown-item" href="{{ route('news.destroy', $n) }}">Remover</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <td style="overflow: hidden; white-space: nowrap">
                                    <span class="col-12 text-center">Não há notícias.</span>
                                </td>
                            @endforelse
                        </tbody>

                        {{ $news->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
