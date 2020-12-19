@can('subject_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.subjects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.subject.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.subject.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-programSubjects">
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
                </thead>
                <tbody>
                    @foreach($subjects as $key => $subject)
                        <tr data-entry-id="{{ $subject->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subject->id ?? '' }}
                            </td>
                            <td>
                                @foreach($subject->programs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $subject->semester ?? '' }}
                            </td>
                            <td>
                                {{ $subject->year ?? '' }}
                            </td>
                            <td>
                                {{ $subject->category ?? '' }}
                            </td>
                            <td>
                                {{ $subject->code ?? '' }}
                            </td>
                            <td>
                                {{ $subject->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Subject::TYPE_SELECT[$subject->type] ?? '' }}
                            </td>
                            <td>
                                {{ $subject->credits ?? '' }}
                            </td>
                            <td>
                                {{ $subject->classroom_hours ?? '' }}
                            </td>
                            <td>
                                {{ $subject->tutorial_hours ?? '' }}
                            </td>
                            <td>
                                {{ $subject->lab_hours ?? '' }}
                            </td>
                            <td>
                                {{ $subject->theory_exam_hours ?? '' }}
                            </td>
                            <td>
                                {{ $subject->practical_exam_hours ?? '' }}
                            </td>
                            <td>
                                {{ $subject->theory_intl_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->theory_intl_passing_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->theory_ext_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->theory_ext_passing_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->practical_intl_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->practical_intl_passing_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->practical_ext_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->practical_ext_passing_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->total_marks ?? '' }}
                            </td>
                            <td>
                                {{ $subject->total_passing_marks ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $subject->elective ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $subject->elective ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($subject->elective_groups as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('subject_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.subjects.show', $subject->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('subject_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subjects.edit', $subject->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('subject_delete')
                                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('subject_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subjects.massDestroy') }}",
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
    order: [[ 6, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-programSubjects:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection