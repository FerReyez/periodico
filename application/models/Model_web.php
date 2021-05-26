<?php

class Model_web extends CI_Model{

    /************************************************Menu****************************************************/

    public function listar_menu() {
        $this->db->select('
                            cn.id_cat_noticia,
                            cn.nc_noticia,
                            cn.nc_icono,
                            cn.nc_categoria,
                            (
                                select count(*) 
                                from cat_noticia 
                                where cat_noticia.nc_categoria = cn.id_cat_noticia

                            ) as count
                        ');
        $this->db->from('cat_noticia cn');
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function listar_opcion() {
        $this->db->where('nc_categoria !=',NULL);
        $this->db->select('*');
        $this->db->from('cat_noticia');
        $query = $this->db->get();
        return $query->result_array();
    }

    /************************************************Home****************************************************/

    public function listar_carrousel() {
        $this->db->where('estado','Activo');
        $this->db->select('*');
        $this->db->from('carrousel');
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function ultima_edicion() {
        $this->db->order_by('id_edicion', 'DESC');
        $this->db->select('*');
        $this->db->from('edicion');
        $this->db->limit(1);
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function ultimas_noticias($edicion) {
        $this->db->where('edi.id_edicion', $edicion);
        $this->db->where('noti_foto.principal', 1);
        $this->db->order_by('noti.id_noticia', 'RANDOM');
        $this->db->select('
                            noti.id_noticia,
                            noti.Titular,
                            noti.Subtitulo,
                            LEFT(noti.Nota,500) AS Nota,
                            noti.Fecha,
                            noti.Editor,
                            noti.Reportero,
                            noti.Visita,
                            cat.nc_noticia,
                            cat.nc_icono,
                            foto.url,
                            foto.Fotografo
        ');
        $this->db->from('noticias noti');
        $this->db->join('cat_noticia cat','cat.id_cat_noticia = noti.id_cat_noticia');
        $this->db->join('edicion_noticia ed_not','ed_not.id_noticia = noti.id_noticia');
        $this->db->join('edicion edi','edi.id_edicion = ed_not.id_edicion');
        $this->db->join('noticia_foto noti_foto','noti_foto.id_noticia = noti.id_noticia');
        $this->db->join('fotografia foto','foto.id_foto = noti_foto.id_foto');
        $this->db->limit(3);
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function ultimas_ediciones(){
        $this->db->order_by('edi.id_edicion', 'DESC');
        $this->db->select('
                            edi.id_edicion,
                            edi.fecha_publicacion,
                            edi.num_edicion,
                            (
                                select noti.id_noticia from noticias noti
                                inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                where edi_noti.id_edicion = edi.id_edicion 
                                order by RAND()
                                limit 1
                            ) as Noticia,
                            (
                                select Titular from noticias noti
                                inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                where edi_noti.id_edicion = edi.id_edicion
                                order by noti.id_noticia
                                limit 1
                            ) as Titular,
                            (
                                select LEFT(noti.Nota,300) AS Nota from noticias noti
                                inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                where edi_noti.id_edicion = edi.id_edicion
                                order by noti.id_noticia
                                limit 1
                            ) as Nota,
                            (
                                select Fecha from noticias noti
                                inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                where edi_noti.id_edicion = edi.id_edicion
                                order by noti.id_noticia
                                limit 1
                            ) as Fecha,
                            (
                                select foto.url from noticias noti
                                inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                inner join noticia_foto noti_foto on noti_foto.id_noticia = noti.id_noticia
                                inner join fotografia foto on foto.id_foto = noti_foto.id_foto
                                where edi_noti.id_edicion = edi.id_edicion
                                order by noti.id_noticia
                                limit 1
                            ) as url
                            
        ');
        $this->db->from('edicion edi');
        $this->db->limit(3);
        $query =  $this->db->get();
        return $query->result_array();
    }

    /************************************************Footer****************************************************/

    public function listar_redes() {
        $this->db->where('estado','Activo');
        $this->db->select('*');
        $this->db->from('redes');
        $query =  $this->db->get();
        return $query->result_array();
    }

    /************************************************Categorias****************************************************/

    public function ultima_categoria($id_categoria){
        $this->db->where('id_cat_noticia',$id_categoria);
        $this->db->select('*');
        $this->db->from('cat_noticia');
        $this->db->limit(1);
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function listar_editoriales($buscar, $inicio = FALSE, $cantidad = FALSE){
        $estado = 'Activo';
        $this->db->where('edi.estado', $estado);
        $this->db->like('edi.num_edicion', $buscar);
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $this->db->order_by('edi.fecha_publicacion', 'DESC');
        $this->db->select('
                        substring(edi.fecha_publicacion, 1, 10) as fecha_publicacion,
                        edi.num_edicion,
                        edi.estado,
                        (
                            select foto.url from noticias noti
                            inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                            inner join noticia_foto noti_foto on noti_foto.id_noticia = noti.id_noticia
                            inner join fotografia foto on foto.id_foto = noti_foto.id_foto
                            inner join edicion edt on edi_noti.id_edicion = edt.id_edicion
                            where edt.num_edicion = edi.num_edicion
                            order by noti.id_noticia desc
                            limit 1

                        ) as url,
                        (
                            select Titular from noticias noti
                            inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                            where edi_noti.id_edicion = edi.id_edicion
                            order by noti.id_noticia desc
                            limit 1
                        ) as titular,
                        (
                            select substring(noti.Nota, 1, locate(".", noti.Nota)) from noticias noti
                                inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                where edi_noti.id_edicion = edi.id_edicion
                                order by noti.id_noticia desc
                                limit 1
                        ) as nota
        ');
        $this->db->from('edicion edi');
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function obtener_noticias($idEdicion,$buscar,$inicio = FALSE,$cantidad = FALSE){
        $this->db->where('en.id_edicion', $idEdicion);
        $this->db->like("noti.Titular", $buscar);
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $this->db->order_by('noti.Fecha', 'DESC');
        $this->db->select(' noti.id_noticia, 
                            noti.Titular, 
                            noti.Subtitulo, 
                            noti.Fecha, 
                            noti.Editor, 
                            noti.Reportero, 
                                (
                                    select foto.url from noticias noti
                                    inner join edicion_noticia edi_noti on noti.id_noticia = edi_noti.id_noticia
                                    inner join noticia_foto noti_foto on noti_foto.id_noticia = noti.id_noticia
                                    inner join fotografia foto on foto.id_foto = noti_foto.id_foto
                                    inner join edicion edt on edi_noti.id_edicion = edt.id_edicion
                                    where edt.num_edicion = '.$idEdicion.'
                                    order by noti.id_noticia desc
                                    limit 1
        
                                ) as url  '
                        );
        $this->db->from('noticias noti');
        $this->db->join('edicion_noticia en', 'en.id_noticia = noti.id_noticia');
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function listar_noticias($categoria,$buscar,$inicio = FALSE,$cantidad = FALSE) {
        $this->db->where('cat.id_cat_noticia', $categoria);
        $this->db->like("noti.Titular", $buscar);
        $this->db->where('noti_foto.principal', 1);
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $this->db->order_by('noti.Fecha', 'DESC');
        $this->db->select('
                            noti.id_noticia,
                            noti.Titular,
                            noti.Subtitulo,
                            LEFT(noti.Nota,150) AS Nota,
                            noti.Fecha,
                            noti.Editor,
                            noti.Reportero,
                            noti.Visita,
                            cat.nc_noticia,
                            cat.nc_icono,
                            foto.url,
                            foto.Fotografo
        ');
        $this->db->from('noticias noti');
        $this->db->join('cat_noticia cat','cat.id_cat_noticia = noti.id_cat_noticia');
        $this->db->join('noticia_foto noti_foto','noti_foto.id_noticia = noti.id_noticia');
        $this->db->join('fotografia foto','foto.id_foto = noti_foto.id_foto');
        $query =  $this->db->get();
        return $query->result_array();
    }

    /************************************************Ver Noticia***************************************************/

    public function get_noticia($notiId){
        $this->db->where('noti.id_noticia', $notiId);
        $this->db->select('
                noti.id_noticia,
                noti.Titular,
                noti.Subtitulo,
                noti.Nota,
                noti.Fecha,
                noti.Editor,
                noti.Reportero,
                noti.Visita,
                cat.nc_noticia,
                cat.nc_icono,
                foto.url,
                foto.Fotografo
        ');
        $this->db->from('noticias noti');
        $this->db->join('cat_noticia cat','cat.id_cat_noticia = noti.id_cat_noticia','left');
        $this->db->join('edicion_noticia ed_not','ed_not.id_noticia = noti.id_noticia','left');
        $this->db->join('edicion edi','edi.id_edicion = ed_not.id_edicion','left');
        $this->db->join('noticia_foto noti_foto','noti_foto.id_noticia = noti.id_noticia','left');
        $this->db->join('fotografia foto','foto.id_foto = noti_foto.id_foto','left');
        $this->db->limit(1);
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function sugerencia_noticias() {
        $this->db->where('noti_foto.principal', 1);
        $this->db->order_by('noti.id_noticia', 'RANDOM');
        $this->db->select('
                            noti.id_noticia,
                            noti.Titular,
                            noti.Subtitulo,
                            LEFT(noti.Nota,250) AS Nota,
                            noti.Fecha,
                            noti.Editor,
                            noti.Reportero,
                            noti.Visita,
                            cat.nc_noticia,
                            cat.nc_icono,
                            foto.url,
                            foto.Fotografo
        ');
        $this->db->from('noticias noti');
        $this->db->join('cat_noticia cat','cat.id_cat_noticia = noti.id_cat_noticia');
        $this->db->join('edicion_noticia ed_not','ed_not.id_noticia = noti.id_noticia');
        $this->db->join('edicion edi','edi.id_edicion = ed_not.id_edicion');
        $this->db->join('noticia_foto noti_foto','noti_foto.id_noticia = noti.id_noticia');
        $this->db->join('fotografia foto','foto.id_foto = noti_foto.id_foto');
        $this->db->limit(9);
        $query =  $this->db->get();
        return $query->result_array();
    }
}