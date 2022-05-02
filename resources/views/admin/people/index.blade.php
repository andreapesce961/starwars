@extends('layouts.admin')
@section('content')
@can('person_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.people.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.person.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.person.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Person">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.person.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.birth_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.eye_color') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.hair_color') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.height') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.mass') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.skin_color') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.homeworld') }}
                        </th>
                        <th>
                            {{ trans('cruds.person.fields.url') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($planets as $key => $item)
                                    <option value="{{ $item->url }}">{{ $item->url }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($people as $key => $person)
                        <tr data-entry-id="{{ $person->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $person->id ?? '' }}
                            </td>
                            <td>
                                {{ $person->name ?? '' }}
                            </td>
                            <td>
                                {{ $person->birth_year ?? '' }}
                            </td>
                            <td>
                                {{ $person->eye_color ?? '' }}
                            </td>
                            <td>
                                {{ $person->gender ?? '' }}
                            </td>
                            <td>
                                {{ $person->hair_color ?? '' }}
                            </td>
                            <td>
                                {{ $person->height ?? '' }}
                            </td>
                            <td>
                                {{ $person->mass ?? '' }}
                            </td>
                            <td>
                                {{ $person->skin_color ?? '' }}
                            </td>
                            <td>
                                {{ $person->homeworld->url ?? '' }}
                            </td>
                            <td>
                                {{ $person->url ?? '' }}
                            </td>
                            <td>
                                @can('person_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.people.show', $person->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('person_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.people.edit', $person->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('person_delete')
                                    <form action="{{ route('admin.people.destroy', $person->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('person_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.people.massDestroy') }}",
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
  let table = $('.datatable-Person:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
