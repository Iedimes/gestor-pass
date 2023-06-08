<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuario::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidor::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidor::class, static function (Faker\Generator $faker) {
    return [
        'ip' => $faker->randomNumber(5),
        'puerto' => $faker->randomNumber(5),
        'tipodeconexion_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tipodeconexion::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuario::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Serrvidor::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidore::class, static function (Faker\Generator $faker) {
    return [
        'ip' => $faker->randomNumber(5),
        'puerto' => $faker->randomNumber(5),
        'tipodeconexion_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidor::class, static function (Faker\Generator $faker) {
    return [
        'ip' => $faker->sentence,
        'puerto' => $faker->randomNumber(5),
        'tipodeconexion_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuario::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'servidor_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Credenciale::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'servidor_id' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'estados_id' => $faker->sentence,
        'cat_informaciones_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Estado::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatInformacione::class, static function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatServicio::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidor::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'ip' => $faker->sentence,
        'puerto' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Grupo::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Grupo::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatInformacione::class, static function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->sentence,
        'fecha' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidor::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'ip' => $faker->sentence,
        'puerto' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Servidor::class, static function (Faker\Generator $faker) {
    return [
        'grupo_id' => $faker->sentence,
        'ip' => $faker->sentence,
        'puerto' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Credenciale::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'servidor_id' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'estados_id' => $faker->sentence,
        'cat_informaciones_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Credenciale::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Credenciale::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'servidor_id' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'estados_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Credenciale::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'fecha' => $faker->sentence,
        'servidor_id' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'estados_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Credenciale::class, static function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->sentence,
        'contraseña' => $faker->sentence,
        'enlace' => $faker->sentence,
        'fecha' => $faker->date(),
        'servidor_id' => $faker->sentence,
        'tipodeconexion_id' => $faker->sentence,
        'estados_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatInformacione::class, static function (Faker\Generator $faker) {
    return [
        'credenciales_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        'version' => $faker->sentence,
        'nombredebd' => $faker->sentence,
        'fecha_vec_dominio' => $faker->date(),
        'fecha_vec_ssl' => $faker->date(),
        'versiones' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatInformacione::class, static function (Faker\Generator $faker) {
    return [
        'credenciales_id' => $faker->sentence,
        'grupo_id' => $faker->sentence,
        'tipo_debd' => $faker->sentence,
        'nombredebd' => $faker->sentence,
        'versiones' => $faker->sentence,
        'ssl' => $faker->sentence,
        'fecha_vec_dominio' => $faker->date(),
        'fecha_vec_ssl' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatInformacione::class, static function (Faker\Generator $faker) {
    return [
        'credenciales_id' => $faker->sentence,
        'tipo_debd_id' => $faker->sentence,
        'tipo_debd' => $faker->sentence,
        'nombredebd' => $faker->sentence,
        'versiones' => $faker->sentence,
        'ssl' => $faker->sentence,
        'fecha_vec_dominio' => $faker->date(),
        'fecha_vec_ssl' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TipoDebd::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TipoDebd::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'version' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CatInformacione::class, static function (Faker\Generator $faker) {
    return [
        'credenciales_id' => $faker->sentence,
        'tipo_debd_id' => $faker->sentence,
        'nombredebd' => $faker->sentence,
        'versiones' => $faker->sentence,
        'ssl' => $faker->sentence,
        'fecha_vec_dominio' => $faker->date(),
        'fecha_vec_ssl' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Verification::class, static function (Faker\Generator $faker) {
    return [
        'admin_users' => $faker->randomNumber(5),
        'password' => bcrypt($faker->password),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Verification::class, static function (Faker\Generator $faker) {
    return [
        'admin_users_id' => $faker->randomNumber(5),
        'password' => bcrypt($faker->password),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
