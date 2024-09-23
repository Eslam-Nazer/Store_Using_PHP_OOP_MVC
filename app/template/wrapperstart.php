        <div class="main-container">
            <div class="content-container">

                <?php $messages = $this->messenger->getMessages();
                if (!empty($messages)) : foreach ($messages as $message) : ?>

                        <div class="message m<?= $message[1] ?>">
                            <p class=" mx-3"><?= $message[0] ?></p>
                        </div>

                <?php endforeach;
                endif; ?>