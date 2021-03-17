<script>

window.onload = function() {
toastr.error("<?php echo $this->session->flashdata('error')?>","",
	{
		positionClass:"toast-bottom-full-width",
		timeOut:5e3,closeButton:!0,debug:!1,
		newestOnTop:!0,progressBar:!0,
		preventDuplicates:!0,onclick:null,
		showDuration:"300",hideDuration:"1000",
		extendedTimeOut:"1000",showEasing:"swing",
		hideEasing:"linear",showMethod:"fadeIn",
		hideMethod:"fadeOut",tapToDismiss:!1
	})};

</script>