<form action="" method="post" enctype="multipart/form-data">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 <?= $this->session->lang == 'en' ? 'left-8' : 'right-8 font-zain' ?> bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>
        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#f2f4f5] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">

                <div class="flex gap-2" style="margin-bottom: 80px;">

                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-gray-300">
                        <select name="Supplier" id="" class="absolute left-1/2 transform translate-x-[-50%] p-[10px] rounded-[20px] w-full top-[16px] border-2 border-[#0984e3] cursor-pointer">
                            <option value=""><?= $text_label_Supplier ?></option>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option <?= $this->selectedIf("SupplierId", $supplier->SupplierId, $purchasesInvoice) ?> value="<?= $supplier->SupplierId ?>"><?= $this->session->lang == "en" ? $supplier->Name : $supplier->NameAr ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-gray-300">
                        <select name="PaymentType" id="" class="absolute left-1/2 transform translate-x-[-50%] p-[10px] rounded-[20px] w-full top-[16px] border-2 border-[#0984e3] cursor-pointer">
                            <option value=""><?= $text_label_PaymentType ?></option>
                            <?php foreach ($paymenttypes as $paymenttype) : ?>
                                <option <?= $this->selectedIf("PaymentTypeId", $paymenttype->PaymentTypeId, $purchasesInvoice) ?> value="<?= $paymenttype->PaymentTypeId ?>"><?= $paymenttype->TypeName . " | " . $paymenttype->TypeNameAr ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="flex mb-5">

                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-gray-300">
                        <select name="PaymentStatus" id="" class="absolute left-1/2 transform translate-x-[-50%] p-[10px] rounded-[20px] w-full top-[16px] border-2 border-[#0984e3] cursor-pointer">
                            <option value=""><?= $text_label_PaymentStatus ?></option>
                            <option <?= $this->selectedIf("PaymentStatus", "0", $purchasesInvoice); ?> value="0"><?= $this->session->lang == "en" ? "Payment has been made" : "تم الدفع" ?></option>
                            <option <?= $this->selectedIf("PaymentStatus", "1", $purchasesInvoice); ?> value="1"><?= $this->session->lang == "en" ? "Payment has not been made" : "لم تم الدفع" ?></option>
                        </select>
                    </div>

                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-gray-300">
                        <input name="Discount" value="<?= $this->showValue('Discount', $purchasesInvoice) ?>" type="number" min="0.01" max="1" step="0.01" id="floating_standard" class="block py-2.5 px-2 mt-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " maxlength="30" />
                        <label for="floating_standard" class="absolute text-lg px-2 mt-2 text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto <?= $this->session->lang == "ar" ? "font-zain" : null ?>">
                            <?= $text_label_Discount ?>
                        </label>
                    </div>

                </div>

                <div class="flex mb-5">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-gray-300">
                        <select name="Product" id="" class="absolute left-1/2 transform translate-x-[-50%] p-[10px] rounded-[20px] w-full top-[16px] border-2 border-[#0984e3] cursor-pointer">
                            <option value=""><?= $text_label_Product ?></option>
                            <?php foreach ($products as $product) : ?>
                                <option <?= $this->selectedIf("ProductId", $product->ProductId, $purchasesInvoiceDetails) ?> value="<?= $product->ProductId ?>"><?= $this->session->lang == "en" ? $product->Name : $product->NameAr ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="px-3 pt-3 mt-[70px]" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] cursor-pointer rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input class="px-3 py-2 <?= $this->session->lang == "ar" ? "font-zain" : null ?>" type="submit" name="submit" value="<?= $text_save_purchases_invoice ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>