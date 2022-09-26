<?php  namespace Panatau\ProvinsiKabupaten\Classes;

trait TraitGetKabupatenOptions {
    function getKabupatenOptions($value, $formData) 
    {
        $kab = UtilDbLoader::getKabupaten($this->provinsi_id?:null);
        $s = [];
        foreach($kab as $p) {
            $s[$p->id] = $p->name;
        }
        return $s;
    }
}