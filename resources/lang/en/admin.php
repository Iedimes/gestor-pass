<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'usuario' => [
        'title' => 'Usuario',

        'actions' => [
            'index' => 'Usuario',
            'create' => 'New Usuario',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'tipodeconexion' => [
        'title' => 'Tipodeconexion',

        'actions' => [
            'index' => 'Tipodeconexion',
            'create' => 'New Tipodeconexion',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'usuario' => [
        'title' => 'Usuario',

        'actions' => [
            'index' => 'Usuario',
            'create' => 'New Usuario',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'serrvidor' => [
        'title' => 'Serrvidor',

        'actions' => [
            'index' => 'Serrvidor',
            'create' => 'New Serrvidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'servidore' => [
        'title' => 'Servidores',

        'actions' => [
            'index' => 'Servidores',
            'create' => 'New Servidore',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'usuario' => [
        'title' => 'Usuario',

        'actions' => [
            'index' => 'Usuario',
            'create' => 'New Usuario',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',
            'servidor_id' => 'Servidor',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'credenciale' => [
        'title' => 'Credenciales',

        'actions' => [
            'index' => 'Credenciales',
            'create' => 'New Credenciale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',
            'servidor_id' => 'Servidor',
            'tipodeconexion_id' => 'Tipodeconexion',
            'estados_id' => 'Estados',
            'cat_informaciones_id' => 'Cat informaciones',

        ],
    ],

    'tipodeconexion' => [
        'title' => 'Tipodeconexion',

        'actions' => [
            'index' => 'Tipodeconexion',
            'create' => 'New Tipodeconexion',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'estado' => [
        'title' => 'Estados',

        'actions' => [
            'index' => 'Estados',
            'create' => 'New Estado',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'fecha' => 'Fecha',

        ],
    ],

    'cat-servicio' => [
        'title' => 'Cat Servicios',

        'actions' => [
            'index' => 'Cat Servicios',
            'create' => 'New Cat Servicio',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'estado' => [
        'title' => 'Estados',

        'actions' => [
            'index' => 'Estados',
            'create' => 'New Estado',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'grupo' => [
        'title' => 'Grupo',

        'actions' => [
            'index' => 'Grupo',
            'create' => 'New Grupo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'grupo' => [
        'title' => 'Grupo',

        'actions' => [
            'index' => 'Grupo',
            'create' => 'New Grupo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',
            'grupo_id' => 'Grupo',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'grupo_id' => 'Grupo',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'credenciale' => [
        'title' => 'Credenciales',

        'actions' => [
            'index' => 'Credenciales',
            'create' => 'New Credenciale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',
            'servidor_id' => 'Servidor',
            'tipodeconexion_id' => 'Tipodeconexion',
            'estados_id' => 'Estados',
            'cat_informaciones_id' => 'Cat informaciones',
            'grupo_id' => 'Grupo',

        ],
    ],

    'credenciale' => [
        'title' => 'Credenciales',

        'actions' => [
            'index' => 'Credenciales',
            'create' => 'New Credenciale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'credenciale' => [
        'title' => 'Credenciales',

        'actions' => [
            'index' => 'Credenciales',
            'create' => 'New Credenciale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',
            'servidor_id' => 'Servidor',
            'tipodeconexion_id' => 'Tipodeconexion',
            'estados_id' => 'Estados',
            'cat_informaciones_id' => 'Cat informaciones',
            'grupo_id' => 'Grupo',

        ],
    ],

    'credenciale' => [
        'title' => 'Credenciales',

        'actions' => [
            'index' => 'Credenciales',
            'create' => 'New Credenciale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',
            'servidor_id' => 'Servidor',
            'tipodeconexion_id' => 'Tipodeconexion',
            'estados_id' => 'Estados',
            'grupo_id' => 'Grupo',

        ],
    ],

    'credenciale' => [
        'title' => 'Credenciales',

        'actions' => [
            'index' => 'Credenciales',
            'create' => 'New Credenciale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enlace' => 'Enlace',
            'fecha' => 'Fecha',
            'servidor_id' => 'Servidor',
            'tipodeconexion_id' => 'Tipodeconexion',
            'estados_id' => 'Estados',
            'grupo_id' => 'Grupo',

        ],
    ],

    'estado' => [
        'title' => 'Estados',

        'actions' => [
            'index' => 'Estados',
            'create' => 'New Estado',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'grupo' => [
        'title' => 'Grupo',

        'actions' => [
            'index' => 'Grupo',
            'create' => 'New Grupo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'grupo_id' => 'Grupo',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',

        ],
    ],

    'servidor' => [
        'title' => 'Servidor',

        'actions' => [
            'index' => 'Servidor',
            'create' => 'New Servidor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'grupo_id' => 'Grupo',
            'ip' => 'Ip',
            'puerto' => 'Puerto',
            'tipodeconexion_id' => 'Tipodeconexion',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'credenciales_id' => 'Credenciales',
            'grupo_id' => 'Grupo',
            'version' => 'Version',
            'nombredebd' => 'Nombredebd',
            'fecha_vec_dominio' => 'Fecha vec dominio',
            'fecha_vec_ssl' => 'Fecha vec ssl',
            'versiones' => 'Versiones',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'credenciales_id' => 'Credenciales',
            'grupo_id' => 'Grupo',
            'tipo_debd' => 'Tipo debd',
            'nombredebd' => 'Nombredebd',
            'versiones' => 'Versiones',
            'ssl' => 'Ssl',
            'fecha_vec_dominio' => 'Fecha vec dominio',
            'fecha_vec_ssl' => 'Fecha vec ssl',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'credenciales_id' => 'Credenciales',
            'tipo_debd_id' => 'Tipo debd',
            'tipo_debd' => 'Tipo debd',
            'nombredebd' => 'Nombredebd',
            'versiones' => 'Versiones',
            'ssl' => 'Ssl',
            'fecha_vec_dominio' => 'Fecha vec dominio',
            'fecha_vec_ssl' => 'Fecha vec ssl',

        ],
    ],

    'tipo-debd' => [
        'title' => 'Tipo Debd',

        'actions' => [
            'index' => 'Tipo Debd',
            'create' => 'New Tipo Debd',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'tipo-debd' => [
        'title' => 'Tipo Debd',

        'actions' => [
            'index' => 'Tipo Debd',
            'create' => 'New Tipo Debd',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'version' => 'Version',

        ],
    ],

    'cat-informacione' => [
        'title' => 'Cat Informaciones',

        'actions' => [
            'index' => 'Cat Informaciones',
            'create' => 'New Cat Informacione',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'credenciales_id' => 'Credenciales',
            'tipo_debd_id' => 'Tipo debd',
            'nombredebd' => 'Nombredebd',
            'versiones' => 'Versiones',
            'ssl' => 'Ssl',
            'fecha_vec_dominio' => 'Fecha vec dominio',
            'fecha_vec_ssl' => 'Fecha vec ssl',

        ],
    ],

    'roleuser' => [
        'title' => 'Roleusers',

        'actions' => [
            'index' => 'Roleusers',
            'create' => 'New Roleuser',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'nombre' => 'Nombre',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'roleuser' => [
        'title' => 'Roleusers',

        'actions' => [
            'index' => 'Roleusers',
            'create' => 'New Roleuser',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'role_id' => 'Role',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
