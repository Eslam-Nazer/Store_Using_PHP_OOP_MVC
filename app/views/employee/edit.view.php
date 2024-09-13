<form action="" class="transition translate-x-0 duration-300 ease-linear" id="empForm" method="post" enctype="application/x-www-form-urlencoded">
    <div class="relative mt-8 w-4/5">
        <div class="py-1 px-3 absolute -top-3 left-8 bg-[#0088a9] text-md font-sans font-bold text-[#edf0f1]">
            Employee Information
        </div>
        <div class="overflow-auto mx-3 my-4">
            <div class="bg-slate-200 w-full pt-10 pb-3 px-5 border-2 border-gray-400 rounded-xl">
                <div class="flex">
                    <div class="relative z-0">
                        <input name="name" type="text" id="floating_standard" class="block border-r-2 py-2.5 mr-48 px-0 w-full  text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#0088a9] focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " value="<?= $employee->name ?>" required />
                        <label for="floating_standard" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Name
                        </label>
                    </div>
                    <div class="relative z-0">
                        <input name="address" type="text" id="floating_standard" class="block border-r-2 py-2.5 px-2 mr-48 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#0088a9] focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " value="<?= $employee->address ?>" required />
                        <label for="floating_standard" class="absolute text-lg px-2 text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Address
                        </label>
                    </div>
                    <div class="relative z-0">
                        <div id="Gender" class="block py-2.5 px-2 pl-6 mr-48 w-full text-lg border-b-2 border-gray-300">
                            <input <?php echo $employee->gender === 'Male' ? "checked=''" : null ?> value="Male" class="" type="radio" name="gender" id="male-radio">
                            <label class="hover:text-[#0088a9]" for="male-radio">Male</label>
                            <input <?php echo $employee->gender === 'Female' ? "checked=''" : null ?> value="Female" class="pl-3" type="radio" name="gender" id="female-radio">
                            <label class="hover:text-[#a90046]" for="female-radio">Female</label>
                        </div>
                        <label for="Gender" class="absolute text-lg font-bold px-2 text-gray-500 dark:text-gray-400 -translate-y-6 top-3">
                            Gender
                        </label>
                    </div>
                </div>
                <div class="flex">
                    <div class="relative z-0">
                        <input min="22" max="60" name="age" type="number" id="floating_standard" class="block border-r-2 py-2.5 mr-20 pb-2 pt-[31px] w-full  text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#0088a9] focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " value="<?= $employee->age ?>" required />
                        <label for="floating_standard" class="absolute text-lg pt-[15px] text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Age
                        </label>
                    </div>
                    <div class="relative z-0">
                        <input min="1500" max="11000" name="salary" type="number" id="floating_standard" class="block border-r-2 py-2.5 pb-2 pt-[31px] mr-36 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#0088a9] focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " value="<?= $employee->salary ?>" required />
                        <label for="floating_standard" class="absolute text-lg px-2 pt-[15px] text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Salary
                        </label>
                    </div>
                    <div class="relative z-0">
                        <input name="tax" type="number" min="0.01" max="5.00" step="0.01" id="floating_standard" class="block border-r-2 py-2.5 pb-2 pt-[31px] mr-36 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#0088a9] focus:outline-none focus:ring-0 focus:border-[#0088a9] peer" placeholder=" " value="<?= $employee->tax ?>" required />
                        <label for="floating_standard" class="absolute text-lg px-2 pt-[15px] text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-[#0088a9] peer-focus:dark:text-[#0088a9] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Tax
                        </label>
                    </div>
                    <div class="relative z-0">
                        <div id="floating_standard" class="block py-2.5 px-2 mr-48 w-full text-lg text-gray-900 border-0 border-b-2 border-gray-300">
                            <select name="type_of_work" id="countries" class="bg-gray-100 border-2 w-full border-gray-300 p-2.5 text-gray-900 text-lg rounded-lg focus:ring-[#0088a9] focus:border-[#0088a9] block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#0088a9] dark:focus:border-[#0088a9]">
                                <option value="0">Type of Work</option>
                                <option <?= $employee->type_of_work === 'FT' ? "selected" : null ?> value="FT">Full time</option>
                                <option <?= $employee->type_of_work === 'PT' ? "selected" : null ?> value="PT">Part time</option>
                                <option <?= $employee->type_of_work === 'R' ? "selected" : null ?> value="R">Remotly</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-b-2 border-gray-300 p-3">
                    <div class="text-xl font-sans">
                        Operating systems that the employee works on
                    </div>
                    <div class="">
                        <input <?= $employee->windows == true ? "checked" : null ?> name="windows" id="windows" type="checkbox" value="1" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="windows" class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Windows</label>
                    </div>
                    <div class="">
                        <input <?= $employee->linux == true ? "checked" : null ?> name="linux" id="linux" type="checkbox" value="1" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="linux" class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Linux</label>
                    </div>
                    <div class="">
                        <input <?= $employee->mac == true ? "checked" : null ?> name="mac" id="mac" type="checkbox" value="1" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="mac" class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Apple
                            Mac
                        </label>
                    </div>
                </div>
                <div class="p-3 border-b-2 border-gray-300">
                    <label for="message" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">
                        Notes of employee</label>
                    <textarea name="notes" id="message" rows="4" class="block p-2.5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#0088a9] focus:border-[#0088a9] dark:bg-gray-700 dark:border-[#0088a9] dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#0088a9] dark:focus:border-[#0088a9]" placeholder="Write your thoughts here..."><?= $employee->notes ?></textarea>
                </div>
                <div class="px-3 pt-3">
                    <div class="px-3 py-2 bg-[#0088a9] w-1/12 flex justify-center text-center text-xl font-bold text-[#e5f2f5] cursor-pointer rounded-xl border-2 hover:bg-[#e5f2f5] hover:text-[#0088a9] hover:border-[#0088a9]">
                        <input type="submit" name="submit" value="Save">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>