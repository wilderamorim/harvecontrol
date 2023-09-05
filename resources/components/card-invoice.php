<div class="flex items-center justify-between mx-auto bg-white shadow border-l-4 border-l-<?= $invoice->color; ?>-400 rounded px-4 py-4">
    <div class="">
        <h5 class="font-medium text-xs text-gray-500"><?= $this->e($invoice->description); ?></h5>
        <p class="text-[8px] text-gray-500">
            <?= $invoice->kind === 'income' ? 'Recebimento' : 'Vencimento'; ?>: <?= $invoice->due_date; ?>
        </p>
    </div>

    <div class="flex gap-2 ">
        <span class="flex bg-<?= $invoice->color; ?>-50 text-<?= $invoice->color; ?>-400 rounded px-2 py-1 font-medium text-xs"><?= $invoice->amount; ?></span>
        <button class="bg-<?= $invoice->color; ?>-50 text-<?= $invoice->color; ?>-500 rounded hover:bg-<?= $invoice->color; ?>-100 py-1 px-2">
            <i class="fa-regular fa-thumbs-up"></i>
        </button>
    </div>
</div>