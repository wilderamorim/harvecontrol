<div class="flex items-center justify-between mx-auto bg-white shadow border-l-4 border-l-<?= $kind == 'income'?'green':'red'?>-400 rounded px-4 py-4">
    <div class="">
        <h5 class="font-medium text-xs text-gray-500"><?= $description ?></h5>
        <p class="text-[8px] text-gray-500"><?= $kind == 'income'? 'Recebimento':'Vencimento' ?> : <?=$due_date?></p>
    </div>

    <div class="flex gap-2 ">
        <span class="flex bg-<?= $kind == 'income'?'green':'red'?>-50 text-<?= $kind == 'income'?'green':'red'?>-400 rounded px-2 py-1 font-medium text-xs"><?=$amount?></span>
        <button class="bg-<?= $kind == 'income'?'green':'red'?>-50 text-<?= $kind == 'income'?'green':'red'?>-500 rounded hover:bg-<?= $kind == 'income'?'green':'red'?>-100 py-1 px-2">
            <i class="fa-regular fa-thumbs-up"></i>
        </button>
    </div>
</div>