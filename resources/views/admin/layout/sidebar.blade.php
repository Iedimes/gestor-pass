<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
           @if (Auth::user()->rol->role_id == 2)
           <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/credenciales/inicio') }}"><i class="fa fa-bar-chart" style="font-size: 24px;"></i>&nbsp;&nbsp;Tablero</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados') }}"><i class="fa fa-retweet" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.estado.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/servidors') }}"><i class="fa fa-server" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.servidor.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/grupos') }}"><i class="fa fa-users" style="font-size: 24px;"></i> &nbsp;&nbsp;{{ trans('admin.grupo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-debds') }}"><i class="fa fa-database" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.tipo-debd.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipodeconexions') }}"><i class="fa fa-signal" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.tipodeconexion.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-servicios') }}"><i class="fa fa-book" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.tipo-servicio.title') }}</a></li>
           <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="fa fa-user" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ __('Manage access') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/verifications') }}"><i class="fa fa-wrench" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.verification.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="fa fa-check-square" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roleusers') }}"><i class="fa fa-list" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.roleuser.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="fa fa-language" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ __('Translations') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/cat-informaciones') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.cat-informacione.title') }}</a></li> --}}
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
           {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
            @endif

            @if (Auth::user()->rol->role_id == 1)
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/credenciales/inicio') }}"><i class="fa fa-bar-chart" style="font-size: 24px;"></i>&nbsp;&nbsp;Tablero</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados') }}"><i class="fa fa-retweet" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.estado.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/servidors') }}"><i class="fa fa-server" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.servidor.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/grupos') }}"><i class="fa fa-users" style="font-size: 24px;"></i> &nbsp;&nbsp;{{ trans('admin.grupo.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-debds') }}"><i class="fa fa-database" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.tipo-debd.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipodeconexions') }}"><i class="fa fa-signal" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.tipodeconexion.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-servicios') }}"><i class="fa fa-book" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ trans('admin.tipo-servicio.title') }}</a></li>
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="fa fa-user" style="font-size: 24px;"></i>&nbsp;&nbsp; {{ __('Manage access') }}</a></li>
            @endif

            @if (Auth::user()->rol->role_id == 3)
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/credenciales/inicio') }}"><i class="fa fa-bar-chart" style="font-size: 24px;"></i>&nbsp;&nbsp;Tablero</a></li>
             @endif
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
