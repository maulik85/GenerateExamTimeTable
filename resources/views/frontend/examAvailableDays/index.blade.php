@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('exam_available_day_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.exam-available-days.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExamAvailableDay">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($examAvailableDays as $key => $examAvailableDay)
                                    <tr data-entry-id="{{ $examAvailableDay->id }}">
                                        <td>
                                            {{ $examAvailableDay->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->exam_start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_4 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_5 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_6 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_7 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_8 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_9 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_10 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_11 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_12 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_13 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_14 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examAvailableDay->day_15 ?? '' }}
                                        </td>
                                        <td>
                                            @can('exam_available_day_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.exam-available-days.show', $examAvailableDay->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('exam_available_day_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.exam-available-days.edit', $examAvailableDay->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('exam_available_day_delete')
                                                <form action="{{ route('frontend.exam-available-days.destroy', $examAvailableDay->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('exam_available_day_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.exam-available-days.massDestroy') }}",
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
  let table = $('.datatable-ExamAvailableDay:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
})

</script>
@endsection