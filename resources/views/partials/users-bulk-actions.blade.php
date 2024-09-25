@can('view', \App\Models\User::class)
    <div id="userBulkEditToolbar">
    {{ Form::open([
              'method' => 'POST',
              'route' => ['users/bulkedit'],
              'class' => 'form-inline',
              'id' => 'usersBulkForm']) }}

        @if (request('status')!='deleted')
            <div id="users-toolbar">
                <label for="bulk_actions" class="sr-only">{{ trans('general.bulk_actions') }}</label>
                <select name="bulk_actions" class="form-control select2" style="min-width:300px;" aria-label="bulk_actions">

                    @can('update', \App\Models\User::class)
                        <option value="edit">{{ trans('general.bulk_edit') }}</option>
                    @endcan

                    @can('delete', \App\Models\User::class)
                        <option value="delete">{!! trans('general.bulk_checkin_delete') !!}</option>
                        <option value="merge">{!! trans('general.merge_users') !!}</option>
                    @endcan

                    <option value="bulkpasswordreset">{{ trans('button.send_password_link') }}</option>
                    <option value="print">{{ trans('admin/users/general.print_assigned') }}</option>
                </select>
                <button class="btn btn-primary" id="bulkUserEditButton" disabled>{{ trans('button.go') }}</button>
            </div>
        @endif
        {{ Form::close() }}
    </div>
@endcan
