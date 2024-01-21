<?php 
class prosesCrud {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function proses_login($user,$pass)
    {
        $row = $this->db->prepare('SELECT * FROM users WHERE username=? AND password=md5(?)');
        $row->execute(array($user,$pass));
        $count = $row->rowCount();
        if($count > 0)
        {
            return $hasil = $row->fetch();
        }else{
            return 'gagal';
        }
    }

    function total_penjualan()
    {
        $query = 'SELECT SUM(quantity * barang.price) AS total_price FROM detail_transaksi AS detail JOIN barang AS barang ON detail.barang_id = barang.barang_id';
        $row = $this->db->prepare($query);
        $row->execute();
        $count = $row->rowCount();
        if($count > 0)
        {
            $hasil = $row->fetch(PDO::FETCH_ASSOC);
            return $hasil['total_price'];
        }else{
            return 'gagal';
        }
    }

    function total_pembelian()
    {
        $query = 'SELECT SUM(quantity * price_per_item) AS grand_total FROM pembelian_barang';
        $row = $this->db->prepare($query);
        $row->execute();
        $count = $row->rowCount();
        if($count > 0)
        {
            $hasil = $row->fetch(PDO::FETCH_ASSOC);
            return $hasil['grand_total'];
        }else{
            return 'gagal';
        }
    }



    function get_user_access_level($accessId)
    {
        $row = $this->db->prepare('SELECT role_name FROM roles WHERE role_id=?');
        $row->execute(array($accessId));
        $count = $row->rowCount();
        if($count > 0)
        {
            return $row->fetch()['role_name'];
        }else{
            return null;
        }
    }

    function tampil_data($tabel)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel");
        $row->execute();
        return $hasil = $row->fetchAll();
    }
    
    function tampil_data_id($tabel,$where,$id)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
        $row->execute(array($id));
        return $hasil = $row->fetch();
    }

    function tampil_data_where($tabel, $where, $id)
{
    $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = :id");
    $row->execute([':id' => $id]);
    return $hasil = $row->fetchAll();
}

    function join_data($table1, $table2, $commonColumn, $id) 
    {
        $query = "SELECT * FROM $table1 JOIN $table2 ON $table1.$commonColumn = $table2.$commonColumn WHERE $table1.$commonColumn = ?";
        $statement = $this->db->prepare($query);
        $statement->execute([$id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function tambah_data($tabel,$data)
    {
        $rowsSQL = array();
        $toBind = array();
        $columnNames = array_keys($data[0]);
        // looping untuk mengambil isi dari kolom / values
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue;
            }
            $rowsSQL[] = "(" . implode(", ", $params) . ")";
        }
        $sql = "INSERT INTO $tabel (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
        $row = $this->db->prepare($sql);
        //Bind our values.
        foreach($toBind as $param => $val){
            $row ->bindValue($param, $val);
        }
        //Execute our statement (i.e. insert the data).
        return $row ->execute();
    }

    function edit_data($tabel,$data,$where,$id)
    {
        $setPart = array();
        foreach ($data as $key => $value)
        {
            $setPart[] = $key."=:".$key;
        }
        $sql = "UPDATE $tabel SET ".implode(', ', $setPart)." WHERE $where = :id";
        $row = $this->db->prepare($sql);
        $row ->bindValue(':id',$id); // where
        foreach($data as $param => $val)
        {
            $row ->bindValue($param, $val);
        }
        return $row ->execute();
    }

    function hapus_data($tabel, $where, $id)
    {
        $sql = "DELETE FROM $tabel WHERE $where = ?";
        $row = $this->db->prepare($sql);
        return $row->execute([$id]);
    }

    function get_last_inserted_id()
    {
        return $this->db->lastInsertId();
    }

}