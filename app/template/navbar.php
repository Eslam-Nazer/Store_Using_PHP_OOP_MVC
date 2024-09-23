<!-- Start Navbar -->
<header class="navbar">
    <div class="head-container">
        <div class="main-heading">
            <i class="fa-solid fa-code"></i>
            <p class="store-name">My Store</p>
        </div>
        <div class="sections">
            <div class="section flex">
                <a href="/index" class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>">
                    <?= $text_dashboard ?>
                </a>
                <?php if (isset($text_header)) :
                ?>
                    <span class="ml-2">></span><span class="ml-2 <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_header ?></span>
                <?php
                endif;
                ?>
            </div>
            <nav>

                <div class="translation-btn">
                    <a href="/language" class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>">
                        <?= $this->session->lang == 'ar' ? 'عربي' : ucfirst($this->session->lang) ?>
                        <i class="fa-solid fa-language translate"></i>
                    </a>
                </div>

                <div class="notification-icon" id="notify">
                    <i class="fa-solid fa-bell"></i>
                    <span class="<?= $this->notification->seenChecker() == true ? "check" : null ?>" id="notifyDot"></span>
                </div>

                <?php if (isset($_POST['action']) == "checked" && $this->notification->seenChecker()) {
                    $this->notification->seen();
                } ?>

                <ul class="notification-menu">
                    <?php
                    foreach (($this->notification->getNotifications()) as $notification) {
                        echo "<li>" . $notification->Title . "</li>";
                    }
                    ?>
                </ul>

                <button class="user">
                    <?= $this->session->u->Username ?>
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <ul class="dropdown">
                    <li><a href="">Profile Setting</a></li>
                    <li><a href="">Change Password</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End Navbar -->