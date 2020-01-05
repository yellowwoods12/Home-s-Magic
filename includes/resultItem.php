<?php

echo "
<div class='row result-item'>
  <div class='col-lg-3 col-md-6 result-img'>
    <img src='Images/$rest_img' class='img-thumbnail rest-img'>
  </div>

  <div class='col-lg-4 col-md-6 result-info'>
    <p>$rest_name</p>
    <p>$rest_address</p>
    <p><i class='fas fa-utensils'></i>&nbsp;$rest_speciality</p>
    <p><i class='fas fa-phone'></i>$rest_phone</p>
    <p><i class='fas fa-envelope'></i>$rest_mail</p>
  </div>

  <div class='col-lg-5 col-md-12 result-action'>
    <di class='row'>
      <div class='col-lg-12 col-md-6 col-sm-9 result-quote'>
        <i class='fas fa-quote-left'></i>
        <p>$rest_desc</p>
        <i class='fas fa-quote-right'></i>
      </div>

      <div class='col-lg-12 col-md-6 col-sm-3 result-button'>
        <a href='review.php?rest_id_url=$rest_id'>
          <button class='btn btn-info'>VIEW</button>
        </a>
      </div>
    </di>
  </div>
</div>
</a>";

//<a href='menu.php?rest_id_url=$rest_id'>
//<a href='orders.php?rest_id_url=$rest_id'>

/*
<div class='col-lg-12 col-md-6 col-sm-12 result-buttons'>
        <a href='review.php?rest_id_url=$rest_id&rest_name_url=$rest_name&rest_address_url=$rest_address&rest_img_url=$rest_img&rest_speciality_url=$rest_speciality&rest_phone_url=$rest_phone&rest_mail_url=$rest_mail&rest_img_url=$rest_img&rest_address_url=$rest_address'>
          <button class='btn btn-success'>REVIEWS</button>
        </a>

        <button class='btn btn-info' data-toggle='modal' data-target='#menuModal'>VIEW MENU</button>

        <button class='btn btn-primary' data-toggle='modal' data-target='#menuModal'>
          ORDER FOOD
        </button>
      </div>
*/
?>
