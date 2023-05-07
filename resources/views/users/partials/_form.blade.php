<div class="card-body">

    @include('alerts.success')

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label>{{ _('Nome') }}</label>
        <input
            type="text"
            name="name"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="{{ _('Nome') }}"
            value="{{ old('name', isset($user) ? $user->name : '') }}"
        >
        @include('alerts.feedback', ['field' => 'name'])
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
        <label>{{ _('E-mail') }}</label>
        <input
            type="email"
            name="email"
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
            placeholder="{{ _('E-mail') }}"
            value="{{ old('email', isset($user) ? $user->email : '') }}"
        >
        @include('alerts.feedback', ['field' => 'email'])
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
        <label>{{ _('Papel') }}</label>
        <select
            name="role"
            class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
        >
            @foreach($roles as $role)
                <option
                    value="{{ $role->id }}"
                    {{ isset($user)
                        && isset($user->role)
                        && $user->role->id == $role->id
                            ? 'selected'
                            : '' }}
                >
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>
    @include('alerts.feedback', ['field' => 'role'])

    @if (!isset($user))
        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
            <label>{{ __('Senha') }}</label>
            <input
                type="password"
                name="password"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                placeholder="{{ __('Senha') }}"
            >
            @include('alerts.feedback', ['field' => 'password'])
        </div>
        <div class="form-group">
            <label>{{ __('Confirme sua senha') }}</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="{{ __('Confirme sua senha') }}"
            >
        </div>
    @endif
</div>
<div class="card-footer">
    <a href="{{ route('user.index') }}">{{ _('Voltar') }}</a>
    <button type="submit" class="btn btn-fill btn-primary">{{ _('Salvar') }}</button>
</div>
