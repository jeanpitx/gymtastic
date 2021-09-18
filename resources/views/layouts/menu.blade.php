<li class="nav-item {{ Request::is('/*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/home') }}">
        <i class="nav-icon icon-home"></i>
        <span>Inicio</span>
    </a>
</li>

@if(Auth::user()->hasAnyRole(['admin','root']) && Auth::user()->estado=="active")
    <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="nav-icon icon-user"></i>
            <span>@lang('models/roles.plural')</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('parametros*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('parametros.index') }}">
            <i class="nav-icon icon-settings"></i>
            <span>Configuración</span>
        </a>
    </li>
@endif


@if(Auth::user()->hasAnyRole(['web','root']) && Auth::user()->estado=="active")
    <li class="nav-item {{ Request::is('enlaces*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('enlaces.index') }}">
            <i class="nav-icon icon-link"></i>
            <span>@lang('models/enlaces.plural')</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('internas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('internas.index') }}">
            <i class="nav-icon icon-doc"></i>
            <span>@lang('models/internas.plural')</span>
        </a>
    </li>   
    <li class="nav-item {{ Request::is('emails*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('emails.index') }}">
            <i class="nav-icon icon-paper-plane"></i>
            <span>@lang('models/emails.plural')</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('archives*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('archives.index') }}">
            <i class="nav-icon icon-cloud-upload"></i>
            <span>@lang('models/archives.plural')</span>
        </a>
    </li>
@endif