<div class="<?= $this->session->lang == "en" ? "font-inter" : "font-zain text-lg" ?>">
    <a href="/purchasesinvoices/create" class="py-2 px-3 rounded-lg bg-[#0088a9] text-[#FFF] my-2 inline-block  hover:bg-[#FFF] hover:text-[#0088a9] border-2 hover:border-[#0088a9]">
        <div class="flex justify-center items-center">
            <i class="fa-solid fa-file-invoice"></i>
            <div class="mx-2 <?= $this->session->lang == 'ar' ? "font-zain" : null ?>">
                <?= $text_new_purchases_invoice ?>
            </div>
        </div>
    </a>
    <table class="" id="data">
        <thead>
            <tr>
                <th class="!text-center"><?= $text_table_supplier_name ?></th>
                <th class="!text-center"><?= $text_table_payment_type ?></th>
                <th class="!text-center"><?= $text_table_payment_status ?></th>
                <th class="!text-center"><?= $text_table_payment_amount ?></th>
                <th class="!text-center"><?= $text_table_created ?></th>
                <th class="!text-center"><?= $text_table_discount ?></th>
                <th class="!text-center"><?= $text_table_username_creator ?></th>
                <th class="!text-center"><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (false !== $purchases) :
                foreach ($purchases as $purchase) :
                    $SupplierName = explode(" ", $purchase->SupplierName);
                    $SupplierNameAr = explode(" ", $purchase->SupplierNameAr);
            ?>
                    <tr>
                        <td class="text-xl !text-center"><?= $this->session->lang == 'en' ? $SupplierName[0] . " " . $SupplierName[1] : $SupplierNameAr[0] . " " . $SupplierNameAr[1] ?></td>
                        <td class="text-xl !text-center"><?= $this->session->lang == 'en' ? $purchase->TypeName : $purchase->TypeNameAr ?></td>
                        <td class="text-xl !text-center"><?= $purchase->PaymentStatus == 1 ? '<i class="fa-solid fa-circle-xmark"></i>' : '<i class="fa-solid fa-circle-check"></i>' ?></td>
                        <td class="text-xl !text-center"><?= $purchase->PaymentAmount ?></td>
                        <td class="text-xl !text-center"><?= $purchase->Created ?></td>
                        <td class="text-xl !text-center"><?= $purchase->Discount * 100 ?></td>
                        <td class="text-xl !text-center"><?= $purchase->UserCreator ?></td>
                        <td>
                            <div class="flex items-center justify-center ">
                                <div class="transition-all duration-100 ease-linear hover:text-[#0088a9] cursor-pointer">
                                    <a class="edit" href="/purchasesinvoices/edit/<?= $purchase->InvoiceId ?>">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                </div>
                                <div class="transition-all duration-100 ease-linear hover:text-[#a90017] cursor-pointer mx-4">
                                    <a class="delete" href="/purchasesinvoices/delete/<?= $purchase->InvoiceId ?>" onclick="if(!confirm('<?= $text_delete_daily_expenses_payment ?>')) return false;">
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