<div class="card-body">

    @include('alerts.success')

    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
        <label>{{ _('Título') }}</label>
        <input
            type="text"
            name="title"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
            placeholder="{{ _('Título') }}"
            value="{{ old('title', isset($news) ? $news->title : '') }}"
        >
        @include('alerts.feedback', ['field' => 'title'])
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
        <label>{{ _('Conteúdo') }}</label>
        <textarea
            name="content"
            cols="30"
            rows="20"
            class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
            placeholder="{{ _('Escreva aqui a sua notícia...') }}"
        ></textarea>
{{--        <input--}}
{{--            type="email"--}}
{{--            name="content"--}}
{{--            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
{{--            placeholder="{{ _('E-mail') }}"--}}
{{--            value="{{ old('email', isset($user) ? $user->email : '') }}"--}}
{{--        >--}}
        @include('alerts.feedback', ['field' => 'content'])
    </div>
</div>
<div class="card-footer">
    <a href="{{ route('user.index') }}">{{ _('Voltar') }}</a>
    <button type="submit" class="btn btn-fill btn-primary">{{ _('Salvar') }}</button>
</div>
