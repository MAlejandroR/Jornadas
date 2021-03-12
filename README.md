<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Planteamiento del proyecto

 Comenzamos realizando el diseño de pantalla
 
 **Sobre datos** (ver .env)
* dominio ***feria.infenlaces.com***
* ubicación: *vesta de infenlaces.com*


 Se usa Tailwind css, y vamos personalizando en el fichero tailgind.config.js los nuevos estilos a incluir
 
 Plateamos el siguiente estilo:



[Diseño de Estilo con tailwind](./documentacion/diseño_estilo.md)
### Seguimiento
1. Subir a vesta creando un usuario ***jornadas*** y url ***jornadas.empleo2021.infenlaces.com***
2. Gestionar este git
3. Crear pantalla principal
4. ALta de empresas



#### Alta de empresas

1. *(OK)* Migración 
   <pre>  
    php artisan serve migrate
   </pre>
2. *(OK)*Seeder de la tabal ciclo
   <pre>
    php artisan db:seed
   </pre>
3. *(OK)*Ajax para visualizar  ciclos en formulario (check) a partir de una familia
4. Guardar datos de empresa
  
    Ahora una empresa puede tener muchos ciclos => cambiar la tabla y añadir una nueva 
  
   *(OK)*Volver a hacer migraciones 
  
    Mirar el tema de integridad referencial
  
    Guardar correctamente los datos

4.1. Quiero instalar un plugin para los formularios de tailwindcss
   https://laravel-news.com/tailwindcss-custom-forms

5.- hacer un grud de empresas para su gestión
   

##Problemas

Las comas de los nombre del ciclo me dan problemas para trabajar con jquery por cómo paso los datos
Pendiente hacerlo de otra forma, ahora funciona (ver comentarios en el método get invocado por ajax)

4/3 18:00 Está corregida la vista de crear empresa
Falta
   De alguna forma que crear y editar se nutran de la misma plantilla
A1.-    Pantalla de editar para visualziar/cambiar los datos de una empresa

