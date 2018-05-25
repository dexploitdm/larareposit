@foreach($items as $item)
<li class="dropdown" id="headerNavigationItems" {{ (URL::current() == $item->url()) ? "class=active" : '' }} >
    <a href="{{ $item->url() }}">{{ $item->title }}</a>
    @if($item->hasChildren())
    <ul class="dropdown-menu dropdown-with-icons">
        @include(env('THEME').'.DropcustomMenuItems',['items'=>$item->children()])
    </ul>
    @endif
</li>
@endforeach