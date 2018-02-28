 <!DOCTYPE html>
 <html>
 <head>
   <title>Atividade JB</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
  <div id="formulario">
    <form action="" id="formUpload" method="post" name="formulario" enctype="multipart/form-data">
      <label><span>Escolha o Arquivo</span></label>
      <input type='file' name='file[]' id="file" multiple>
      <input type="submit" id="btnEnviar" value="Enviar Arquivos" value="Enviar" />
    </form>
    <div class="porcentagem">
      <span class="valor"><p>0%</p></span>
    </div>
    <div class="mensagens"><p>Envie seu Arquivo</p></div>
  </div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-form.js"></script>
<script>
  $(document).ready(function(){
    $('.porcentagem').hide();
    $('#btnEnviar').click(function(){
      $("#formUpload").ajaxForm({
        uploadProgress: function(event, postion, total, percentComplete){
          var tam_file = total/100000;
          if (tam_file <= 50) {
            $(".porcentagem").show();
            $(".porcentagem span.valor").css({
              'width': percentComplete+"%"
            })
            $(".porcentagem span.valor p").html(percentComplete+"%"),
            $(".porcentagem span.valor").css({
              'background': "#00cc00"
            });
            $(".mensagens p").html("Enviado com sucesso");
          }else{
            $(".porcentagem").show();
            $(".porcentagem span.valor").css({
              'width': "100%"
            })
            $(".porcentagem span.valor p").html("0%"),
            $(".porcentagem span.valor").css({
              'background': "#cc0000"
            });
            $(".mensagens p").html("Nao pode ser enviado");
          }
        },
        dataType: "json",
        url: "processa.php",
        resetForm: true
      }).submit();
    })
  })
</script>
