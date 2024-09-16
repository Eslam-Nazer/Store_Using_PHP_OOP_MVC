<header class="w-full fixed top-0 z-50 h-10 bg-[#0088a9] overflow-hidden flex p-1 items-center justify-between <?= $_SESSION['lang'] == 'ar' ? 'font-zain' : 'font-inter' ?>" <?= $this->session->lang == 'ar' ? 'dir="rtl"' : null ?>>

    <div class="flex items-center text-[#eaeded]">
        <div class="ml-2 cursor-pointer transition rotate-90 duration-[0.6s]" id="sidebtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        <div class="text-xl flex items-center font-bold ml-2 select-none">
            <a href="/index">
                <?= $text_dashboard ?>
            </a>
            <div class="mx-2">
                <?php if (isset($text_header)) :
                    echo '<div class="mx-2 inline-block">></div>' . $text_header;
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="flex items-center">
        <nav>
            <ul class="flex items-center">
                <a href="/language">
                    <li class="flex items-center text-[#eaeded] mx-2 cursor-pointer">
                        <div class="text-xl <?= $this->session->lang == 'font-zain' ? 'font-roboto' : null ?>"><?= $this->session->lang == 'ar' ? 'عربي' : ucfirst($this->session->lang) ?></div>
                        <div class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
                            </svg>
                        </div>
                    </li>
                </a>
                <li class="text-[#eaeded] mx-2 cursor-pointer test <?= $this->notification->seenChecker() == true ? "check" : null ?>" id="notify">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                    </svg>
                </li>
                <?php if (isset($_POST['action']) == "checked" && $this->notification->seenChecker()) {
                    $this->notification->seen();
                } ?>
                <li class="text-[#eaeded] mx-2 cursor-pointer ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </li>
            </ul>
        </nav>
        <div class="flex items-center font-inter text-[#eaeded] mx-4 cursor-pointer">
            <div class="font-bold text-lg">
                <?= $this->session->u->Username ?>
            </div>
            <svg class="w-4 h-4 mx-2 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
    </div>

</header>