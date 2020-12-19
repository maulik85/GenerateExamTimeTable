@extends('layouts.admin')
@section('content')
@can('subject_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.subjects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.subject.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Subject', 'route' => 'admin.subjects.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.subject.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Subject">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.program') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.semester') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.year') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.credits') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.classroom_hours') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.tutorial_hours') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.lab_hours') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.theory_exam_hours') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.practical_exam_hours') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.theory_intl_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.theory_intl_passing_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.theory_ext_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.theory_ext_passing_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.practical_intl_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.practical_intl_passing_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.practical_ext_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.practical_ext_passing_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.total_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.total_passing_marks') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.elective') }}
                    </th>
                    <th>
                        {{ trans('cruds.subject.fields.elective_group') }}
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
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($programs as $key => $item)
                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Subject::TYPE_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($elective_groups as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
@can('subject_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subjects.massDestroy') }}",
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
    ajax: "{{ route('admin.subjects.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'program', name: 'programs.title' },
{ data: 'semester', name: 'semester' },
{ data: 'year', name: 'year' },
{ data: 'category', name: 'category' },
{ data: 'code', name: 'code' },
{ data: 'title', name: 'title' },
{ data: 'type', name: 'type' },
{ data: 'credits', name: 'credits' },
{ data: 'classroom_hours', name: 'classroom_hours' },
{ data: 'tutorial_hours', name: 'tutorial_hours' },
{ data: 'lab_hours', name: 'lab_hours' },
{ data: 'theory_exam_hours', name: 'theory_exam_hours' },
{ data: 'practical_exam_hours', name: 'practical_exam_hours' },
{ data: 'theory_intl_marks', name: 'theory_intl_marks' },
{ data: 'theory_intl_passing_marks', name: 'theory_intl_passing_marks' },
{ data: 'theory_ext_marks', name: 'theory_ext_marks' },
{ data: 'theory_ext_passing_marks', name: 'theory_ext_passing_marks' },
{ data: 'practical_intl_marks', name: 'practical_intl_marks' },
{ data: 'practical_intl_passing_marks', name: 'practical_intl_passing_marks' },
{ data: 'practical_ext_marks', name: 'practical_ext_marks' },
{ data: 'practical_ext_passing_marks', name: 'practical_ext_passing_marks' },
{ data: 'total_marks', name: 'total_marks' },
{ data: 'total_passing_marks', name: 'total_passing_marks' },
{ data: 'elective', name: 'elective' },
{ data: 'elective_group', name: 'elective_groups.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 6, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Subject').DataTable(dtOverrideGlobals);
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