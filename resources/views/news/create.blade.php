@extends('layouts.app', ['page' => __('Nova Notícia'), 'pageSlug' => 'news'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Nova Notícia') }}</h5>
                </div>
                <form method="post" action="{{ route('news.store') }}" autocomplete="off">
                    @csrf

                    @include('news.partials._form')
                </form>
            </div>
        </div>
    </div>
@endsection
