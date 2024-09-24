<div class="<?= $this->session->lang == "en" ? "font-inter" : "font-zain text-lg" ?>">
    <a href="/dailyexpenses/create" class="py-2 px-3 rounded-lg bg-[#0088a9] text-[#FFF] my-2 inline-block  hover:bg-[#FFF] hover:text-[#0088a9] border-2 hover:border-[#0088a9]">
        <div class="flex justify-center items-center">
            <i class="fa-solid fa-money-bill"></i>
            <div class="mx-2 <?= $this->session->lang == 'ar' ? "font-zain" : null ?>">
                <?= $text_new_daily_expense ?>
            </div>
        </div>
    </a>
    <table class="" id="data">
        <thead>
            <tr>
                <th class="!text-center"><?= $text_table_expense_name ?></th>
                <th class="!text-center"><?= $text_table_expense_payment ?></th>
                <th class="!text-center"><?= $text_table_user_expense_creator ?></th>
                <th class="!text-center"><?= $text_table_expense_date ?></th>
                <th class="!text-center"><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (false !== $dailyExpenses) :
                foreach ($dailyExpenses as $dailyExpense) :
            ?>
                    <tr>
                        <td class="text-xl !text-center"><?= $this->session->lang == 'en' ? $dailyExpense->ExpenseName : $dailyExpense->ExpenseNameAr ?></td>
                        <td class="text-xl !text-center"><?= $dailyExpense->Payment ?></td>
                        <td class="text-xl !text-center"><?= $dailyExpense->UsernameCreator ?></td>
                        <td class="text-xl !text-center"><?= $dailyExpense->Created ?></td>
                        <td>
                            <div class="flex items-center justify-center ">
                                <div class="transition-all duration-100 ease-linear hover:text-[#0088a9] cursor-pointer">
                                    <a class="edit" href="/dailyexpenses/edit/<?= $dailyExpense->DExpensesId ?>">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                </div>
                                <div class="transition-all duration-100 ease-linear hover:text-[#a90017] cursor-pointer mx-4">
                                    <a class="delete" href="/dailyexpenses/delete/<?= $dailyExpense->DExpensesId ?>" onclick="if(!confirm('<?= $text_delete_daily_expenses_payment ?>')) return false;">
                                        <i class="fa-solid fa-trash fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</div>