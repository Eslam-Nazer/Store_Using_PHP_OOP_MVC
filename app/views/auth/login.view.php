<!-- my body -->
<div class="my-body">
    <?php $messages = $this->messenger->getMessages();
    if (!empty($messages)) : foreach ($messages as $message) : ?>

            <div class="message m<?= $message[1] ?> <?= $this->session->lang == 'ar' ? 'text-end' : null ?>">
                <p class=" mx-3"><?= $message[0] ?></p>
            </div>

    <?php endforeach;
    endif; ?>
    <!-- container -->
    <div class="my-container" id="my-container">
        <!-- form en container -->
        <div class="form-container Sign-in-en">

            <form method="post" action="">
                <h1 class="text-center text-5xl font-bold my-4"><?= $login_header_en ?></h1>
                <label for="UserName">
                    <i class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </i>
                    <?= $login_ucname_en ?>
                </label>
                <input type="text" name="UserName" id="UserName" placeholder="UserName">
                <label for="Password">
                    <i class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </i>
                    <?= $login_ucpwd_en ?>
                </label>
                <input type="password" name="Password" id="Password" placeholder="Password">
                <a href="#">
                    <?= $login_forget_password_en ?>
                </a>
                <input class="Sign-btn" type="submit" name="SginIn" value="Sgin In">
            </form>
        </div>
        <!-- form ar container  -->
        <div class="form-container Sign-in-ar font-zain">

            <form method="post" action="">
                <h1 class="text-center text-5xl font-bold my-4"><?= $login_header_ar ?></h1>
                <label class="flex flex-row-reverse" for="UserName">
                    <i class="ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </i>
                    <?= $login_ucname_ar ?>
                </label>
                <input dir="rtl" type="text" name="UserName" id="UserName" placeholder="<?= $login_ucname_ar ?>">
                <label class="flex flex-row-reverse" for="Password">
                    <i class="ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </i>
                    <?= $login_ucpwd_ar ?>
                </label>
                <input dir="rtl" type="password" name="Password" id="Password" placeholder="<?= $login_ucpwd_ar ?>">
                <a href="#">
                    <?= $login_forget_password_ar ?>
                </a>
                <input class="Sign-btn" type="submit" name="SginIn" value="<?= $login_signin_ar ?>">
            </form>
        </div>

        <!-- right side container -->
        <div class="toggle-container">
            <!-- toggle container -->
            <div class="toggle">
                <!-- Arabic -->
                <div class="toggle-panel toggle-left font-zain">
                    <h1 class="text-center text-3xl font-bold font-sans"><?= $login_welcome_back_ar ?></h1>
                    <p>
                        <?= $login_enter_info_ar ?>
                    </p>
                    <!-- hidden -->
                    <div class="" id="langSwitcherEn">
                        <button class=" btn-hidden btn font-inter"><?= $login_english_switcher ?></button>
                    </div>
                </div>
                <!-- English -->
                <div class="toggle-panel toggle-right">
                    <h1 class="text-center text-3xl font-bold font-sans"><?= $login_welcome_back_en ?></h1>
                    <p>
                        <?= $login_enter_info_en ?>
                    </p>
                    <!-- hidden -->
                    <div class="" id="langSwitcherAr">
                        <button class="btn-hidden btn font-zain"><?= $login_arabic_switcher ?></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>