<?php
namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TbllowonganFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */

    public function title($title){
        return $this->whereLike('title', $title);
    }

    public function fakultasID($fakultas_id){
        return $this->related('tbllowongan_detil', 'fakultas_id', $fakultas_id);
    }

    public function levelID($level_id){
        return $this->related('tbllowongan_detil', 'level_id', $level_id);
    }

    public function kotaID($kota_id){
        return $this->related('tbllowongan_detil', 'kota_id', $kota_id);
    }

    public function lowTypeID($low_type_id){
        return $this->related('tbllowongan_detil', 'low_type_id', $low_type_id);
    }

}
