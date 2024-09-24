<form action="" method="post" enctype="multipart/form-data">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 <?= $this->session->lang == 'en' ? 'left-8' : 'right-8 font-zain' ?> bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>
        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#f2f4f5] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">

                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-full">
                        <select name="DailyExpense" id="" class="absolute left-1/2 top-1/2 transform translate-x-[-50%] translate-y-[-50%] p-[15px] rounded-[20px] w-[35%] border-2 border-[#0984e3] cursor-pointer">
                            <option value=""><?= $text_label_DailyExpense ?></option>
                            <?php foreach ($expenses as $expense) : ?>
                                <option <?= $this->selectedIf("ExpenseId", $expense->ExpenseId, $dailyexpense); ?> value="<?= $expense->ExpenseId ?>"><?= $this->session->lang == "en" ? $expense->ExpenseName : $expense->ExpenseNameAr ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="px-3 pt-3" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9] cursor-pointer">
                        <input class="px-3 py-2 <?= $this->session->lang == "ar" ? "font-zain" : null ?> cursor-pointer" type="submit" name="submit" value="<?= $text_save_daily_expenses ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>