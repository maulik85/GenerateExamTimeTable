@can('elective_group_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.elective-groups.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.electiveGroup.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.electiveGroup.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-programsElectiveGroups">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.programs') }}
                        </th>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.offered_subjects_in_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.max_subjects_allowed') }}
                        </th>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.min_subjects_required') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($electiveGroups as $key => $electiveGroup)
                        <tr data-entry-id="{{ $electiveGroup->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $electiveGroup->id ?? '' }}
                            </td>
                            <td>
                                @foreach($electiveGroup->programs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $electiveGroup->name ?? '' }}
                            </td>
                            <td>
                                {{ $electiveGroup->offered_subjects_in_group ?? '' }}
                            </td>
                            <td>
                                {{ $electiveGroup->max_subjects_allowed ?? '' }}
                            </td>
                            <td>
                                {{ $electiveGroup->min_subjects_required ?? '' }}
                            </td>
                            <td>
                                @can('elective_group_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.elective-groups.show', $electiveGroup->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('elective_group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.elective-groups.edit', $electiveGroup->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('elective_group_delete')
                                    <form action="{{ route('admin.elective-groups.destroy', $electiveGroup->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('elective_group_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.elective-groups.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-programsElectiveGroups:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection