@foreach($items as $item)
    <tr class="gradeX">
        <td ><a href="{{ route('menus.edit',['menus' => $item->id]) }}">{{ $paddingLeft }}
                <p><b style="color: orange;">&#91;</b>&nbsp;{!! $item->title !!}&nbsp;<b style="color: orange;">&#93;</b></p>
            </a>
        </td>
        <td><b style="color: orange;">&#123;</b>&nbsp;<a href="{{ $item->url() }}" target="_blank">{{ $item->url() }}</a>&nbsp;<b style="color: orange;">&#125;</b></td>
        <td>
            <a href="{{ route('menus.edit',['menus' => $item->id]) }}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Редактировать</a>
            {!! Form::open(['url' => route('menus.destroy',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
            {{ method_field('DELETE') }}
            {!! Form::button('<i class="glyphicon glyphicon-remove"></i> Удалить', ['class' => 'btn btn-danger btn-xs pull-right','type'=>'submit']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @if($item->hasChildren())
        @include(env('THEME').'.admin.custom-menu-items', array('items' => $item->children(),'paddingLeft' => $paddingLeft.'&raquo;&raquo;&raquo;'))
    @endif
@endforeach
