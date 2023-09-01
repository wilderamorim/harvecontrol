<!-- begin: List last invoices -->
<div class="space-y-5 w-[90%] lg:w-[60%] mx-auto">
    <div class="flex justify-between ">
        <h2 class="font-bold text-gray-400">Últimos lançamentos</h2>
    </div>

    <?= $this->insert('components/card-invoice', [
        'kind' => 'income',
        'amount' => "R$ 1.200,00",
        'description' => 'Desenvolvimento de Website',
        'due_date' => '30/08/2023',
    ]) ?>

    <?= $this->insert('components/card-invoice', [
        'kind' => 'expense',
        'amount' => "R$ 90,00",
        'description' => 'Energia Elétrica',
        'due_date' => '30/08/2023',
    ]) ?>

</div>
<!-- end: list last invoices -->