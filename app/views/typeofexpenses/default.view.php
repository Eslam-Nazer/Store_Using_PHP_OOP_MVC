<div class="<?= $this->session->lang == "en" ? "font-inter" : "font-zain text-lg" ?>">
    <a href="/typeofexpenses/create" class="py-2 px-3 rounded-lg bg-[#0088a9] text-[#FFF] my-2 inline-block  hover:bg-[#FFF] hover:text-[#0088a9] border-2 hover:border-[#0088a9]">
        <div class="flex justify-center items-center">
            <i class="fa-solid fa-money-bill"></i>
            <div class="mx-2 <?= $this->session->lang == 'ar' ? "font-zain" : null ?>">
                <?= $text_new_type_of_expenses ?>
            </div>
        </div>
    </a>
    <table class="" id="data">
        <thead>
            <tr>
                <th class="!text-center"><?= $text_table_expenses_name ?></th>
                <th class="!text-center"><?= $text_table_expenses_fixed_payment ?></th>
                <th class="!text-center"><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (false !== $epensestypes) :
                foreach ($epensestypes as $epensestype) :
            ?>
                    <tr>
                        <td class="text-xl !text-center"><?= $this->session->lang == 'en' ? $epensestype->ExpenseName : $epensestype->ExpenseNameAr ?></td>
                        <td class="text-xl !text-center"><?= $epensestype->FixedPayment ?></td>
                        <td>
                            <div class="flex items-center justify-center ">
                                <div class="transition-all duration-100 ease-linear hover:text-[#0088a9] cursor-pointer">
                                    <a class="edit" href="/typeofexpenses/edit/<?= $epensestype->ExpenseId ?>">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                </div>
                                <div class="transition-all duration-100 ease-linear hover:text-[#a90017] cursor-pointer mx-4">
                                    <a class="delete" href="/typeofexpenses/delete/<?= $epensestype->ExpenseId ?>" onclick="if(!confirm('<?= $text_delete_type_of_expenses ?>')) return false;">
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