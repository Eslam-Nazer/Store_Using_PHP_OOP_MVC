<form action="" method="post" enctype="application/x-www-form-urlencoded">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 left-8 bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>
        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#f2f4f5] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">
                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2">
                        <input name="GroupName" dir="ltr" type="text" id="floating_standard" class="block font-roboto border-r-2 py-2.5 px-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " />
                        <label for="floating_standard" class="absolute px-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_group_name_en ?>
                        </label>
                    </div>
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-1/2">
                        <input name="GroupNameAr" dir="rtl" type="text" id="floating_standard" class="block font-zain py-2.5 px-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " />
                        <label for="floating_standard" class="absolute text-lg px-2 text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_group_name_ar ?>
                        </label>
                    </div>
                </div>

                <div class="border-b-2 border-gray-300 p-3" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="text-xl">
                        <?= $text_privileges_belonging_to_group ?>
                    </div>
                    <?php
                    if (false !== $privileges) {
                        foreach ($privileges as $privilege) {
                    ?>
                            <div>
                                <input name="Privileges[]" id="<?= $privilege->PrivilegeTitle ?>" type="checkbox" value="<?= $privilege->PrivilegeId ?>" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-[#0088a9] dark:focus:ring-[#0088a9] focus:ring-2">
                                <label for="<?= $privilege->PrivilegeTitle ?>" class="ms-2 text-lg font-medium text-gray-900 select-none"><?= $this->session->lang == 'ar' ? $privilege->PrivilegeTitleAr : $privilege->PrivilegeTitle ?></label>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>

                <div class="px-3 pt-3" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] cursor-pointer rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input class="px-3 py-2" type="submit" name="submit" value="<?= $text_save_group ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>