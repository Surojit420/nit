<?php $this->load->view('admin/component/header'); ?>

<?php $this->load->view('admin/component/sidebar'); ?>
<!--  ####################### load page ##########################   -->
<?php $this->load->view('admin/'.$subview);?>
<!--  ####################### load page ##########################   -->
<?php $this->load->view('admin/component/footer'); ?>
