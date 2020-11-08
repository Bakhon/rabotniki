<?php require 'Theme/blocks/header.php';
 require_once 'function.php';
?>

<div class="container">
<div class="row pt-5">
   <div class="col-3 "> 

		
     </div>
  
<div class="col-9">

	<div class="col-md-9">
    <div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-9">
						<h3 class="panel-title">Анкетные данные</h3>
					</div>
					<div class="col-md-3" align="right">
						<a href="edit.php" class="btn btn-success btn-xs">Редактировать</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<?php
				echo Get_user_profile_data_html($_SESSION["id"]);
				?>
			</div>
		</div>
   </div>
</div>
</div>
</div>
</div>
        <?php require_once 'Theme/blocks/footer.php'; ?>