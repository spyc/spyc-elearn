<div class="overlay"></div>
<div class="navbar navbar-inverse navbar-fixed-top sidebar">
    <ul class="nav nav-sidebar">
        <li class="sidebar-brand">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="fa fa-bookmark"></span>
                Community
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                @foreach($communities as $community)
                    <li><a href="#">{{ ucfirst($community->name) }}</a></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="#"><span class="fa fa-sticky-note-o"></span>Post</a>
        </li>

        <li>
            <a href="#"><span class="fa fa-line-chart"></span>Report</a>
        </li>

        @if(Auth::user()->isSudoer())
            <li>
                <a href="#">
                    <span class="fa fa-terminal fa-inverse"></span>
                    Terminal
                </a>
            </li>
        @endif
    </ul>
</div>

<div style="margin-top: 20px;">
    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </button>
</div>