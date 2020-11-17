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
      <th scope="row"><input type="hidden" id="uss" value="<?php echo $row['ID']; ?>" /><?php echo $row['ID']; ?></th>
      <td><?php echo $row['LASTNAME']; ?></td>
      <td><?php echo $row['NAME']; ?></td>
      <td><?php echo $row['PHONE']; ?></td>
      <td ><?php if($row['TYPE'] == 1) { $txt = 'Заказчик';} else { $txt = 'Мастер';} echo $txt; ?></td>
      <td>
      <select data-id="<?php echo $row['ID']; ?>" id="user_state" class="form-control edit_data">
        <option  value="<?php echo $row['STATUS']; ?>"><?php if($row['STATUS'] == 1) {$text = 'Активен'; $tst = 'Отключен'; $tvt = 0; } else {$text = 'Отключен'; $tst = 'Активен'; $tvt = 1;} echo $text; ?></option>
        <option value="<?php echo $tvt; ?>"><?php echo $tst; ?></option>
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
      <td><?php echo $row2['TITLE']; ?></td>
      <td><?php echo $row2['PRICE']; ?> тг</td>
      <td><?php echo $row2['PHONE']; ?></td>
      <td ><?php $data = date('d.m.Y', strtotime($row2['POST_DATE'])); echo $data; ?></td>
      <td>
      <select data-id="<?php echo $row2['ID_TENDER']; ?>" id="tender_state" class="form-control edit_tender">
        <option  value="<?php echo $row2['STATUS'] ?>  <?php if($row2['STATUS'] == 1) {$text = 'Активен'; $tst = 'Отключен'; $tvt = 0; $set = 'selected'; } else {$text = 'Отключен'; $tst = 'Активен'; $tvt = 1; $set = 'selected';} ?>" <?php echo $set; ?>><?php echo $text; ?></option>
        <option  value="<?php echo $tvt; ?>"><?php echo $tst; ?></option>
      <select>
     
      
      </td>
    </tr>
  <?php } ?>

       </tbody>
     </table>
     </div>
  </div>
  
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  <div class="row pt-5">
 
     <div class="col-12">
     <div class="box" style="display:flex; justify-content: space-between;">
            <div class="box-item">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_specializa" class="btn btn-primary">Добавить специализацию</button>                         
            </div>
            <div class="box-item" >  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#view_data_specializa" class="btn btn-primary">Просмотр специализации</button>                         
            </div>
        <div class="box-item">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Добавить сервис</button>                         
        </div>    
    </div>
    <hr/>
            <div id="live_data">

            </div>
     </div>
  </div>
  
  </div>
</div>

            <div id="add_data_Modal" class="modal fade">  
                <div class="modal-dialog">  
                    <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                            </div>  
                            <div class="modal-body">  
                                <form method="post" id="insert_form">  
                                                                
                                    <label>Выберите специализацию</label>  
                                    <select name="select_spec" id="select_spec" class="form-control">  
                                    <?php require 'conn.php'; 
                                    $query = "SELECT * FROM `speciality`";
                                    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    print_r($rows);
                                    foreach($rows as $row) {
                                    ?>
                                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['NAME_SPEC']; ?></option>                                
                                    <?php } ?>
                                    </select>  
                                    <br />  
                                    <label>Наименование сервиса</label>  
                                    <input type="text" name="speciality[]" id="speciality" class="form-control" />  
                                    <br />                                                                       
                                    
                                </form>  
                            </div>  
                            <div class="modal-footer"> 
                            <button type="button" name="add_speciality" id="add_speciality" class="btn btn-primary">Добавить еще</button> 
                            <input type="submit" name="save_spec" id="save_spec" value="Сохранить" class="btn btn-success" />   
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>  
                            </div>  
                    </div>  
                </div>  
            </div>


 <div id="add_data_specializa" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_sevices">                                                                                                     
                          <label>Наименование специализацию</label>  
                          <input type="text" name="services[]" id="services" class="form-control" />  
                          <br />                                                                       
                         
                     </form>  
                </div>  
                <div class="modal-footer"> 
                <button type="button" name="add_services" id="add_services" class="btn btn-primary">Добавить еще</button> 
                <input type="submit" name="save_services" id="save_services" value="Сохранить" class="btn btn-success" />   
                     <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>  
                </div>  
           </div>  
      </div>  
 </div>
</div>


<div id="view_data_specializa" class="modal fade">  
                    <div class="modal-dialog">  
                        <div class="modal-content">  
                                <div class="modal-header">  
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                    <h4 class="modal-title">Просмотр</h4>  
                                </div>  
                                <div class="modal-body">  
                                <div class="table-responsive">  
                        <table class="table table-bordered">  
                                <tr>  
                                    <th width="10%">Id</th>  
                                    <th width="40%">Имя сервиса</th>  
                                    <th width="40%">Специализация</th>  
                                    <th width="10%">Удалить</th>  
                                </tr>';  
                                <tr>  
                                    <td></td>  
                                    <td class="first_name" data-id1="" ></td>  
                                    <td class="last_name" data-id2="" ></td>  
                                    <td><button type="button" name="delete_btn" data-id3="" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                                </tr>   
                                </div>  
                                <div class="modal-footer"> 
                                <button type="button" name="add_services" id="add_services" class="btn btn-primary">Добавить еще</button> 
                                <input type="submit" name="save_services" id="save_services" value="Сохранить" class="btn btn-success" />   
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>  
                                </div>  
                        </div>  
                    </div>  
        </div>
        
<?php require_once 'Theme/blocks/footer.php'; ?>