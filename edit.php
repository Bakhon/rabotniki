<?php require 'Theme/blocks/header.php';
 require_once 'function.php';
 require 'conn.php';

$message = '';

if($_POST['edit']){
   
    
    $user_name = $_POST['user_name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $user_country = $_POST['user_country'];
    $user_id = $_POST['register_user_id'];

    if(isset($_FILES["user_avatar"]["name"]))
		{
			if($_FILES["user_avatar"]["name"] != '')
			{
				$image_name = $_FILES["user_avatar"]["name"];

				$valid_extensions = array('jpg', 'jpeg', 'png');

				$extension = pathinfo($image_name, PATHINFO_EXTENSION);

				if(in_array($extension, $valid_extensions))
				{
					$upload_path = 'avatar/' . time() . '.' . $extension;
					if(move_uploaded_file($_FILES["user_avatar"]["tmp_name"], $upload_path))
					{
						$user_avatar = $upload_path;
					}
				}
				else
				{
					$message .= '<div class="alert alert-danger">Only .jpg, .jpeg and .png Image allowed to upload</div>';
				}
			}
			else
			{
				$user_avatar = $_POST["hidden_user_avatar"];
			}
        }
        
		$query = "UPDATE `users` SET `NAME` = '$user_name', `LASTNAME` = '$lastname', `AVATAR` = '$user_avatar'  WHERE ID = $user_id";
		//echo $query;
         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
         mysqli_close($link);
         header("location: myprofile.php");
    

}
?>

<div class="container">
<div class="col-sm-2 "> </div>
<div class="col-sm-8 text-left">
<div class="row pt-5">
	<div class="col-md-9">
    
<?php  

$result = Get_user_profile_data($_SESSION["id"]);

foreach($result as $row)
{ ?>
    <div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-9">
						<h3 class="panel-title">Редактировать профиль</h3>
					</div>
					<div class="col-md-3" align="right">
						<a href="view.php" class="btn btn-primary btn-xs">Просмотр</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<?php
				echo $message;
				?>
				<form method="post" action="edit.php" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<label class="col-md-4" align="right">Name</label>
							<div class="col-md-8">
								<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $row["NAME"];  ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-4" align="right">Фамилия</label>
							<div class="col-md-8">
								<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row["LASTNAME"];  ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-4" align="right">Номер телефона</label>
							<div class="col-md-8">
								<input type="text" disabled="" name="phone" id="phone" class="form-control" value="<?php echo $row["PHONE"]; ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-4" align="right">Город</label>
							<div class="col-md-8">
								<select name="user_country" id="user_country" class="form-control">
                                <?php if($row['name']) { ?>
                                    <option selected="" value="<?php echo $row['ID']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
									<option value="">Выберите город</option>
								
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-4" align="right">Фото профиля</label>
							<div class="col-md-8">
								<input type="file" name="user_avatar" />
								<br />
								
								<input type="hidden" name="hidden_user_avatar" value="<?php echo $row["AVATAR"]; ?>" />
								<br />
							</div>
						</div>
					</div>
					<div class="form-group" align="center">
						<input type="hidden" name="register_user_id" value="<?php echo $_SESSION['id']; ?>" />
						<input type="submit" name="edit" class="btn btn-primary" value="Сохранить" />
					</div>
				</form>
			</div>
		</div>


   </div>
</div>
<?php } ?>
</div>

</div>
        <?php require_once 'Theme/blocks/footer.php'; ?>