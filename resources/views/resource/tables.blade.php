<h5 class="title">{{ _('Permissões') }}</h5>
<div class="row">
    <div class="col-md-6">
        <div class="card-header ">
            <h6 class="title d-inline">Usuários</h6>
        </div>
        <div class="card-body ">
            <div class="table-full-width table-responsive">
                <table class="table">
                    <tbody>
                        @foreach($userResources as $userResource)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input
                                                name="permissions[]"
                                                class="form-check-input"
                                                type="checkbox"
                                                @if (isset($role) && $role->resources->contains($userResource->id)) checked @endif
                                                value="{{ $userResource->id }}"
                                            >
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="mt-1 title">
                                        {{ $userResource->name }}
                                        <span class="ml-1 badge badge-info">
                                            {{ str_replace('.', '/', $userResource->resource) }}
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-header ">
            <h6 class="title d-inline">Notícias</h6>
        </div>
        <div class="card-body ">
            <div class="table-full-width table-responsive">
                <table class="table">
                    <tbody>
                        @foreach($newsResources as $newsResource)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input
                                                name="permissions[]"
                                                class="form-check-input"
                                                type="checkbox"
                                                @if (isset($role) && $role->resources->contains($newsResource->id)) checked @endif
                                                value="{{ $newsResource->id }}"
                                            >
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="mt-1 title">
                                        {{ $newsResource->name }}
                                        <span class="ml-1 badge badge-primary">
                                            {{ str_replace('.', '/', $newsResource->resource) }}
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
