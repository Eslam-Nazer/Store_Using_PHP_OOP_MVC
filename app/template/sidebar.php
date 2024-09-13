<aside <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?> class="w-1/5 bg-[#0d282f] rtl:right-0  fixed ltr:mr-4 rtl:ml-4 mt-10 h-screen flex-row z-0 transition translate-x-0 duration-[0.6s] <?= $_SESSION['lang'] == 'ar' ? 'font-zain' : 'font-inter' ?>" id="sidebar">
    <div class="flex justify-center mt-6">
        <div class="w-28 h-28 border-4 border-[#0088a9] rounded-[50%] p-1">
            <img class="rounded-[50%]" src="/img/default.jpg" alt="user default image">
        </div>
    </div>
    <div class="flex justify-center pt-2 font-bold text-xl text-[#eaeded] font-inter">
        <h1><?= $this->session->u->profile->FirstName ?> <?= $this->session->u->profile->LastName ?></h1>
    </div>
    <div class="flex justify-center text-[#03a9d3] font-bold text-lg">
        <h2><?= $this->session->lang == 'ar' ? $this->session->u->GroupNameAr : $this->session->u->GroupName ?></h2>
    </div>

    <ul class="flex flex-col justify-center text-center mt-1">
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9]">
            <a href="/index">
                <div class="flex items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
                    </div>
                    <div class="mx-3">
                        <?= $text_general_statistics ?>
                    </div>
                </div>
            </a>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class="py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9] cursor-pointer">

            <div class="flex items-center justify-between sub-btn">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <div class="mx-3">
                        <?= $text_transactions ?>
                    </div>
                </div>
                <div class="flex items-center <?= $this->session->lang == 'ar' ? "rotate-180" : null ?> ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dropdown rotate-0 transform duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>
            <div class="sub-menu float-start mx-5 hidden py-2">
                <ul>
                    <a href="#">
                        <li class="cursor-pointer hover:text-[#0088a9]"><?= $text_purchases ?></li>
                    </a>
                    <a href="#">
                        <li class=" float-start cursor-pointer hover:text-[#0088a9]"><?= $text_sales ?></li>
                    </a>
                </ul>
            </div>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class="py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9] cursor-pointer">

            <div class="flex items-center justify-between sub-btn">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    <div class="mx-3">
                        <?= $text_expenses ?>
                    </div>
                </div>
                <div class="flex items-center <?= $this->session->lang == 'ar' ? "rotate-180" : null ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dropdown rotate-0 transform duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>
            <div class="sub-menu float-start mx-5 hidden py-2">
                <ul>
                    <a href="#">
                        <li class=" cursor-pointer hover:text-[#0088a9]"><?= $text_type_of_expenses ?></li>
                    </a>
                    <a href="#">
                        <li class="float-start cursor-pointer hover:text-[#0088a9]"><?= $text_daily_expenses ?></li>
                    </a>
                </ul>
            </div>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class="py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9] cursor-pointer">

            <div class="flex justify-between items-center sub-btn">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                    <div class="mx-3">
                        <?= $text_store ?>
                    </div>
                </div>
                <div class="flex items-center <?= $this->session->lang == 'ar' ? "rotate-180" : null ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dropdown rotate-0 transform duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>
            <div class="sub-menu float-start mx-5 hidden py-2">
                <ul>
                    <a href="/productscategories">
                        <li class=" cursor-pointer hover:text-[#0088a9]"><?= $text_products_categories ?></li>
                    </a>
                    <a href="/productlist">
                        <li class="float-start cursor-pointer hover:text-[#0088a9]"><?= $text_products ?></li>
                    </a>
                </ul>
            </div>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9]">
            <a href="/clients/default">
                <div class="flex items-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div class="mx-3">
                        <?= $text_clients ?>
                    </div>
                </div>
            </a>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9]">
            <a href="/suppliers/default">
                <div class="flex items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                    <div class="mx-3">
                        <?= $text_suppliers ?>
                    </div>
                </div>
            </a>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9] cursor-pointer">
            <div class="flex items-center justify-between sub-btn">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <div class="mx-3">
                        <?= $text_users ?>
                    </div>
                </div>
                <div class="flex items-center <?= $this->session->lang == 'ar' ? "rotate-180" : null ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dropdown rotate-0 transform duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>

            <div class="sub-menu float-start mx-5 hidden py-2">
                <ul>
                    <a href="/users">
                        <li class="float-start cursor-pointer hover:text-[#0088a9]"><?= $text_list_of_users ?></li>
                    </a>
                    <a href="/usersgroups" class="block">
                        <li class="float-start cursor-pointer hover:text-[#0088a9]"><?= $text_users_groups ?></li>
                    </a>
                    <a href="/privileges" class="block">
                        <li class="float-start cursor-pointer hover:text-[#0088a9]"><?= $text_privileges ?></li>
                    </a>
                </ul>
            </div>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9]">
            <a href="/employee/">
                <div class="flex items-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                        </svg>
                    </div>
                    <div class="mx-3">
                        <?= $text_reports ?>
                    </div>
                </div>
            </a>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9]">
            <a href="/employee/">
                <div class="flex items-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </div>
                    <div class="mx-3">
                        <?= $text_notifications ?>
                    </div>
                </div>
            </a>
        </li>
        <li dir="<?= $this->session->lang == 'en' ? "ltr" : "rtl" ?>" class=" py-1 px-2 text-[#6b7273] text-lg font-bold transition-all hover:bg-[#051e24] duration-100 ease-linear ltr:hover:border-l-[6px] rtl:hover:border-r-[6px] hover:border-[#0088a9]">
            <a href="/auth/logout">
                <div class="flex items-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </div>
                    <div class="mx-3">
                        <?= $text_logout ?>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</aside>