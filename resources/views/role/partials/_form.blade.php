<div class="card-body">

    @include('alerts.success')

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label>{{ _('Nome') }}</label>
        <input
            type="text"
            name="name"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="{{ _('Nome') }}"
            value="{{ old('name', isset($role) ? $role->name : '') }}"
        >
        @include('alerts.feedback', ['field' => 'name'])
    </div>

    @include('resource.table')
</div>
<div class="card-footer">
    <a href="{{ route('user.index') }}">{{ _('Voltar') }}</a>
    <button type="submit" class="btn btn-fill btn-primary">{{ _('Salvar') }}</button>
</div>
