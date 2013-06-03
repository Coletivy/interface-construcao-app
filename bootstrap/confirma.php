<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Coletivy App">  
<meta name="author" content="Coletivy">

 <!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" type="text/css">

<title> Coletivy Photos - Confirmação </title>

<style type = "text/css">

body {
  background-color: #E7EBF2;
  margin-top: 30px;
}

#header_footer {
	background-color: #93CEDE; /* Old browsers */
	background-image: -moz-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%); /* FF3.6+ */
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(147,206,222,1)), color-stop(41%,rgba(117,189,209,1)), color-stop(100%,rgba(73,165,191,1))); /* Chrome,Safari4+ */
	background-image: -webkit-linear-gradient(top, rgba(147,206,222,1) 0%,rgba(117,189,209,1) 41%,rgba(73,165,191,1) 100%); /* Chrome10+,Safari5.1+ */
	background-image: -o-linear-gradient(top, rgba(147,206,222,1) 0%,rgba(117,189,209,1) 41%,rgba(73,165,191,1) 100%); /* Opera 11.10+ */
	background-image: -ms-linear-gradient(top, rgba(147,206,222,1) 0%,rgba(117,189,209,1) 41%,rgba(73,165,191,1) 100%); /* IE10+ */
	background-image: linear-gradient(to bottom, rgba(147,206,222,1) 0%,rgba(117,189,209,1) 41%,rgba(73,165,191,1) 100%); /* W3C */
}

#textoMenu{
  margin-top: 10px;
}

#spanBoxBranco {
  margin-left: auto;
  margin-right: auto;
  margin-top: 70px;
  float:none;
  background-color: #fff;
/*  min-height: 800px;*/
  -webkit-border-radius: 6px 6px 6px 6px;
  -moz-border-radius: 6px 6px 6px 6px;
  border-radius: 6px 6px 6px 6px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
  box-shadow: 0 1px 2px rgba(0,0,0,.15);
}

#boxImg {
  margin: 30px auto;
  float:none;
  height: 315px;
  background-color: #E7EBF2;
  -webkit-border-radius: 6px 6px 6px 6px;
  -moz-border-radius: 6px 6px 6px 6px;
  border-radius: 6px 6px 6px 6px;
}

#botoes{
  margin-top: 10px;
  margin-bottom: 30px;
  margin-left: auto;
  margin-right: auto;
  float: none;
}

@-moz-document url-prefix() {
    #botoes {
        margin-top: 30px;
        margin-bottom: 30px;
        margin-left: auto;
        margin-right: auto;
        float: none;
    }
}

#botaoPublicar{
  float: right;
}

#botaoVoltar{
  margin-right: 10px;
  float: right;
}

#pTitulo{
color: #1DA5B3;
font-size: 25px;
margin-bottom: 30px;
font-weight: bold;
}

#divEncerramento{
float: right;
}

#pDescricao{
font-size: 16px;
font-family: Calibri, "Helvetica Neue", Helvetica, Arial, sans-serif;
margin-bottom: 30px;
}

#pPremiacao{
	color: #444;
	font-weight: bold;
	margin-bottom: 30px;

}

#textoEncerramentoTitulo{
	color: #186486;
	font-size: 25px;
	font-weight: bold;
	float: right;
}

#textoEncerramentoNum{
	color: #1DA5B3;
	font-size: 50px;
	font-weight: bold;
}

#textoEncerramentoTempo{
	color: #186486;
	font-weight: bold;
}

#textoEncerramentoParticipar{
	color: #186486;
	font-weight: bold;
	float: right;
	font-size: 20px;
	margin-top: 2px;
}

#textoEncerramentoFinaliza{
	color: #186486;
	float: right;
	font-size: 11px;
}

#textoEncerramentoLinha{
margin-top: 20px;
margin-bottom: 2px;
float: right;
}

</style>

</head>

<body>

	<?php
		//gather the variables
		$titulo = $_REQUEST["titulo"];
		$descricao = $_REQUEST["descricao"];
		$premiacao = $_REQUEST["premiacao"];
    $data = $_REQUEST["data"];

    function diasRestantes(){
      global $data;
      $dataArray = array();
      $dataArray = explode("/", $data);
      
      date_default_timezone_set("America/Sao_Paulo");

      $hoje = date("Y")."-".date("m")."-".date("d");
      $fim = $dataArray[2]."-".$dataArray[1]."-".$dataArray[0];

      $hojeTime = strtotime($hoje);
      $encerramentoTime = strtotime($fim);
      $datediff = abs($hojeTime - $encerramentoTime);
      return floor($datediff/(60*60*24));
    }    

	?>

<div class="container">

  <div id="header_footer" class="navbar navbar-fixed-top"> <!-- HEADER -->
    <div class="navbar-inner" id="header_footer">
      <div class="container">
        <a class="brand pull-left" href="#"><img src="logo_header_app.png" alt = "Coletivy Logo"></a>
        <div class="nav-collapse">
        <ul class="nav pull-right" id = "textoMenu">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-black"></i> Olá Felipe Mesquita <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Perfil</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.nav-collapse -->
      </div>
    </div>
  </div>

  <div class="row-fluid"> <!-- ROW BOX BRANCO -->
  	<div class="span10" id="spanBoxBranco">

  		 <div class="row-fluid"> <!-- BOX IMG CAPA -->
        <div class="span10" id="boxImg">
        </div>
      </div>

      <div class="row-fluid"> <!-- ROW DO CONTEUDO -->
        <div class="span6 offset1">
        	<p id = "pTitulo"> 
            <?php 
              print $titulo; 
            ?>  
          </p>

        	<p id = "pDescricao"> 
        		<?php 
              print nl2br($descricao); 
            ?> 
					</p>

        	<p id = "pPremiacao"> 
            <?php 
              print nl2br($premiacao); 
            ?> 
          </p>

        </div>

        <div class="span4">
        	<div id = "divEncerramento"> 
        		<span id = "textoEncerramentoTitulo"> Você tem mais: </span> <br>
        		<div id = "textoEncerramentoLinha"> 
              <span id = "textoEncerramentoNum"> 
                <?php 
                  if (diasRestantes() > 0) 
                    print diasRestantes();
                  else
                ?> 
              </span> 
              <span id = "textoEncerramentoTempo"> 
                <?php 
                  if (diasRestantes() == 1) 
                    print "dia e"; 
                  else if (diasRestantes() > 1)   
                    print "dias e";
                  else
                ?> 
              </span>  
              <span id = "textoEncerramentoNum"> 
                <?php
                  print abs(23 - date("H")); 
                ?>                
              </span> 
              <span id = "textoEncerramentoTempo">
                <?php
                  if (abs(23 - date("H")) >= 1)
                    print "horas";
                  else
                    print "hora";
                ?>
              </span> 
            </div> <br>
						<span id = "textoEncerramentoParticipar"> 
              para participar 
            </span> <br>
						<span id = "textoEncerramentoFinaliza"> 
              Finaliza em: 
              <?php 
                print $data; 
              ?>
            </span>
					</div>
        </div>
      </div>
		</div>
	</div>

	<div class="row-fluid">  <!-- ROW DOS BOTOES -->
  	<div class="span10" id = "botoes"> 
  		<input type="submit" class="btn btn-success" value="Publicar" id = "botaoPublicar"/>
   		<a href="javascript:history.back()" class="btn btn-info" id = "botaoVoltar">Voltar</a>
  	</div>
  </div>



</div>

<!-- Le javascript  
================================================== -->  
<!-- Placed at the end of the document so the pages load faster -->  
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>