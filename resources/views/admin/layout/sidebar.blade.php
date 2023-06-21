<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
           @if (Auth::user()->rol->role_id == 2)
           <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/credenciales/inicio') }}"><i class="nav-icon icon-magnet"></i> INICIO</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipodeconexions') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.tipodeconexion.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.estado.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/servidors') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.servidor.title') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/cat-informaciones') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.cat-informacione.title') }}</a></li> --}}
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/grupos') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.grupo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-debds') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.tipo-debd.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/verifications') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.verification.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roleusers') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.roleuser.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-servicios') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.tipo-servicio.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
           <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
            @endif

            @if (Auth::user()->rol->role_id == 1)
           <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/credenciales/inicio') }}"><i class="nav-icon icon-magnet"></i> Inicio</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipodeconexions') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.tipodeconexion.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.estado.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/servidors') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.servidor.title') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/cat-informaciones') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.cat-informacione.title') }}</a></li> --}}
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/grupos') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.grupo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-debds') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.tipo-debd.title') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/verifications') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.verification.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/roleusers') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.roleuser.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.role.title') }}</a></li> --}}
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-servicios') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.tipo-servicio.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
           {{-- <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li> --}}
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
            @endif

            @if (Auth::user()->rol->role_id == 3)
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/credenciales/inicio') }}"><i class="nav-icon icon-magnet"></i> Inicio</a></li>
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/tipodeconexions') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.tipodeconexion.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.estado.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/servidors') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.servidor.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/cat-informaciones') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.cat-informacione.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/grupos') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.grupo.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-debds') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.tipo-debd.title') }}</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/verifications') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.verification.title') }}</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/roleusers') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.roleuser.title') }}</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.role.title') }}</a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-servicios') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.tipo-servicio.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            {{-- <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li> --}}
             {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
             {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
             @endif
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
