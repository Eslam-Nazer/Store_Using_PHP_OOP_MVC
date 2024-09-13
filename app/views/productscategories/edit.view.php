<form action="" method="post" enctype="multipart/form-data">
    <div class="relative mt-8 w-full">
        <div class="py-1 px-3 absolute -top-3 left-8 bg-[#0088a9] text-md font-bold text-[#edf0f1]">
            <?= $text_legend ?>
        </div>
        <div class="overflow-auto mx-2 my-4">
            <div class="bg-[#f2f4f5] w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-md">
                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-full">
                        <input name="Name" value="<?= $this->showValue('Name', $category) ?>" type="text" id="floating_standard" class="block font-inter py-2.5 px-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " required maxlength="30" />
                        <label for="floating_standard" class="absolute px-2 text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_Name ?>
                        </label>
                    </div>
                </div>

                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-full">
                        <input name="NameAr" value="<?= $this->showValue('NameAr', $category) ?>" type="text" id="floating_standard" class="block font-zain py-2.5 px-2 mt-2 w-full text-lg text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " required maxlength="30" />
                        <label for="floating_standard" class="absolute text-lg px-2 mt-2 text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?= $text_label_NameAr ?>
                        </label>
                    </div>
                </div>

                <div class="flex">
                    <div <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="relative z-0 w-full">

                        <div class="flex items-center justify-center w-full mt-3 border-b-2 border-gray-300 pb-3">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-6 h-6 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold"><?= $text_category_image_p1 ?></span> <?= $text_category_image_p2 ?></p>
                                    <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <div class="items-center absolute left-0 pt-1 pb-1">
                                    <input id="dropzone-file" name="image" type="file" accept="image/svg, image/png, image/jpg, image/jpeg, image/gif" />
                                </div>
                            </label>
                        </div>

                    </div>
                </div>
                <?php if ($category->Image != null) : ?>
                    <div class="flex justify-center items-center border-b-2 border-gray-300">
                        <div class="p-3">
                            <img src="/uploads/images/<?= $category->Image; ?>" width="70%">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="px-3 pt-3" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>
                    <div class="bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] cursor-pointer rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input class="px-3 py-2" type="submit" name="submit" value="<?= $text_save_category ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>