<h5 class="title">{{ _('Permissões') }}</h5>
<div class="col-md-12">
    <div class="card card-tasks">
        <div class="card-header ">
            <h6 class="title d-inline">Tasks(5)</h6>
        </div>
        <div class="card-body ">
            <div class="table-full-width table-responsive">
                <table class="table">
                    <tbody>
                        @foreach($resources as $resource)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="{{ $resource->id }}">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <p class="title">Update the Documentation</p>
                                <p class="text-muted">Dwuamish Head, Seattle, WA 8:47 AM</p>
                            </td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                    <i class="tim-icons icon-pencil"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
