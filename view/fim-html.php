
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js" integrity="sha512-spa7aO6lppFC1ihpn7YMvtBsXLK7yJDWofj1DmktOmfn2S7/sEn8Bfn5uID+2gu0uSNk+GWcPPOkD0lhxSTCLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    //$(document).ready(function(){
    //    $("#sign_up_form").validate({
    //        rules:{
    //            nome:{
    //                required:true,
    //                minlength:3
    //                maxlength:30
    //            },
    //            sobrenome:{
    //                required:true,
    //                minlength:3
    //                maxlength:30
    //            }
    //        },
    //        messages:{
    //            nome:{
    //                required:"Você deve preencher o nome",
    //                minlength:"O nome deve ter mais que 3 caracteres"
    //            },
    //            sobrenome:{
    //                required:"Você deve preencher o sobrenome",
    //                minlength:"O sobrenome deve ter mais que 3 caracteres"
    //            }
    //        }
    //    });
    //});


    $("#cep").mask("##.###-###");
    //$("#rg").mask("9.999.999");
    //$('#data_nascimento').mask("00/00/0000", {placeholder: "__/__/____"});
    //$('#telefone').mask('(00) 00000-0000');
    $('#celular').mask('(00) 0000-00000');
    $('#preco_doacao').maskMoney();
    $("#rg").mask("99.999.999-9");

    //Validação dos 2 telefones
    var behavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
    },
    options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };

    $('#telefone').mask(behavior, options);


    $("#cep").blur(function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            $("#endereco").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#uf").val("...");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(data) {
                if (!("erro" in data)) {
                    $("#endereco").val(data.logradouro);
                    $("#bairro").val(data.bairro);
                    $("#uf").val(data.uf);
                    $("#cidade").val(data.localidade);
                    $("#numero").focus();
                } else {
                    alert("CEP não encontrado.");
                }
            });
        }
    });

    $("#cpf").keydown(function() {
        try {
            $("#cpf").unmask();
        } catch (e) {}

        var tamanho = $("#cpf").val().length;

        if (tamanho < 11) {
            $("#cpf").mask("999.999.999-99");
        } else if (tamanho > 11) {
            $("#cpf").mask("");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function() {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });

</script>


</div>
</body>
</html>