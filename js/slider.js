$(function() {
   let currentSlide = 0;
   const maxSlide = $('.banner__bg-img').length - 1;

   initSlide();
   changeSlide();

   function initSlide() {
        $('.banner__bg-img').hide();
        $('.banner__bg-img').eq(0).show();

        for(let i = 0; i < maxSlide + 1; i++) {
            let bulletsDiv = $('.bullets').html(); // html() -- Por default pega todos os elementos filhos, no caso foi incrementado no código abaixo

            if(i === 0)
                bulletsDiv += '<span class="bullets__bullet bullet--active"></span>';
            else
                bulletsDiv += '<span class="bullets__bullet"></span>';

            $('.bullets').html(bulletsDiv);
        }
   }

   function changeSlide() {
       setInterval(() => {
           $('.banner__bg-img').eq(currentSlide).stop().fadeOut(2000); // O .stop() previne o conflito das animações, se caso a animação de fadeIn & fadeOut acontecer 2 vezes quando clica no bullet, parando uma das transções
            currentSlide++;
            
            if(currentSlide > maxSlide)
                currentSlide = 0;

            $('.banner__bg-img').eq(currentSlide).stop().fadeIn(2000);

            // Change Active Bullets:
            $('.bullets__bullet').removeClass('bullet--active');
            $('.bullets__bullet').eq(currentSlide).addClass('bullet--active');
       }, 3000);
   }

   /* 
    $('.bullets__bullet').click(function() { // Como colocamos antes os elementos, vai funcionar o listener de click
         alert('Funcionou!');
    });
   */
    // Mas vamos utilizar a maneira "mais correta", caso não tinha elementos inseridos:
    $('body').on('click', '.bullets__bullet', function() {
        let currentBullet = $(this); // Referência ao target

        $('.banner__bg-img').eq(currentSlide).stop().fadeOut();
        currentSlide = currentBullet.index(); // É o index da ordem dos bullets
        $('.banner__bg-img').eq(currentSlide).stop().fadeIn();

        $('.bullets__bullet').removeClass('bullet--active');
        currentBullet.addClass('bullet--active');
    });
});