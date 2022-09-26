<?php  namespace Panatau\ProvinsiKabupaten\Classes;

trait TraitGetKelurahanDesaOptions {

    public function getKelurahanDesaOptions($value, $formData)
    {
        $keldes = UtilDbLoader::getKelurahanDesa($this->kecamatan_id?:null);
        $s = [];
        foreach($keldes as $p) {
            $s[$p->id] = $p->name;
        }
        return $s;
    }

}