<?php $this->layout('layouts/app', ['title' => $title]) ?>

<?= $this->insert('components/balance-chart')?>

<?= $this->insert('components/last-invoices')?>
