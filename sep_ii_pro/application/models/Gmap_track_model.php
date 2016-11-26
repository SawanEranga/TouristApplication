<?php



class Gmap_track_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }

    public function load_cords(){
        return $this
                ->db
                ->query("SELECT
                            tgt.lat,
                            tgt.lon,
                            TIME_FORMAT(tgt.`synctimestamp`, '%H:%i') as time
                        FROM
                            tbl_gps_tracking AS tgt
                        WHERE tgt.accuracy < 30 
                        ORDER BY
                            tgt.synctimestamp ASC;")->result();
//        AND id_gps_details = 79 OR id_gps_details = 324
    }
    
    public function load_trip_loc(){
        $selct_trp = $this->input->post('selct_trp');
        return $this
                    ->db
                    ->query("SELECT
                                tp.pl_name,
                                tp.pl_lat AS lat,
                                tp.pl_long AS lon,
                                tp.pl_name,
                                tp.pl_description
                            FROM
                                tbl_trip_plan_locs AS tpl
                            INNER JOIN tbl_places AS tp ON
                                tp.pl_id = tpl.pl_id
                            WHERE tpl.trip_plan_id = '{$selct_trp}'
                            ORDER BY tpl.trip_plan_locs_id ASC;")->result();
    }
}
