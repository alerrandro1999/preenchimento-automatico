<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <input id="cep" type="text" placeholder="CEP">
    <input id="rua" type="text" placeholder="RUA">
    <input id="numero" type="text" placeholder="Numero">
    <input id="bairro" type="text" placeholder="bairro">
    <input id="cidade" type="text" placeholder="cidade">
    <input id="estado" type="text" placeholder="estado">
</form>


<script>
    function buscaCep () {
        let cep = document.getElementById('cep').value;
        if (cep !== "") {
            let url = "https://brasilapi.com.br/api/cep/v1/" + cep

            let req = new XMLHttpRequest();
            req.open("GET", url)
            req.send();

            req.onload = function () {
                if (req.status === 200) {
                    let endereco = JSON.parse(req.response)
                    document.getElementById('cidade').value = endereco.city
                    document.getElementById('estado').value = endereco.state

                }else if(req.status === 404){
                    alert("CEP invalido")
                }
                else{
                    alert('Erro ao fazer a Requisição')
                }
            }
        }
    }

    window.onload = function(){
        let txtcep = document.getElementById('cep')
        txtcep.addEventListener("blur", buscaCep)
    }
</script>
    

</body>
</html>