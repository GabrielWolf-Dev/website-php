$(function() {
    $('body').on('submit', 'form', function() {
        const form = $(this);
        const url = 'http://localhost/website-php/';

        $.ajax({
            url: url + 'ajax/form.php',
            method: 'POST',
            dataType: 'json',
            data: form.serialize()
        }).done(function(data) {
            if(data.success){
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