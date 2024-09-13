<form action="" method="post" enctype="application/x-www-form-urlencoded">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 left-8 bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>

        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#feffff] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">

                <div class="flex">
                    <div class="relative z-0 w-3/6">
                        <input name="PhoneNumber" value="<?= $this->showValue('PhoneNumber', $user) ?>" type="text" id="floating_standard" class=" w-full block py-3 px-2 text-lg text-gray-900 bg-transparent border-r-2 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-b-[#0088a9] peer" placeholder=" " />
                        <label for="floating_standard" class="py-2 px-2 mb-1 absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_PhoneNumber ?>
                        </label>
                    </div>
                    <div class="relative z-0 w-3/6">
                        <div id="floating_standard" class="block px-2 pb-3 pt-[4px] w-full text-lg text-gray-900 border-0 border-b-2 border-gray-300">
                            <select name="GroupId" id="countries" class="text-center bg-gray-100 border-2 w-full border-gray-300 p-1 ml-2 text-gray-900 text-lg rounded-lg focus:ring-[#0088a9] focus:border-[#0088a9]">
                                <option value=""><?= $text_label_GroupId ?></option>
                                <?php if ($groups != false) : foreach ($groups as $group) : ?>
                                        <option <?= $this->selectedIf('GroupId', $group->GroupId, $user) ?> value="<?= $group->GroupId ?>"><?= $group->GroupName ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="px-3 pt-3">
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] cursor-pointer rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input class="px-3 py-2" type="submit" name="submit" value="<?= $text_save_user ?>">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>