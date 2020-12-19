@can('time_table_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.time-tables.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timeTable.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeTable.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-programTimeTables">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.program') }}
                        </th>
                        <th>
                            {{ trans('cruds.program.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.program.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.semester') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.exam_available_days') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeTable.fields.academic_year') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeTables as $key => $timeTable)
                        <tr data-entry-id="{{ $timeTable->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timeTable->id ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->program->title ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->program->code ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->program->category ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->semester ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->year ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->exam_available_days->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $timeTable->academic_year->name ?? '' }}
                            </td>
                            <td>
                                @can('time_table_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.time-tables.show', $timeTable->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('time_table_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.time-tables.edit', $timeTable->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('time_table_delete')
                                    <form action="{{ route('admin.time-tables.destroy', $timeTable->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('time_table_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.time-tables.massDestroy') }}",
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
  let table = $('.datatable-programTimeTables:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection