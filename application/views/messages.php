<?php if ($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success_message') ?></div>
<?php endif; unset($_SESSION['success_message']); ?>


<?php if ($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error_message') ?></div>
<?php endif; unset($_SESSION['error_message']); ?>