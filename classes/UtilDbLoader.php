<?php namespace Panatau\ProvinsiKabupaten\Classes;

use Cache;
use DB;

class UtilDbLoader
{
    public static function getProvinsi()
    {
        return Cache::remember('daftarProvinsiIndonesia', 3600, function() {
            $sql = <<<SQL
select id, name from reg_provinces
SQL;
            return DB::select($sql);
        });
    }

    public static function getKabupaten($kodeProvinsi = '')
    {
        $key = "daftarKabupaten{$kodeProvinsi}";
        return Cache::remember($key, 3600, function() use($kodeProvinsi) {
            $sql = <<<SQL
select id, name from reg_regencies
SQL;
            if(strlen($kodeProvinsi)>0) {
                $sql .= ' where province_id = ?';
                return DB::select($sql, [$kodeProvinsi]);
            }
            return DB::select($sql);
        });
    }

    public static function getKecamatan($kodeKabupaten = '')
    {
        $key = "daftarKecamatan{$kodeKabupaten}";
        return Cache::remember($key, 3600, function() use($kodeKabupaten) {
            $sql = <<<SQL
select id, name from reg_districts
SQL;
            if(strlen($kodeKabupaten)>0) {
                $sql .= ' where regency_id = ?';
                return DB::select($sql, [$kodeKabupaten]);
            }
            return DB::select($sql);
        });
    }

    public static function getKelurahanDesa($kodeKecamatan = '')
    {
        $key = "daftarKecamatan{$kodeKecamatan}";
        return Cache::remember($key, 3600, function() use($kodeKecamatan) {
            $sql = <<<SQL
select id, name from reg_villages
SQL;
            if(strlen($kodeKecamatan)>0) {
                $sql .= ' where district_id = ?';
                return DB::select($sql, [$kodeKecamatan]);
            }
            return DB::select($sql);
        });
    }

    public static function getLabelProvinsi($idProvinsi)
    {
        return Cache::remember("getLabelProvinsi{$idProvinsi}", 3600, function() use($idProvinsi) {
            return DB::table('reg_provinces')->where('id', $idProvinsi)->value('name');
        });
    }

    public static function getLabelKabupaten($idKabupaten)
    {
        return Cache::remember("getLabelKabupaten{$idKabupaten}", 3600, function() use($idKabupaten) {
            return DB::table('reg_regencies')->where('id', $idKabupaten)->value('name');
        });
    }

    public static function getLabelKecamatan($idKecamatan)
    {
        return Cache::remember("getLabelKecamatan{$idKecamatan}", 3600, function() use($idKecamatan) {
            return DB::table('reg_districts')->where('id', $idKecamatan)->value('name');
        });
    }

    public static function getLabelKelurahanDesa($idKelurahanDesa)
    {
        return Cache::remember("getLabelKelurahanDesa{$idKelurahanDesa}", 3600, function() use($idKelurahanDesa) {
            return DB::table('reg_villages')->where('id', $idKelurahanDesa)->value('name');
        });
    }
}