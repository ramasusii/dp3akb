<?php
namespace app\components;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
class MyComponent extends Component
{
    public function tampilTanggal($tanggalsekarang)
    {
        // cek bahasa sekarang
        $bahasa =  (string)Yii::$app->request->cookies['language'] == null ? 'ID' : Yii::$app->request->cookies['language'];

        // tampilkan 
        $barusaja = $bahasa == 'ID' ? 'Baru saja' : 'Just Now';
        $pesandetik = $bahasa == 'ID' ? ' detik yang lalu' : ' seconds ago';
        $pesanmenit = $bahasa == 'ID' ? ' menit yang lalu' : ' minutes ago';
        $pesanjam = $bahasa == 'ID' ? ' jam yang lalu' : ' hours ago';
        $pesanhari = $bahasa == 'ID' ? ' hari yang lalu' : ' days ago';

        // format tanggal
        $awal  = strtotime($tanggalsekarang);
        $akhir = time();
        $diff  = $akhir - $awal; 

        $hari   = floor($diff / (60 * 60 * 24));
        $jam   = floor($diff / (60 * 60));
        $menit = $diff - ( $jam * (60 * 60) );
        $tampil_menit = floor( $menit / 60 );
        $detik = $diff % 60;
        
        if($hari > 0 && $hari < 7){
          $tampil_tanggal =  $hari .$pesanhari;
        }elseif($hari == 0 && $jam > 0 && $jam < 24){
          $tampil_tanggal =  $jam .$pesanjam;
        }elseif($hari == 0 && $jam == 0 && $tampil_menit > 0 && $tampil_menit < 60){
          $tampil_tanggal =  $tampil_menit .$pesanmenit;
        }elseif($hari == 0 && $jam == 0 && $tampil_menit == 0 && $detik > 0 && $detik < 60){
          $tampil_tanggal =  $detik .$pesandetik;
        }elseif($hari == 0 && $jam == 0 && $tampil_menit == 0 && $detik == 0){
          $tampil_tanggal =  $barusaja;
        }else{
          $tampil_tanggal = date('d M Y', strtotime($tanggalsekarang));
          // Dikomen untuk hilangkan menit
          // $tampil_tanggal = date('d M Y, H:i', strtotime($tanggalsekarang));
        }

        return $tampil_tanggal;
    }

    public function tampilTanggalMenit($tanggalsekarang)
    {
        // cek bahasa sekarang
        $bahasa =  (string)Yii::$app->request->cookies['language'] == null ? 'ID' : Yii::$app->request->cookies['language'];

        // tampilkan 
        $barusaja = $bahasa == 'ID' ? 'Baru saja' : 'Just Now';
        $pesandetik = $bahasa == 'ID' ? ' detik yang lalu' : ' seconds ago';
        $pesanmenit = $bahasa == 'ID' ? ' menit yang lalu' : ' minutes ago';
        $pesanjam = $bahasa == 'ID' ? ' jam yang lalu' : ' hours ago';
        $pesanhari = $bahasa == 'ID' ? ' hari yang lalu' : ' days ago';

        // format tanggal
        $awal  = strtotime($tanggalsekarang);
        $akhir = time();
        $diff  = $akhir - $awal; 

        $hari   = floor($diff / (60 * 60 * 24));
        $jam   = floor($diff / (60 * 60));
        $menit = $diff - ( $jam * (60 * 60) );
        $tampil_menit = floor( $menit / 60 );
        $detik = $diff % 60;
        
        if($hari > 0 && $hari < 7){
          $tampil_tanggal =  $hari .$pesanhari;
        }elseif($hari == 0 && $jam > 0 && $jam < 24){
          $tampil_tanggal =  $jam .$pesanjam;
        }elseif($hari == 0 && $jam == 0 && $tampil_menit > 0 && $tampil_menit < 60){
          $tampil_tanggal =  $tampil_menit .$pesanmenit;
        }elseif($hari == 0 && $jam == 0 && $tampil_menit == 0 && $detik > 0 && $detik < 60){
          $tampil_tanggal =  $detik .$pesandetik;
        }elseif($hari == 0 && $jam == 0 && $tampil_menit == 0 && $detik == 0){
          $tampil_tanggal =  $barusaja;
        }else{
          // $tampil_tanggal = date('d M Y', strtotime($tanggalsekarang));
          // Dikomen untuk hilangkan menit
          $tampil_tanggal = date('d M Y, H:i', strtotime($tanggalsekarang));
        }

        return $tampil_tanggal;
    }


    public function languagesParams($lgs)
    {
        $lang =  (string)Yii::$app->request->cookies['language'] == null ? Yii::$app->params['language']['ID'][$lgs] : Yii::$app->params['language'][(string)Yii::$app->request->cookies['language']][$lgs];

        return $lang;
    }
    
    public function languagesNow()
    {
        $bahasa =  (string)Yii::$app->request->cookies['language'] == null ? 'ID' : Yii::$app->request->cookies['language'];

        return $bahasa;
    }
    public function lg()
    {
        if((string)Yii::$app->request->cookies['language'] == null){
          $lgg = 'ID';
        }else{
          $lgg = (string)Yii::$app->request->cookies['language'];
        }

        return $lgg;
    }

    public static function save_base64_image($base64_image_string, $output_file_without_extension, $path_with_end_slash="" ) {
      //usage:  if( substr( $img_src, 0, 5 ) === "data:" ) {  $filename=save_base64_image($base64_image_string, $output_file_without_extentnion, getcwd() . "/application/assets/pins/$user_id/"); }      
      //
      //data is like:    data:image/png;base64,asdfasdfasdf
      $splited = explode(',', substr( $base64_image_string , 5 ) , 2);
      $mime=$splited[0];
      $data=$splited[1];
  
      $mime_split_without_base64=explode(';', $mime,2);
      $mime_split=explode('/', $mime_split_without_base64[0],2);
      if(count($mime_split)==2)
      {
          $extension=$mime_split[1];
          if($extension=='jpeg')$extension='jpg';
          //if($extension=='javascript')$extension='js';
          //if($extension=='text')$extension='txt';
          $output_file_with_extension=$output_file_without_extension.'.'.$extension;
      }
      file_put_contents( $path_with_end_slash . $output_file_with_extension, base64_decode($data) );
      return $output_file_with_extension;
    }

    public static function formatNumberShort($num)
    {
        if (!is_numeric($num)) {
            return 0;
        }

        if ($num >= 1000) {
            // Bagi jadi ribuan dan buang koma di belakang jika .0
            $formatted = number_format($num / 1000, 1, ',', '');
            $formatted = rtrim(rtrim($formatted, '0'), ','); // hilangkan koma & nol berlebih
            return $formatted . 'K';
        }

        // Kalau masih di bawah 1000 tampilkan apa adanya
        return number_format($num, 0, ',', '.');
    }

}