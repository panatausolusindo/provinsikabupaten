<?php  namespace Panatau\ProvinsiKabupaten\Classes;

trait TraitGetProvinsiOptions {

    public function getProvinsiOptions($value, $formData)
    {
        $prov = UtilDbLoader::getProvinsi();
        $s = [];
        foreach($prov as $p) {
            $s[$p->id] = $p->name;
        }
        return $s;
    }
}