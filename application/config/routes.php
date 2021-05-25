<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$route['default_controller']        = "Controller_web/index_web";
$route['404_override']              = '';

/***********************************Admin**********************************************/
$route['orden']                     = 'Controller_menu/vista_orden';
$route['pantallas']                 = 'Controller_pantalla/vista_pantalla';
$route['options_menu']              = 'Controller_menu_opciones/vista_menu_opciones';
$route['permissions_roles']         = 'Controller_roles/vista_roles';
$route['users']                     = 'Controller_usuarios/vista_usuario';
$route['menu']                      = 'Controller_menu/vista_menu';
$route['log_of_session']            = 'Controller_bitacora/estado_actividad';
$route['log_of_actions']            = 'Controller_bitacora/mostrar_bitacora';
$route['sistema']                   = 'Controller_home/principal';
$route['login']                     = 'Controller_home/c_login';
$route['close_session']             = 'Controller_home/cerrar';
$route['tema']                      = 'Controller_tema/vista_tema';

/***********************************Periodico**********************************************/
$route['noticia_admin']                      = 'periodico/Controller_noticia/vista_noticia';
$route['edicion_admin']                      = 'periodico/Controller_edicion/vista_edicion';
$route['categoria_admin']                    = 'periodico/Controller_categoria/vista_categoria';
$route['perfiles']                           = 'periodico/Controller_perfiles/vista_perfiles';
$route['carrousel']                          = 'periodico/Controller_carrousel/vista_carrousel';
$route['redes']                              = 'periodico/Controller_redes/vista_redes';
$route['image']                              = 'periodico/Controller_prueba/vista_image';

/***********************************Web**********************************************/
$route['inicio'] = 'Controller_web/index_web';
$route['noticias'] = 'Controller_web/listaNoticias';
$route['noticia'] = 'Controller_web/noticias';
$route['editorial'] = 'periodico/Controller_edicionPrincipal/vista_edicionPrincipal';
$route['personas'] = 'Controller_web/personas';
$route['persona'] = 'Controller_web/personasInd';

/***********************************Imagenes**********************************************/
$route['imagen_subir']                      = 'periodico/Controller_noticia/upload';
$route['imagen_borrar']                      = 'periodico/Controller_noticia/delete';
$route['imagen_obtener']                     = 'periodico/Controller_noticia/obtener_img';