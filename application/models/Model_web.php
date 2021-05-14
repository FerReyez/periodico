<?php

class Model_web extends CI_Model{

    public function listar_menu() {
        $this->db->select('*');
        $this->db->from('cat_noticia');
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

    public function listar_redes() {
        $this->db->where('estado','Activo');
        $this->db->select('*');
        $this->db->from('redes');
        $query =  $this->db->get();
        return $query->result_array();
    }

}