@foreach($items as $item)
<li class="dropdown" id="headerNavigationItems" {{ (URL::current() == $item->url()) ? "class=active" : '' }} >
    <a href="{{ $item->url() }}">{{ $item->title }}</a>
</li>
@endforeach