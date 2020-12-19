@extends('layouts.admin')
@section('content')
@can('exam_available_day_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.exam-available-days.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.examAvailableDay.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ExamAvailableDay', 'route' => 'admin.exam-available-days.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.examAvailableDay.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ExamAvailableDay">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.exam_start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_4') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_5') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_6') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_7') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_8') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_9') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_10') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_11') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_12') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_13') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_14') }}
                    </th>
                    <th>
                        {{ trans('cruds.examAvailableDay.fields.day_15') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('exam_available_day_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exam-available-days.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.exam-available-days.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'exam_start_date', name: 'exam_start_date' },
{ data: 'day_1', name: 'day_1' },
{ data: 'day_2', name: 'day_2' },
{ data: 'day_3', name: 'day_3' },
{ data: 'day_4', name: 'day_4' },
{ data: 'day_5', name: 'day_5' },
{ data: 'day_6', name: 'day_6' },
{ data: 'day_7', name: 'day_7' },
{ data: 'day_8', name: 'day_8' },
{ data: 'day_9', name: 'day_9' },
{ data: 'day_10', name: 'day_10' },
{ data: 'day_11', name: 'day_11' },
{ data: 'day_12', name: 'day_12' },
{ data: 'day_13', name: 'day_13' },
{ data: 'day_14', name: 'day_14' },
{ data: 'day_15', name: 'day_15' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ExamAvailableDay').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection