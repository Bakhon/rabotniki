<?php require_once 'Theme/blocks/header.php'; 
require 'conn.php';
$query = "SELECT * FROM `users`";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query2 = "SELECT * FROM `tender` GROUP BY ID_TENDER";
$result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
$rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>

<div class="container ">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Список Пользователей</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Тендер</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Справочник специализации</a>
  </li>
</ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row pt-5">
    <div class="col-12 ">
    <h1 style="text-align:center">Список Пользователей </h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Имя</th>
      <th scope="col">Номер телефона</th>
      <th scope="col">Тип</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row) { ?>
    <tr>
      <th scope="row"><input type="hidden" id="uss" value="<?php echo $row['ID']; ?>" /></th>
      <td><?php echo $row['LASTNAME']; ?></td>
      <td><?php echo $row['NAME']; ?></td>
      <td><?php echo $row['PHONE']; ?></td>
      <td ><?php if($row['TYPE'] == 1) { $txt = 'Заказчик';} else { $txt = 'Мастер';} echo $txt; ?></td>
      <td>
      <select data-id="<?php echo $row['ID']; ?>" id="user_state" class="form-control edit_data">
        <option  value="<?php echo $row['STATUS']; ?>"><?php if($row['STATUS'] == 1) {$text = 'Активен'; $tst = 'Отключен';} else {$text = 'Отключен'; $tst = 'Активен';} echo $text; ?></option>
        <option value="<?php echo $row['STATUS']; ?>"><?php echo $tst; ?></option>
      <select>
     
      
      </td>
    </tr>
  <?php } ?>

       </tbody>
     </table>
     </div>
  </div>
  
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
  <div class="row pt-5">
    <div class="col-12 ">
    <h1 style="text-align:center">Список Тендера </h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Наименование</th>
      <th scope="col">Цена</th>
      <th scope="col">Номер телефона</th>
      <th scope="col">Дата публикации</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows2 as $row2) { ?>
    <tr>
      <th scope="row"><?php echo $row2['ID_TENDER']; ?></th>
      <td><?php echo $row2['LASTNAME']; ?></td>
      <td><?php echo $row2['PRICE']; ?> тг</td>
      <td><?php echo $row2['PHONE']; ?></td>
      <td ><?php $data = date('d.m.Y', strtotime($row2['POST_DATE'])); echo $data; ?></td>
      <td>
      <select class="form-control user_state">
        <option  value="<?php echo $row2['ID'] ?>"><?php if($row2['STATUS'] == 1) {$text = 'Активен'; $tst = 'Отключен';} else {$text = 'Отключен'; $tst = 'Включен';} echo $text; ?></option>
        <option value="<?php echo $row2['ID']; ?>"><?php echo $tst; ?></option>
      <select>
     
      
      </td>
    </tr>
  <?php } ?>

       </tbody>
     </table>
     </div>
  </div>
  
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>



</div>
<?php require_once 'Theme/blocks/footer.php'; ?>