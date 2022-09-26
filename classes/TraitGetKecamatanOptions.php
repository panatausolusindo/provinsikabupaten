<?php  namespace Panatau\ProvinsiKabupaten\Classes;

trait TraitGetKecamatanOptions {
    public function getKecamatanOptions($value, $formData)
    {
        $kab = UtilDbLoader::getKecamatan($this->kabupaten_id?:null);
        $s = [];
        foreach($kab as $p) {
            $s[$p->id] = $p->name;
        }
        return $s;
    }

}