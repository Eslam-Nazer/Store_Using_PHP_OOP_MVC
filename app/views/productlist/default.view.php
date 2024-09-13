<div>
    <a <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> href="/productlist/create" class="py-2 px-3 rounded-lg bg-[#0088a9] text-[#FFF] my-2 inline-block  hover:bg-[#FFF] hover:text-[#0088a9] border-2 hover:border-[#0088a9]">
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <div class="mx-2">
                <?= $text_new_product ?>
            </div>
        </div>
    </a>
    <table class="<?= $this->session->lang == 'ar' ? $this->session->lang : null ?>" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> id="data">
        <thead>
            <tr class="border-b-4 text-right border-[#8f9497]">
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_name ?></th>
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_category ?></th>
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_quantity ?></th>
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_unit ?></th>
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_barcode ?></th>
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_buyprice ?></th>
                <th <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_product_sellprice ?></th>
                <th class="w-1/6" <?= $this->session->lang == 'ar' ? 'style="text-align: right;"' : null ?>><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (false !== $products) {
                foreach ($products as $product) {
            ?>
                    <tr>
                        <td><?= $this->session->lang == 'en' ? $product->Name : $product->NameAr ?></td>
                        <td><?= $this->session->lang == 'en' ? $product->CategoryName : $product->CategoryNameAr ?></td>
                        <td><?= $product->Quantity ?></td>
                        <td><?= $product->Unit ?></td>
                        <td><?= $product->BarCode ?></td>
                        <td><?= $product->BuyPrice ?></td>
                        <td><?= $product->SellPrice ?></td>
                        <td>
                            <div class="flex justify-center items-center ">
                                <div class="transition-all duration-100 ease-linear hover:text-[rgb(0,136,169)] cursor-pointer ">
                                    <a class="edit" href="/productlist/edit/<?= $product->ProductId ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="transition-all duration-100 ease-linear hover:text-[#a90017] cursor-pointer mx-4">
                                    <a class="delete" href="/productlist/delete/<?= $product->ProductId ?>" onclick="if(!confirm('<?= $text_table_control_confirm_delete ?>')) return false;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>