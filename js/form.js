$(function() {
    const domains = ['gmail.com', 'uol.com.br', 'outlook.com'];
    const secondLevelDomains = ['hotmail, outlook'];
    const topLevelDomains = ["com", "net", "org", "br"];
    const errorDivMsg = $('.msg-error')[0];

    // Mail Check
    $('#email').on('blur', function() {
        $(this).mailcheck({
          domains: domains,                      
          secondLevelDomains: secondLevelDomains,
          topLevelDomains: topLevelDomains,      
          suggested: function(element, suggestion) {
            errorDivMsg.style.display = 'inline-block';
            errorDivMsg.textContent = 'Você quis dizer: ' + suggestion.full + ' ?';
          },
          empty: function() {
            errorDivMsg.style.display = 'none';
          }
        });
    });

    // Mask Phone:
    if(window.location.pathname === '/website-php/contato')
        $("#phone").mask("(99) 99999-9999");

    // AJAX:
    $('body').on('submit', 'form', function() {
        const form = $(this);
        const url = 'http://localhost/website-php/';

        $.ajax({
            beforeSend: () => {
                $('.spinner').fadeIn();
            },
            url: url + 'sources/ajax/form.php',
            method: 'POST',
            dataType: 'json',
            data: form.serialize()
        }).done((data) => {
            $('.spinner').fadeOut();

            if(data.success) {
                const msg = 'Requisição realizada com sucesso!';
                console.log(msg);
                alert(msg);
            } else if (data.error) {
                const msg = 'Ouve algum erro na requisição';
                console.log(msg);
                alert(msg);
            }
        });

        return false;
    });
});