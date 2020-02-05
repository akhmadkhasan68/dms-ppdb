<?php
class Ongkir
{
  private $apikey = "583a6306e5aa17a0c5cb0d32d514462c";
  private $url =  'https://pro.rajaongkir.com/api/';


  public function get_kurir_data($param)
  {
    try {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/" . $param,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: " . $this->apikey
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        return $response;
      }
    } catch (Exception $ex) {
      return $ex->getMessage();
    }
  }

  public function cek_ongkir($param)
  {
    try {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $param,
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
          "key: " . $this->apikey
        ),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        return $response;
      }
    } catch (Exception $ex) {
      return $ex->getMessage();
    }
  }
}
