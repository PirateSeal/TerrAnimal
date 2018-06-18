<?php
$req_bid ="SELECT * FROM discounts WHERE id_discount = ( SELECT Max(id_discount) from discounts );";
$req_random = "SELECT id_article FROM articles ORDER BY RAND() LIMIT 1";
if ( isset($new_id)){
  $req_select_random = "SELECT * FROM articles WHERE id_article='".$new_id."'";
  if ( isset($disc_price)){
    $req_new_price = "UPDATE articles SET unit_price = '".$disc_price."' WHERE id_article = '".$new_id."'" ;
  }
}
if ( isset($data[1])){
  $req_data_article = "SELECT * FROM articles where id_article = '".$data[1]."' ";
  $req_old_price = "UPDATE articles SET unit_price = '".$data[5]."' WHERE id_article = '".$data[1]."'" ;
  $req_low_status = "UPDATE discounts SET status = '0' WHERE id_article = '".$data[1]."'" ;
}

if ( isset($new_id) && isset($h1) && isset($h2) && isset($true_price) && isset($disc_price)){
  $req_new_discount = "INSERT INTO `discounts` (`id_discount`, `id_article`, `status`, `date_start`, `date_end`, `init_price`, `disc_price`) VALUES (NULL, '".$new_id."', '1', '".$h1."', '".$h2."', '".$true_price."', '".$disc_price."') ";
}
?>
