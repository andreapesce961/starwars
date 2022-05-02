@extends('layouts.admin')
@section('content')
@can('planet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.planets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.planet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.planet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Planet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.diameter') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.rotation_period') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.orbital_period') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.gravity') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.population') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.climate') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.terrain') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.surface_water') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.residents') }}
                        </th>
                        <th>
                            {{ trans('cruds.planet.fields.url') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($people as $key => $item)
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
                    @foreach($planets as $key => $planet)
                        <tr data-entry-id="{{ $planet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $planet->id ?? '' }}
                            </td>
                            <td>
                                {{ $planet->name ?? '' }}
                            </td>
                            <td>
                                {{ $planet->diameter ?? '' }}
                            </td>
                            <td>
                                {{ $planet->rotation_period ?? '' }}
                            </td>
                            <td>
                                {{ $planet->orbital_period ?? '' }}
                            </td>
                            <td>
                                {{ $planet->gravity ?? '' }}
                            </td>
                            <td>
                                {{ $planet->population ?? '' }}
                            </td>
                            <td>
                                {{ $planet->climate ?? '' }}
                            </td>
                            <td>
                                {{ $planet->terrain ?? '' }}
                            </td>
                            <td>
                                {{ $planet->surface_water ?? '' }}
                            </td>
                            <td>
                                @foreach($planet->residents as $key => $item)
                                    <span class="badge badge-info">{{ $item->url }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $planet->url ?? '' }}
                            </td>
                            <td>
                                @can('planet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.planets.show', $planet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('planet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.planets.edit', $planet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('planet_delete')
                                    <form action="{{ route('admin.planets.destroy', $planet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('planet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.planets.massDestroy') }}",
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
  let table = $('.datatable-Planet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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