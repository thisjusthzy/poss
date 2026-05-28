<?php

namespace App\Models;
use CodeIgniter\Model;

class M_pj extends Model
{
	public function tampil($tabel)
	{
		return $this->db->table($tabel)
		                ->get()
		                ->getResult();
	}
	public function clear($table, $where)
	{
		return $this->db->table($table)
		                ->delete($where);
	}
	public function isi($table, $data)
	{
		return $this->db->table($table)
		                ->insert($data);
	}
	public function jo($table1, $table2, $on)
	{
		return $this->db->table($table1)
		                ->join($table2,$on)
		                ->get()
		                ->getResult();
}
    public function jo2($table, $where)
	{
		return $this->db->table($table )
		                ->getWhere($where)
		                ->getRow();

	}
	public function edit($table, $data, $where)
	{
		return $this->db->table($table)
		                ->update($data, $where);	                
	}
	public function gw($tabel, $where)
	{
		return $this->db->table($tabel)
		                ->getWhere($where)
		                ->getRow();
	}
	public function filter ($tabel, $awal, $akhir)
	{
		return $this->db->query(
			"SELECT * 
        FROM ".$tabel."
        JOIN product
        ON ".$tabel.".id_product=product.id_product
        WHERE ".$tabel.".tanggal
        BETWEEN'".$awal."'
        AND '".$akhir."'"

		)->getResult();
	}
	public function filter2 ($tabel, $awal, $akhir)
	{
		return $this->db->query(
			"SELECT * 
        FROM ".$tabel."
        WHERE ".$tabel.".tanggal
        BETWEEN'".$awal."'
        AND '".$akhir."'"

		)->getResult();
	}
	public function filter3($table, $awal, $akhir)
    {
        return $this->db->query("SELECT * from " . $table . "  where " . $table . ".tanggal BETWEEN '" . $awal . "' and '" . $akhir . "' ")->getResult();
    }
    public function filter4($table, $awal, $akhir)
    {
        return $this->db->query("SELECT * from " . $table . "  join product on " . $table . ".id_product = product.id_product where " . $table . ".tanggal BETWEEN '" . $awal . "' and '" . $akhir . "' ")->getResult();
    }

	public function getarray($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

}