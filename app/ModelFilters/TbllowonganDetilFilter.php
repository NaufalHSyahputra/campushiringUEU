<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TbllowonganDetailFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = ['tbllowongan' => ['title']];

    public function tbllowonganSetup($query)
    {
        return $query->LowonganActive();
    }

    public function gajiMin($gaji){
        return $this->where('salary_min', '>=', $gaji);
    }

    public function fakultasID($fakultas_id){
        return $this->where('fakultas_id', $fakultas_id);
    }

    public function skillID($skill_id){
        return $this->where('skill_id', $skill_id);
    }

    public function kotaID($kota_id){
        return $this->where('kota_id', $kota_id);
    }

    public function lowTypeID($low_type_id){
        return $this->where('low_type_id', $low_type_id);
    }
}
