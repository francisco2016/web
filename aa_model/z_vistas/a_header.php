
<?php  
    session_start(); 
    $_SESSION['nameTabla'] = "aamodel";
    $_SESSION['nameVentana'] = "aa_model";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../c-img/yama.png" type="../image/x-icon">

        <link rel="stylesheet" href="css/a_header.css">  
        <link rel="stylesheet" href="../zz_phpBBDD/b_cssFormu.css"> 
        <link rel="stylesheet" href="css/b_main.css">  
        <link rel="stylesheet" href="css/c_footer.css">

        <title> g-modelos/aa_model </title>
 
        <?php 
        
            include_once("../zz_phpBBDD/a_funciones_bbdd.php");
            include_once("../zz_phpBBDD/c_selectFormul.php");
           
        ?>

        <style> 
            <?php  //include_once("../zz_phpBBDD/c_selectFormul.php"); ?>

            body{
                background-color: <?php echo " ".$b_body;  ?> ;
            }
            .granSize{
                font-family: <?php echo " ".$f_fuenteTitulos;  ?> ;
                font-size: <?php echo " ".$t_tamanoTitulos;   ?> ;
            }
            .medianoSize{
                font-family: <?php echo " ".$f_fuentesubTítulos;  ?> ;
                font-size: <?php echo " ".$t_tamanosubTítulos;  ?> ;
            }
            .pequenoSize{
                font-family: <?php echo " ".$f_fuenteTexto;  ?> ;
                font-size: <?php echo " ".$t_tamanoTexto;  ?> ;
            }        

            
        </style>


        <script src="../../e-javaScript/javaScrip/jquery-1.6.3.min.js" > </script>
        <script>
            $(function(){
                $("body").hide( ).fadeIn(3000); //para que aparecca el body lentamente.
            });
        </script>
        
    </head>
    <body>

        <?php             
            $fuentes = fuentesArray();
            $tamanoFuente = fuentesSize();
            $colores = colores(); 
            
           // formulario para cambiar estilos css dinámicamente.
           include_once("../zz_phpBBDD/b_formu.php");
        ?>

        <!-- __________________________________ formulario para estilos dinámicos-->

        <div id="generalDiv">

            <section id="cabeceraSec">

                <article id="altoArt">
                    <div>
                        <img src="img/logo.png" alt="img/logo.png">
                    </div>
                    <div id="enlacesDiv">
                        <a  class="medianoSize" href="#">Productos</a>
                        <a class="medianoSize" href="#">Precio</a>
                        <a class="medianoSize" href="#">Contacto</a>
                    </div>
                </article>

                <article id="medioArt">
                    <h2 class="granSize"> 
                        LOREM IPSUM DOLOR SIT, QUAM NULLA, MOLLITIA FUGIT CORPORIS RATIONE RATIONE
                    </h2>
                    <h3 class="medianoSize"> Duis aute irure dolor in reprehedderit</h3>
                </article>

                <article id="bajoArt">
                    <button class="butt"  type="button" class="btn ">Caracteristicas</button>
                    <button class="butt"  type="button" class="btn ">Comprar ahora</button>
                </article>
            </section>

        
        