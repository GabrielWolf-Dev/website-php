<h1 class="contact-title">Página de contato</h1>

<main class="container contact">
<img class="contact__img" src="<?php echo INCLUDE_PATH ?>assets/imgs/contact.jpg" alt="Duas pessoas conversando" />

    <form method="POST">
        <input class="contact__input" placeholder="Nome" type="text" name="name" required />
        <input class="contact__input" placeholder="E-mail" type="email" name="email" required />
        <input class="contact__input" placeholder="Telefone" type="tel" name="phone" required />
        <textarea class="contact__textarea" placeholder="Sua Mensagem..." name="message" required></textarea>
        <input type="hidden" name="form-contact" />

        <button class="contact__btn" type="submit">Enviar</button>
    </form>
</main>