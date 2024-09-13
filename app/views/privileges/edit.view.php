<form action="" class="transition translate-x-0 duration-300 ease-linear" id="empForm" method="post" enctype="application/x-www-form-urlencoded">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 left-8 bg-[#0088a9] text-md font-sans font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>
        <div class="overflow-auto mx-3 my-4">
            <div class="bg-[#fafafa] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-xl">
                <div class="flex">
                    <div class="relative z-0 w-1/2" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                        <input <?= $this->session->lang == 'ar' ? 'dir="rtl"' : 'dir="ltr"' ?> value="<?= $this->showValue("PrivilegeTitle", $privilege) ?>" name="PrivilegeTitle" type="text" id="floating_standard" class="block font-inter ltr:border-r-2 rtl:border-l-2 py-2.5 px-0 w-full  text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="30" required />
                        <label for="floating_standard" class="absolute <?= $this->session->lang == 'ar' ? 'pr-2' : null ?> text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_privilege_title_en ?>
                        </label>
                    </div>
                    <div class="relative z-0 w-1/2" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                        <input dir="ltr" value="<?= $this->showValue("Privilege", $privilege) ?>" name="Privilege" type="text" id="floating_standard" class="block font-inter py-2.5 px-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="30" required />
                        <label for="floating_standard" class="absolute text-lg px-2 text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_privilege_url ?>
                        </label>
                    </div>
                </div>

                <div class="flex">
                    <div class="relative z-0 w-full" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                        <input <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> value="<?= $this->showValue("PrivilegeTitleAr", $privilege) ?>" name="PrivilegeTitleAr" type="text" id="floating_standard" class="block font-zain py-2.5 px-0 mt-2 w-full  text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " maxlength="30" required />
                        <label for="floating_standard" class="absolute mt-2 text-lg text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_privilege_title_ar ?>
                        </label>
                    </div>
                </div>

                <div class="px-3 pt-3" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <button class="px-3 py-2" type="submit" name="submit" value="Save"><?= $text_save_privilege ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>