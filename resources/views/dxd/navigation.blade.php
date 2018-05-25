<nav class="navbar navbar-primary navbar-fixed-top" id="sectionsNav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Larareposit</a>
        </div>
        @if($menu)
            <div class="collapse navbar-collapse">
                <ul id="nav" class="nav navbar-nav navbar-right">
                    @include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
                </ul>
            </div>
        @endif
    </div>
</nav>