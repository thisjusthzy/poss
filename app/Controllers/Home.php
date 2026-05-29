<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_pj;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{



   public function index()
    {
        $model = new M_pj();
         $data['user']=$model->tampil('user');
   
        if (session()->get('id_user')>0) {
            return redirect()->to('Home/log_out');
         }else{

        echo view('login');
       
         
    }
}

 public function aksi_login()
    {
       $evan = new M_pj();
       $u=$this->request->getPost('u'); 
       $p=$this->request->getPost('p');
       $data=array(
           
        'username'=>$u,
        'password'=>md5($p)
    );
      
      $cek=$evan->gw('user',$data);

      if (!empty($cek)) {
          session()->set('id_user',$cek->id_user);
          session()->set('username',$cek->username);
          session()->set('level',$cek->level);
          session()->set('foto',$cek->foto);
    return redirect()->to('/Home/dashboard');
}else{
    return redirect()->to('/Home/login');
   }
}

    public function reset_p($id)
{
    if (session()->get('id_user')>0) {
   $evan = new M_pj();
   $where=array('id_user' => $id );
   $data= array(
    'password' => '12345');
   $evan->edit('user',$data,$where);
   return redirect ()->to('Home');
   }else{
            return redirect()->to('Home/login');
        }
    }

    public function login()
    {
      
         echo view ('login');
    }

public function dashboard()
{
    if (session()->get('id_user') > 0) {
        $db = \Config\Database::connect();

        $data['total_barang'] = $db->table('product')->countAllResults();

        $stok = $db->table('product')
            ->selectSum('stok_product')
            ->get()
            ->getRow();

        $data['total_stok'] = $stok->stok_product ?? 0;

        $data['total_barang_masuk'] = $db->table('barangmasuk')->countAllResults();

        $data['total_transaksi'] = $db->table('transaksi')->countAllResults();

        $pendapatan = $db->table('transaksi')
            ->select('SUM(jumlah * harga) AS total_pendapatan')
            ->get()
            ->getRow();

        $data['total_pendapatan'] = $pendapatan->total_pendapatan ?? 0;

        $data['stok_rendah'] = $db->table('product')
            ->where('stok_product <=', 5)
            ->countAllResults();

        $data['transaksi_terbaru'] = $db->table('transaksi')
            ->join('product', 'transaksi.id_product = product.id_product')
            ->select('transaksi.*, product.nama_product')
            ->orderBy('id_transaksi', 'DESC')
            ->limit(5)
            ->get()
            ->getResult();

        $data['barang_masuk_terbaru'] = $db->table('barangmasuk')
            ->join('product', 'barangmasuk.id_product = product.id_product')
            ->select('barangmasuk.*, product.nama_product')
            ->orderBy('id_barangmasuk', 'DESC')
            ->limit(5)
            ->get()
            ->getResult();

        $data['produk_stok_rendah'] = $db->table('product')
            ->where('stok_product <=', 5)
            ->orderBy('stok_product', 'ASC')
            ->limit(5)
            ->get()
            ->getResult();

        echo view('header');
        echo view('menu');
        echo view('dashboard', $data);
        echo view('footer');
    } else {
        return redirect()->to('Home/log_out');
    }
}

public function log_out()
{
   session ()->destroy();
   return redirect()->to('/Home/login');
    
}



    public function user()
    {
    $level=session()->get('level');
    if ($level==1 || $level==4) {
        $evan = new M_pj();
        $data['okta'] = $evan->tampil('user');
        echo view('header');
        echo view('menu');
        echo view('user',$data);
        echo view('footer');
        }else{
        return redirect()->to('/Home/log_out');
    }
    }

    




//<------------------------------------------------------tabelkaryawan-------------------------------->
    public function karyawan()
    {
        $level=session()->get('level');
        if ($level==1 || $level ==4 ) {
        $evan = new M_pj();
        $on=('karyawan.id_user=user.id_user');
        $data['okta'] = $evan->jo('karyawan','user',$on);
        echo view('header');
        echo view('menu');
        echo view('karyawan',$data);
        echo view('footer');
        }else{
        return redirect()->to('/Home/log_out');
    }
    }
    public function edit_k($pop)
    {
        if (session()->get('id_user')>0) {
        $evan = new M_pj();
        $where =array('id_user' => $pop);
        $data['okta'] = $evan->jo2('user', $where);
        $data['yu'] = $evan->jo2('karyawan', $where);


        echo view('header');
        echo view('menu');
        echo view('edit_karyawan',$data);
        echo view('footer');
        }else{
            return redirect()->to('Home/login');
        }  
    }
    public function clear_k($key){
        if (session()->get('id_user')>0) {
        $raw = new M_pj();
        $where = array('id_user' => $key );
        $raw ->clear('karyawan', $where);
        $raw ->clear('user', $where);
        return redirect ()->to('Home/karyawan');
        }else{
            return redirect()->to('Home/login');
        }
    }
     public function aksi_editk ()
    {
        if (session()->get('id_user')>0) {
    $evan = new M_pj();
    $id=$this->request->getPost('id');
    // $id2=$this->request->getPost('id2');
    $username=$this->request->getPost('username');
    $a=$this->request->getPost('NIP'); 
    $ab=$this->request->getPost('nama'); 
    $ac=$this->request->getPost('alamat'); 
    $ad=$this->request->getPost('Jenis_kelamin');
    $where=array('id_user' => $id);
    $data=array(
        
        'NIP'=>$a,
        'NAMA'=>$ab,
        'alamat'=>$ac,
        'Jenis_kelamin'=>$ad
    );
    
    $evan->edit('karyawan', $data, $where);
    $data2=array(
            'username'=>$username,
        );
    // $where2=array('id_kw'=>$id2);
    // $data=array(
    //     'NIP'=>$a,
    //     'NAMA'=>$ab,
    //     'alamat'=>$ac,
    //     'Jenis_kelamin'=>$ad
// 
    // );
    $evan->edit('user', $data2, $where);
    // $evan->edit('user', $user, $where);
    

    return redirect ()->to('Home');
    }else{
            return redirect()->to('Home/login');
        } 
    }
      public function tk(){
        if (session()->get('id_user')>0) {
        echo view('header');
        echo view('menu');
        echo view('t_karyawan');
        echo view('footer');
        }else{
            return redirect()->to('Home/login');
        }   
    }
    public function aksi_simpank()
    {
         if (session()->get('id_user')>0) {
    $evan = new M_pj();
    $username= $this->request->getPost('username');
    $pass= $this->request->getPost('password');
    $a=$this->request->getPost('NIP'); 
    $ab=$this->request->getPost('nama');  
    $ac=$this->request->getPost('alamat');
    $ad=$this->request->getPost('Jenis_kelamin');
    $user=array(
        'username'=>$username,
        'password'=>md5($pass),
        'level'=>'2',
        );
        $model=new M_pj();
        $model->isi('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $data=array(
        'NIP'=>$a,
        'NAMA'=>$ab,
        'alamat'=>$ac,
        'Jenis_kelamin'=>$ad,
        'id_user'=>$iduser
    );
    
    $evan->isi('karyawan', $data);
    return redirect ()->to('Home/karyawan');
    }else{
            return redirect()->to('Home/login');
        }  
    }
//<--------------------------------------------------tabelbarang------------------------------------->
    public function product()
    {

   $level=session()->get('level');
   if ($level==1 || $level ==4 ) {
   
        $evan = new M_pj();
        $data['okta'] = $evan->tampil('product');
        echo view('header');
        echo view('menu');
        echo view('product',$data);
        echo view('footer');
    }else{
        return redirect()->to('/Home/log_out');
    }
    }

    public function harga()
    {
        $level = session()->get('level');
        if ($level == 1 || $level == 4) {
            $evan = new M_pj();
            $data['okta'] = $evan->tampil('product');
            echo view('header');
            echo view('menu');
            echo view('harga', $data);
            echo view('footer');
        } else {
            return redirect()->to('/Home/log_out');
        }
    }

    public function aksi_edit_harga()
    {
        $level = session()->get('level');
        if ($level == 1 || $level == 4) {
            $evan = new M_pj();
            $id = $this->request->getPost('id_product');
            $harga_beli = $this->request->getPost('harga_beli');
            $harga_jual = $this->request->getPost('harga_jual');

            $where = array('id_product' => $id);
            $data = array(
                'harga_beli' => $harga_beli,
                'harga_product' => $harga_jual
            );

            $evan->edit('product', $data, $where);
            return redirect()->to('Home/harga')->with('success', 'Harga barang berhasil diperbarui.');
        } else {
            return redirect()->to('Home/log_out');
        }
    }

 public function tambah_p(){
    $level=session()->get('level');
    if ($level==1 || $level==4) {
        $evan = new M_pj();
        $data['okta'] = $evan->tampil('product');
        echo view('header');
        echo view('menu');
        echo view('t_product',$data);
        echo view('footer');
        }else{
            return redirect()->to('Home/log_out');
        }
    } 

public function aksi_simpanp ()
    {
$level=session()->get('level');
if ($level==1 || $level==4) {
    $evan = new M_pj();
    $a=$this->request->getPost('name'); 
    $ab=$this->request->getPost('kode'); 
    // $ac=$this->request->getPost('jumlah'); 
    $ad=$this->request->getPost('harga');
    $ae=$this->request->getPost('harga_beli');
    $data=array(
        'nama_product'=>$a,
        'kode_product'=>$ab,
        // 'stok_product'=>$ac,
        'harga_product'=>$ad,
        'harga_beli'=>$ae
    );
    
    $evan->isi('product', $data);
    return redirect ()->to('/Home/product')->with('success', 'Barang berhasil ditambahkan.');
    }else{
            return redirect()->to('Home/log_out');
        }
    }

public function edit_p($pop)
    {
        $level=session()->get('level');
        if ($level==1 || $level==4) {
        $evan = new M_pj();
        $x = array ('id_product' => $pop);
        $data['okta'] = $evan->gw('product',$x);
        echo view('header');
        echo view('menu');
        echo view('edit_product',$data);
        echo view('footer');
        }else{
            return redirect()->to('Home/login');
        }
    }
      public function aksi_editp ()
    {
        $level=session()->get('level');
        if ($level==1 || $level==4) {
    $evan = new M_pj();
    $id=$this->request->getPost('id');
    $a=$this->request->getPost('name'); 
    $ab=$this->request->getPost('Jumlah'); 
    $ac=$this->request->getPost('kode'); 
    $ad=$this->request->getPost('Harga');
    $ae=$this->request->getPost('harga_beli');
    $where=array('id_product' => $id);
    $data=array(
        
        'nama_product'=>$a,
        'stok_product'=>$ab,
        'kode_product'=>$ac,
        'harga_product'=>$ad,
        'harga_beli'=>$ae
    );
    
    $evan->edit('product', $data, $where);
    return redirect ()->to('Home/product');
    }else{
            return redirect()->to('Home/login');
        }
    }

    public function l_brg()
    {
   $level=session()->get('level');
   if ($level==1 || $level==4 ) {
        $model=new M_pj();
        $data['kunci']='view_b';
        echo view('header');
        echo view('menu');
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('/Home/log_out');
    }
    }
    public function cari_b()
    {
        $level=session()->get('level');
        if ($level==1 || $level==4) {
      $evan = new M_pj();
      $awal = $this->request->getPost('awal');
      $akhir = $this->request->getPost('akhir');
      $data['okta']=$evan->filter2('product',$awal,$akhir);
      $where=array('tanggal');
        echo view('c_pr',$data); 
        }else{
        return redirect()->to('/Home/log_out');
    }
    }
    public function clear_p($key){
         $level=session()->get('level');
        if ($level==1 || $level==4) {
        $raw = new M_pj();
        $where = array('id_product' => $key );
        $raw ->clear('product', $where);
        return redirect ()->to('Home/product');
        }else{
            return redirect()->to('Home/login');
        }
    }

//<-----------------------------------------------------tabelbarangmasuk----------------------------->



    public function bm()
    {
   $level=session()->get('level');
   if ($level==1 || $level==4) {

        $evan = new M_pj();
        $on=('barangmasuk.id_product=product.id_product');
        $data['okta'] = $evan->jo('barangmasuk','product',$on);
        $data['products'] = $evan->tampil('product');
        echo view('header');
        echo view('menu');
        echo view('product_m',$data);
        echo view('footer');
            }else{
        return redirect()->to('/Home/log_out');
    }
    }

    public function aksi_simpanbm()
    {
        $level = session()->get('level');
        if ($level == 1 || $level == 4) {
            $evan = new M_pj();
            $a = $this->request->getPost('name'); 
            $ab = (int)$this->request->getPost('Jumlah');  
            $ac = $this->request->getPost('Harga');
            $data = array(
                'id_product' => $a,
                'jumlah_productmasuk' => $ab,
                'harga' => $ac,
                'tanggal' => date('Y-m-d')
            );
            
            $produk = $evan->gw('product', array('id_product' => $a));
            if ($produk) {
                $stok_baru = ($produk->stok_product ?? 0) + $ab;
                $evan->edit('product', array('stok_product' => $stok_baru), array('id_product' => $a));
            }

            $evan->isi('barangmasuk', $data);
            return redirect()->to('Home/bm')->with('success', 'Barang masuk berhasil dicatat dan stok barang bertambah.');
        } else {
            return redirect()->to('/Home/log_out');
        }
    }

     public function simpanpm ()
    {
        $level=session()->get('level');
        if ($level==1 || $level==4) {
    $evan = new M_pj();
    $a=$this->request->getPost('nama_product');    
    $ab=$this->request->getPost('stok_product');
    $ac=$this->request->getPost('kode_product');  
    $ad=$this->request->getPost('harga_product');
    $data=array(
        'nama_product'=>$a,
        'stok_product'=>$ab,
        'kode_product'=>$ac,
        'harga_product'=>$ad,
    );
    $data['okta'] = $evan->plus('product', $data);
    return redirect ()->to('Home/bm');
     }else{
        return redirect()->to('/Home/log_out');
    }
    }

public function cari_bm()
    {
        $level=session()->get('level');
        if ($level==1 || $level==4) {
      $evan = new M_pj();
      $awal = $this->request->getPost('awal');
      $akhir = $this->request->getPost('akhir');
      $data['okta']=$evan->filter('barangmasuk',$awal,$akhir);
      $img = file_get_contents(
            'C:\xampp\htdocs\poss\poss\public\images\cop-sph.jpeg');
            $data['foto'] = base64_encode($img);
        echo view('c_bm', $data);
        }else{
        return redirect()->to('/Home/log_out');
    }
    }

    public function clear_pm($key)
    {
        $level = session()->get('level');
        if ($level == 1 || $level == 4) {
            $raw = new M_pj();
            $bm = $raw->gw('barangmasuk', array('id_barangmasuk' => $key));
            if ($bm) {
                $produk = $raw->gw('product', array('id_product' => $bm->id_product));
                if ($produk) {
                    $stok_baru = max(0, ($produk->stok_product ?? 0) - ($bm->jumlah_productmasuk ?? 0));
                    $raw->edit('product', array('stok_product' => $stok_baru), array('id_product' => $bm->id_product));
                }
            }
            $where = array('id_barangmasuk' => $key);
            $raw->clear('barangmasuk', $where);
            return redirect()->to('Home/bm')->with('success', 'Catatan barang masuk dihapus dan stok disesuaikan.');
        } else {
            return redirect()->to('/Home/log_out');
        }
    }

    public function l_masuk()
    {

   $level=session()->get('level');
   if ($level==1 || $level==4) {

        $model=new M_pj();
        $data['kunci']='view_bm';
        echo view('header');
        echo view('menu');
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('/Home/log_out');
    }
    }
//<------------------------------------------------------tabelpenjualan------------------------------>
public function transaksi()
    {
        if (session()->get('id_user')>0) {
            $db = \Config\Database::connect();
            $data['okta'] = $db->table('transaksi')
                ->join('product', 'transaksi.id_product = product.id_product')
                ->join('bill', 'transaksi.id_bill = bill.id_bill', 'left')
                ->select('transaksi.*, product.nama_product, bill.no_pembayaran')
                ->orderBy('id_transaksi', 'DESC')
                ->get()
                ->getResult();
            
            $data['products'] = $db->table('product')->get()->getResult();
            
            echo view('header');
            echo view('menu');
            echo view('transaksi',$data);
            echo view('footer');
        }else{
            return redirect()->to('/Home/log_out');
        } 
    }

    public function l_penjualan()
    {
    $level=session()->get('level');
    if ($level==1 || $level==4 ) {
        $model=new M_pj();
        $data['kunci']='view_p';
        echo view('header');
        echo view('menu');
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('/Home/log_out');
    }
    }
    

    public function cari_p()
    {
        $level=session()->get('level');
        if ($level==1 || $level==4) {
      $evan = new M_pj();
      $awal = $this->request->getPost('awal');
      $akhir = $this->request->getPost('akhir');
      $data['okta']=$evan->filter('transaksi',$awal,$akhir);
      $where=array('tanggal'); 
        $img = file_get_contents(
            'C:\xampp\htdocs\poss\poss\public\images\cop-sph.jpeg');
            $data['foto'] = base64_encode($img);
       echo view('c_p',$data); 
        }else{
            return redirect()->to('Home/log_out');
    }
    }

    public function clear_t($key)
    {
        if (session()->get('id_user') > 0) {
            $raw = new M_pj();
            $transaksi = $raw->gw('transaksi', array('id_transaksi' => $key));
            if ($transaksi) {
                $produk = $raw->gw('product', array('id_product' => $transaksi->id_product));
                if ($produk) {
                    $stok_baru = ($produk->stok_product ?? 0) + ($transaksi->jumlah ?? 0);
                    $raw->edit('product', array('stok_product' => $stok_baru), array('id_product' => $transaksi->id_product));
                }
            }
            $where = array('id_transaksi' => $key);
            $raw->clear('transaksi', $where);
            return redirect()->to('Home/transaksi')->with('success', 'Transaksi dibatalkan dan stok dikembalikan.');
        } else {
            return redirect()->to('Home/log_out');
        }
    }
    
public function aksi_simpant()
{
    if (session()->get('id_user') > 0) {
        $model = new M_pj();
        $db = \Config\Database::connect();

        $cartData = $this->request->getPost('cart_data');
        $paymentMethod = $this->request->getPost('payment_method') ?? 'Cash';

        if (empty($cartData)) {
            return redirect()->to('Home/transaksi')->with('error', 'Keranjang belanja kosong.');
        }

        $cart = json_decode($cartData, true);
        if (empty($cart)) {
            return redirect()->to('Home/transaksi')->with('error', 'Format keranjang belanja tidak valid.');
        }

        // Calculate total belanjaan
        $totalBelanjaan = 0;
        foreach ($cart as $item) {
            $totalBelanjaan += (int)$item['qty'] * (int)$item['price'];
        }

        $db->transBegin();

        try {
            // Save bill record
            $billData = [
                'total_belanjaan' => $totalBelanjaan,
                'no_pembayaran'   => $paymentMethod,
                'tgl_transaksi'   => date('Y-m-d')
            ];
            $model->isi('bill', $billData);
            
            // Get the inserted bill ID
            $id_bill = $db->insertID();

            // Save individual items
            foreach ($cart as $item) {
                $id_product = $item['id'];
                $jumlah     = (int) $item['qty'];
                $harga      = (int) $item['price'];

                $produk = $model->gw('product', ['id_product' => $id_product]);
                if (!$produk || $produk->stok_product < $jumlah) {
                    throw new \RuntimeException('Stok tidak mencukupi untuk barang: ' . ($produk->nama_product ?? 'Tidak Dikenal'));
                }

                // Save transaksi row
                $transData = [
                    'id_product' => $id_product,
                    'jumlah'     => $jumlah,
                    'harga'      => $harga,
                    'harga_beli' => $produk->harga_beli,
                    'id_bill'    => $id_bill,
                    'Nama'       => session()->get('username') ?? 'Kasir',
                    'tanggal'    => date('Y-m-d')
                ];
                $model->isi('transaksi', $transData);

                // Reduce stock
                $stok_baru = $produk->stok_product - $jumlah;
                $model->edit('product', ['stok_product' => $stok_baru], ['id_product' => $id_product]);
            }

            $db->transCommit();
            
            // Store checkout ID in session flashdata for auto-printing receipt
            session()->setFlashdata('print_bill_id', $id_bill);

            return redirect()->to('Home/transaksi')->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->to('Home/transaksi')->with('error', $e->getMessage());
        }
    } else {
        return redirect()->to('Home/log_out');
    }
}

    public function get_receipt($id_bill)
    {
        if (session()->get('id_user') > 0) {
            $db = \Config\Database::connect();
            $bill = $db->table('bill')->where('id_bill', $id_bill)->get()->getRow();
            if (!$bill) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Bill not found']);
            }
            
            $items = $db->table('transaksi')
                ->join('product', 'transaksi.id_product = product.id_product')
                ->where('transaksi.id_bill', $id_bill)
                ->select('transaksi.*, product.nama_product, product.kode_product')
                ->get()
                ->getResult();
                
            return $this->response->setJSON([
                'status' => 'success',
                'bill' => $bill,
                'items' => $items,
                'cashier' => session()->get('username') ?? 'Kasir'
            ]);
        } else {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
    }
    public function t_transaksi()
    {
        if (session()->get('id_user')>0) {
        $evan = new M_pj();
        $data['okta'] = $evan->tampil('product');
        echo view('header');
        echo view('menu');
        echo view('t_transaksi',$data);
        echo view('footer');
        }else{
            return redirect()->to('Home/log_out');
    }
    }
    
      public function ppm(){
    	$evan = new M_pj();
        $data['okta'] = $evan->tampil('product');
        echo view('header');
        echo view('menu');
        echo view('tbm',$data);
        echo view('footer');
    }
   
    
 
     
    
    
   



public function pdf_p()
{
     $model=new M_pj();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['okta']=$model->filter('transaksi',$awal,$akhir);
        $img = file_get_contents(
            'C:\xampp\htdocs\poss\poss\public\images\cop-sph.jpeg');
    
            $kui['foto'] = base64_encode($img);
    
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->set_option('isRemoteEnabled', TRUE);
           
            $dompdf->loadHtml(view('c_p',$kui));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('My.pdf',array('Attachment'=>0));
    }

public function pdf_bm()
{
     $model=new M_pj();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['okta']=$model->filter('barangmasuk',$awal,$akhir);
        $img = file_get_contents(
            'C:\xampp\htdocs\poss\poss\public\images\cop-sph.jpeg');
    
            $kui['foto'] = base64_encode($img);
    
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->set_option('isRemoteEnabled', TRUE);
           
            $dompdf->loadHtml(view('c_bm',$kui));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('My.pdf',array('Attachment'=>0));
    }

public function pdf_b()
{
    $model=new M_pj();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['okta']=$model->filter2('product',$awal,$akhir);
        $img = file_get_contents(
            'C:\xampp\htdocs\poss\poss\public\images\cop-sph.jpeg');
    
            $kui['foto'] = base64_encode($img);
    
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->set_option('isRemoteEnabled', TRUE);
           
            $dompdf->loadHtml(view('c_pr',$kui));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('My.pdf',array('Attachment'=>0));

}

  public function excel_bm()
    {
        if (session()->get('level')==1 || session()->get('level')==4) {
        $model = new M_pj();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter4('barangmasuk', $awal, $akhir);
        // echo view('excel_print_pg', $data);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Barang')
            ->setCellValue('B1', 'Jumlah Masuk')
            ->setCellValue('C1', 'Harga')
            ->setCellValue('D1', 'Tanggal');

        $column = 2;

        foreach ($data as $dat) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $dat->nama_product)
                ->setCellValue('B' . $column, $dat->jumlah_productmasuk)
                ->setCellValue('C' . $column, $dat->harga)
                ->setCellValue('D' . $column, $dat->tanggal);
            $column++;
        }
        // TULIS DALAM BENTUK Format .xlsx
        $fileName = 'Data Laporan Barang masuk';

        //  Coba Redirect hasilnya xlsx ke web client
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer = new XLsx($spreadsheet);
        $writer->save('php://output');
        }else{
       return redirect()->to('/Home/dashboard'); 
}
    }


       public function excel_b()
    {
        if (session()->get('level')==1 || session()->get('level')==4) {
        $model = new M_pj();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter3('product', $awal, $akhir);
        // echo view('excel_print_pg', $data);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Barang')
            ->setCellValue('B1', 'Kode Barang')
            ->setCellValue('C1', 'Harga')
            ->setCellValue('D1', 'Stok')
            ->setCellValue('E1', 'Tanggal');

        $column = 2;

        foreach ($data as $dat) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $dat->nama_product)
                ->setCellValue('B' . $column, $dat->kode_product)
                ->setCellValue('C' . $column, $dat->harga_product)
                ->setCellValue('D' . $column, $dat->stok_product)
                ->setCellValue('E' . $column, $dat->tanggal);
            $column++;
        }
        // TULIS DALAM BENTUK Format .xlsx
        $fileName = 'Data Laporan Barang';

        //  Coba Redirect hasilnya xlsx ke web client
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer = new XLsx($spreadsheet);
        $writer->save('php://output');
        }else{
       return redirect()->to('/Home/dashboard'); 
}
    }

       public function excel_p()
    {
        if (session()->get('level')==1 || session()->get('level')==4) {
        $model = new M_pj();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter4('transaksi', $awal, $akhir);
        // echo view('excel_print_pg', $data);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Barang')
            ->setCellValue('B1', 'Jumlah Barang')
            ->setCellValue('C1', 'Harga Jual')
            ->setCellValue('D1', 'Harga Beli')
            ->setCellValue('E1', 'Keuntungan')
            ->setCellValue('F1', 'Tanggal');

        $column = 2;
        $totalProfit = 0;

        foreach ($data as $dat) {
            $profit = ($dat->harga - $dat->harga_beli) * $dat->jumlah;
            $totalProfit += $profit;
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $dat->nama_product)
                ->setCellValue('B' . $column, $dat->jumlah)
                ->setCellValue('C' . $column, $dat->harga)
                ->setCellValue('D' . $column, $dat->harga_beli)
                ->setCellValue('E' . $column, $profit)
                ->setCellValue('F' . $column, $dat->tanggal);
            $column++;
        }
        
        // Add a grand total profit row at the bottom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, 'GRAND TOTAL')
            ->setCellValue('E' . $column, $totalProfit);

        // TULIS DALAM BENTUK Format .xlsx
        $fileName = 'Data Laporan Penjualan';

        //  Coba Redirect hasilnya xlsx ke web client
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer = new XLsx($spreadsheet);
        $writer->save('php://output');
        }else{
       return redirect()->to('/Home/dashboard'); 
}
    }

    public function profile()
    {
        if (session()->get('id_user') > 0) {
            $id = session()->get('id_user');
            $db = \Config\Database::connect();
            
            $data['okta'] = $db->table('user')->where('id_user', $id)->get()->getRow();
            $data['yu'] = $db->table('karyawan')->where('id_user', $id)->get()->getRow();
            
            echo view('header');
            echo view('menu');
            echo view('profile', $data);
            echo view('footer');
        } else {
            return redirect()->to('/Home/login');
        }
    }

}