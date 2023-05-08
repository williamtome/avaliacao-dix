<div class="card-body">
    <div class="row">
        <div class="col">
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
        </div>
        <div class="col">
            <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                <label>{{ _('Papel') }}</label>
                <select
                    name="role"
                    class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                >
                    <option value="ROLE_ADMIN" {{ isset($role) && $role->role == 'ROLE_ADMIN' ? 'selected' : '' }}>Administrador</option>
                    <option value="ROLE_USER" {{ isset($role) && $role->role == 'ROLE_USER' ? 'selected' : '' }}>Usuário</option>
                </select>
            </div>
            @include('alerts.feedback', ['field' => 'name'])
        </div>
    </div>

    @include('resource.tables')
</div>

<div class="card-footer">
    <a href="{{ route('role.index') }}">{{ _('Voltar') }}</a>
    <button type="submit" class="btn btn-fill btn-primary">{{ _('Salvar') }}</button>
</div>
