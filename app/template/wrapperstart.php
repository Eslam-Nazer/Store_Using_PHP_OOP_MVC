<div <?= $this->session->lang == 'en' ? 'dir="ltr"' : 'dir="rtl"' ?> class="p-2 w-4/5 ltr:float-end transition translate-x-0 duration-[0.6s] flex" id="content">
    <div class="p-1 mt-8 block ml-2 w-full text-lg <?= $_SESSION['lang'] == 'ar' ? 'font-zain' : 'font-inter' ?>">


        <?php $messages = $this->messenger->getMessages();
        if (!empty($messages)) : foreach ($messages as $message) : ?>

                <div class="message m<?= $message[1] ?>">
                    <p class=" mx-3"><?= $message[0] ?></p>
                </div>

        <?php endforeach;
        endif; ?>