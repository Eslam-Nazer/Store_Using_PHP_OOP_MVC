<!-- Start Sidebar -->
<div class="sidebar" id="sidebar-menu">
    <div class="user" id="sideBtn">
        <img class="user-img" src="/img/user-image.jpg" alt="user image" />
        <div class="info">
            <p class="bold">
                <?= $this->session->u->profile->FirstName ?> <?= $this->session->u->profile->LastName ?>
            </p>
            <p>
                <?= $this->session->lang == 'ar' ? $this->session->u->GroupNameAr : $this->session->u->GroupName ?>
            </p>
        </div>
        <i class="fa-solid fa-left-right"></i>
    </div>
    <ul>
        <li>
            <a href="/index">
                <i class="fa-solid fa-border-all"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_general_statistics ?></span>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_general_statistics ?></span>
        </li>

        <li class="menu" id="Transactions-btn">
            <a class="submenu-btn">
                <i class="fa-solid fa-money-bill-transfer"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_transactions ?></span>
                <i class="fa-solid fa-caret-down"></i>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_transactions ?></span>
        </li>
        <ul class="submenu" id="Transactions-menu">
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/purchasesinvoices/default"><?= $text_purchases ?></a></li>
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="#"><?= $text_sales ?></a></li>
        </ul>

        <li class="menu" id="Expenses-btn">
            <a class="submenu-btn">
                <i class="fa-solid fa-money-bills"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_expenses ?></span>
                <i class="fa-solid fa-caret-down"></i>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_expenses ?></span>
        </li>
        <ul class="submenu" id="Expenses-menu">
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/typeofexpenses"><?= $text_type_of_expenses ?></a></li>
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/dailyexpenses"><?= $text_daily_expenses ?></a></li>
        </ul>

        <li class="menu" id="Store-btn">
            <a class="submenu-btn">
                <i class="fa-solid fa-shop"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_store ?></span>
                <i class="fa-solid fa-caret-down"></i>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_store ?></span>
        </li>
        <ul class="submenu" id="Store-menu">
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/productscategories"><?= $text_products_categories ?></a></li>
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/productlist"><?= $text_products ?></a></li>
        </ul>

        <li>
            <a href="/clients/default">
                <i class="fa-solid fa-person"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_clients ?></span>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_clients ?></span>
        </li>
        <li>
            <a href="/suppliers/default">
                <i class="fa-solid fa-boxes-stacked"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_suppliers ?></span>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_suppliers ?></span>
        </li>

        <li class="menu" id="Users-btn">
            <a class="submenu-btn">
                <i class="fa-solid fa-users"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_users ?></span>
                <i class="fa-solid fa-caret-down"></i>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_users ?></span>
        </li>
        <ul class="submenu" id="Users-menu">
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/users"><?= $text_list_of_users ?></a></li>
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/usersgroups"><?= $text_users_groups ?></a></li>
            <li><a class="<?= $this->session->lang == "ar" ? "font-zain" : null ?>" href="/privileges"><?= $text_privileges ?></a></li>
        </ul>

        <li>
            <a href="#">
                <i class="fa-solid fa-file-invoice"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_reports ?></span>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_reports ?></span>
        </li>
        <li>
            <a href="#">
                <i class="fa-regular fa-bell"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_notifications ?></span>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_notifications ?></span>
        </li>
        <li>
            <a href="/auth/logout">
                <i class="fa-solid fa-arrow-right-from-bracket rotate-180"></i>
                <span class="nav-item <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_logout ?></span>
            </a>
            <span class="tooltip <?= $this->session->lang == "ar" ? "font-zain" : null ?>"><?= $text_logout ?></span>
        </li>
    </ul>
</div>
<!-- End Sidebar -->
<!-- ======================================= -->