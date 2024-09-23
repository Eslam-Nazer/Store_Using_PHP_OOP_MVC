<form action="" method="post" enctype="multipart/form-data">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 <?= $this->session->lang == 'en' ? 'left-8' : 'right-8 font-zain' ?> bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>
        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#f2f4f5] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">
                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-full">
                        <input name="ExpenseName" value="<?= $this->showValue('ExpenseName', $typeOfExpense) ?>" type="text" id="floating_standard" class="block font-inter py-2.5 px-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " required maxlength="30" />
                        <label for="floating_standard" class="absolute px-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto <?= $this->session->lang == "ar" ? "font-zain" : null ?>">
                            <?= $text_label_ExpenseName ?>
                        </label>
                    </div>
                </div>

                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-r-2 border-gray-300">
                        <input name="ExpenseNameAr" value="<?= $this->showValue('ExpenseNameAr', $typeOfExpense) ?>" type="text" id="floating_standard" class="block font-zain py-2.5 px-2 mt-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " required maxlength="30" />
                        <label for="floating_standard" class="absolute text-lg px-2 mt-2 text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto <?= $this->session->lang == "ar" ? "font-zain" : null ?>">
                            <?= $text_label_ExpenseNameAr ?>
                        </label>
                    </div>

                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2 border-gray-300">
                        <input name="FixedPayment" value="<?= $this->showValue('FixedPayment', $typeOfExpense) ?>" type="number" min="1" step="0.01" id="floating_standard" class="block py-2.5 px-2 mt-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " required maxlength="30" />
                        <label for="floating_standard" class="absolute text-lg px-2 mt-2 text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto <?= $this->session->lang == "ar" ? "font-zain" : null ?>">
                            <?= $text_label_FixedPayment ?>
                        </label>
                    </div>
                </div>


                <div class="px-3 pt-3" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] cursor-pointer rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input class="px-3 py-2 <?= $this->session->lang == "ar" ? "font-zain" : null ?>" type="submit" name="submit" value="<?= $text_save_type_of_expenses ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>