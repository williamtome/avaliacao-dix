@extends('layouts.app', ['page' => __('Editar Notícia'), 'pageSlug' => 'news'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Editar Notícia') }}</h5>
                </div>
                <form method="post" action="{{ route('news.update', $news) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        @include('news.partials._form', ['news' => $news])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
