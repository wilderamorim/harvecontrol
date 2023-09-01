<?php $this->layout('layouts/app', compact('title')); ?>

<?= $this->insert('components/balance-chart'); ?>

<?= $this->insert('components/last-invoices', compact('invoices')); ?>
