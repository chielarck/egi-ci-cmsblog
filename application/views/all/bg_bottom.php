 		</div>
 	</div>
</div>

	
    <script src="<?php echo base_url(); ?>assets/js/flat-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/application.js"></script>      
	<script src="<?php echo base_url(); ?>assets/js/admin.js"></script>



	<script type="text/javascript">
		$("#file-0").fileinput({
        	'allowedFileExtensions' : ['jpg', 'png','gif'],
   		 });
	</script>

	<script type="text/javascript">
	$('#selectAll').click(function(event) {   
		if(this.checked) {
		    $(':checkbox').each(function() {
		        this.checked = true;                        
		    });
		}
		else {
			 $(':checkbox').each(function() {
		        this.checked = false;                        
		    });
		}
	});
	</script>
</body>
</html>