<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
			  <div class="panel-heading">Login Administrator</div>
			  	<div class="panel-body">
					<form action="<?php echo base_url(); ?>admin/doLogin" method="post">
						<div class="form-group">
							<input class="form-control" type="text" name="username" placeholder="username" />
						</div>	
						<div class="form-group">
							<input class="form-control" type="password" name="password" placeholder="password" />
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Primary</button>
						</div>				
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
