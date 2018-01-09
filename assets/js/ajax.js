$(document).ready(function () {

    var path = "http://localhost/clinicontrol/";

    $('#cep').blur(function () {
        $.ajax({
            url: 'http://cep.republicavirtual.com.br/web_cep.php?cep=' + $('#cep').val() + '&formato=json',
            datatype: 'json',
            success: function (data) {
                $('#logradouro').val(data.tipo_logradouro + ' ' + data.logradouro);
                $('#cidade').val(data.cidade);
                $('#estado').val(data.uf);
                $('#numero').focus();
            }
        });
    });

    $('#email').blur(function () {
        $.get(path + 'ajax/validaEmail', {email: $('#email').val()}, function (data) {
            if (data) {
                $('#msgEmail').html(data);
                $('#email').focus();
            } else {
                $('#msgEmail').html('');
            }
        });
    });

    $('#nomeUsuario').blur(function () {
        $.get(path + 'ajax/validaNomeUsuario', {nomeUsuario: $('#nomeUsuario').val()}, function (data) {
            if (data) {
                $('#msgNomeUsuario').html(data);
                $('#nomeUsuario').focus();
            } else {
                $('#msgNomeUsuario').html('');
            }
        });
    });

    $('#cpf').blur(function () {
        $.get(path + 'ajax/validaCpf', {cpf: $('#cpf').val()}, function (data) {
            if (data) {
                $('#msgCpf').html(data);
                $('#cpf').focus();
            } else {
                $('#msgCpf').html('');
            }
        });
    });

    $('#cnpj').blur(function () {
        $.get(path + 'ajax/validaCnpj', {cnpj: $('#cnpj').val()}, function (data) {
            if (data) {
                $('#msgCnpj').html(data);
                $('#cnpj').focus();
            } else {
                $('#msgCnpj').html('');
            }
        });
    });
    
    $('#cnpj').blur(function () {
        $.get(path + 'ajax/validaCnpj', {cnpj: $('#cnpj').val()}, function (data) {
            if (data) {
                $('#msgCnpj').html(data);
                $('#cnpj').focus();
            } else {
                $('#msgCnpj').html('');
            }
        });
    });

});