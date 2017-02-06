<?php

//sendGCM("message","eLTL5xC_2Rk:APA91bFJZAGyM3aLcuc_bsM1wlIzk2W0efBw6gIsv3w77I0zHGU9vcC-xGynj0hTPhxhAH08Scv4DHv0YdNh1kDT9cTA7l49mbUt7_3TpvO170tmGD7Si95rBpJ6oD_3XvFMbD_d3yFL");
$message = $_POST['message'];
$id = $_POST['id'];
sendGCM($message,$id);
function sendGCM($message, $id) {

  $url = 'https://fcm.googleapis.com/fcm/send';

  $fields = array (
          'registration_ids' => array (
                  $id
          ),
          'data' => array (
                  "message" => $message
          )
  );
  $fields = json_encode ( $fields );

  $headers = array (
          'Authorization: key=' . "AAAA8ce_HUs:APA91bE1um0uBerUwa6pzmXyFN2Sg3TjJZQWm71lx0RB0ysibiD5c1-OrNzickTx2W7PaXFIRX0xY2m0F0vmj_hPNjlR-wIRZunsyzMMk3Ugcy3MzWLXDSvKzG8nBOAcBoavod2xDbCB",
          'Content-Type: application/json'
  );

  $ch = curl_init ();
  curl_setopt ( $ch, CURLOPT_URL, $url );
  curl_setopt ( $ch, CURLOPT_POST, true );
  curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
  
  $result = curl_exec ( $ch );
  print_r($result);
  curl_close ( $ch );
}

?>


