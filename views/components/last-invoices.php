<!-- begin: List last invoices -->
<div class="space-y-5 w-[90%] lg:w-[60%] mx-auto">
    <div class="flex justify-between ">
        <h2 class="font-bold text-gray-400">Últimos lançamentos</h2>
    </div>

    <?php foreach ($invoices as $invoice):?>
        <?= $this->insert('components/card-invoice', compact('invoice')); ?>
    <?php endforeach; ?>

</div>
<!-- end: list last invoices -->