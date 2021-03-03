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
$route['noticia_admin']                      = 'Controller_noticia/vista_noticia';

/***********************************Web**********************************************/
$route['inicio'] = 'Controller_web/index_web';
$route['noticias'] = 'Controller_web/listaNoticias';
$route['noticia'] = 'Controller_web/noticias';
$route['editorial'] = 'Controller_web/editorial';
$route['personas'] = 'Controller_web/personas';
$route['persona'] = 'Controller_web/personasInd';