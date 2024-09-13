<form class=" <?= $this->session->lang == "en" ? "font-inter" : "" ?>" action="" method="post" enctype="application/x-www-form-urlencoded">
    <div class="relative mt-8 w-full">
        <div <?= $this->session->lang == "ar" ? 'dir="rtl"' : 'dir=ltr' ?> class="py-1 px-3 absolute -top-4 ltr:left-8 rtl:right-8 bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>

        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#feffff] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">
                <div class="flex">
                    <div class="relative z-0 w-1/2">
                        <input <?= $this->session->lang == "ar" ? 'dir="rtl"' : 'dir=ltr' ?> name="Name" value="<?= $this->showValue('Name') ?>" type="text" id="floating_standard" class="font-inter w-full block py-2.5 px-2 text-lg text-gray-900 bg-transparent ltr:border-r-2 rtl:border-l-2 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="40" />
                        <label <?= $this->session->lang == "ar" ? 'dir="rtl"' : 'dir=ltr' ?> for="floating_standard" class="absolute px-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_Name ?>
                        </label>
                    </div>
                    <div class="relative z-0 w-1/2">
                        <input name="Email" value="<?= $this->showValue('Email') ?>" type="email" id="floating_standard" class="font-inter w-full block py-2.5 px-2 text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " />
                        <label for="floating_standard" class="px-2 absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_Email ?>
                        </label>
                    </div>
                </div>

                <div class="flex">
                    <div class="relative z-0 w-1/2">
                        <input <?= $this->session->lang == "ar" ? 'dir="rtl"' : 'dir=ltr' ?> name="NameAr" value="<?= $this->showValue('NameAr') ?>" type="text" id="floating_standard" class="font-zain w-full block pt-4 pb-2 px-2 text-lg text-gray-900 bg-transparent ltr:border-r-2 rtl:border-l-2 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="40" />
                        <label for="floating_standard" class="absolute px-2 pt-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_NameAr ?>
                        </label>
                    </div>

                    <div class="relative z-0 w-1/2">
                        <input <?= $this->session->lang == "ar" ? 'dir="rtl"' : 'dir=ltr' ?> name="PhoneNumber" value="<?= $this->showValue('PhoneNumber') ?>" type="text" id="floating_standard" class="font-inter w-full block pt-4 pb-2 px-2 text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="40" />
                        <label for="floating_standard" class="absolute px-2 pt-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_PhoneNumber ?>
                        </label>
                    </div>
                </div>

                <div class="flex">
                    <div class="relative z-0 w-1/2">
                        <input name="Address" value="<?= $this->showValue('Address') ?>" type="text" id="floating_standard" class=" w-full block pt-4 pb-2 px-2 text-lg text-gray-900 bg-transparent ltr:border-r-2 rtl:border-l-2 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="50" />
                        <label for="floating_standard" class="absolute px-2 pt-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_Address ?>
                        </label>
                    </div>

                    <div class="relative z-0 w-1/2">
                        <input name="AddressAr" value="<?= $this->showValue('AddressAr') ?>" type="text" id="floating_standard" class="font-zain w-full block pt-4 pb-2 px-2 text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="50" />
                        <label for="floating_standard" class="absolute px-2 pt-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_AddressAr ?>
                        </label>
                    </div>
                </div>

                <div class="px-3 pt-3">
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input class="px-3 py-2 cursor-pointer" type="submit" name="submit" value="<?= $text_save_supplier ?>">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>