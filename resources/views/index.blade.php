<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Essaie de chat en temps réel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main_styles.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <!-- Styles -->
        <style type="text/css">
            .expediteur{ 
                background-color: rgba(1,110,255,.5); 
           width: fit-content;
           position: relative;
           max-width: 60%;
           padding: 5px 5px 5px 5px; 
           border-radius: 10px 10px 0 10px ;          
            margin: 5px 0 5px 5px;
           font-family: 'segoe UI';
           text-transform: none;
           color: white;
            }
            .conteneur_exp{

            }
            .me{
                background-color: rgb(224, 218, 218);
           width: fit-content;
           max-width: 60%;
           position: relative;
           padding: 5px 5px 5px 5px;
           text-transform: none;
           margin-bottom: 4px;
           border-radius: 10px 10px 10px 0;
           left:1%;
            margin: 5px 0 5px 0;
           font-family: 'segoe UI';
           color: black;
            }
        </style>

    </head>
    <body class="antialiased">
 <div class="retour_c" >
 <i onclick="goBack()"  class="icon-chevron-left"></i>

    <div class="image_correspondant">

<img src="images/aab.jpg">
   </div>
    <span>  {{$correspondant;}}</span>
      <img src="images/Icon/menu_vertical_noir.png" class="icone_menu_chat">
 </div> 


   
     <div class="position_fixee_me" >
<div class="expediteur" id="message">
    <?php foreach ($donnees as $key => $value) {
        if($value->expediteur!=$_SESSION['identifiant']){ ?>
            <p><?=$value['contenu'];  ?></p>

      <?php  }
        
    }   ?>
            

                         </div>

                            </div>

                             <div class="me">    <?php foreach ($donnees as $key => $value) {
        if($value->expediteur==$_SESSION['identifiant']){ ?>
            <p><?=$value['contenu'];  ?></p>

      <?php  }
        
    }   ?>
                               
                         </div>
                         <div id="afficheur"></div>
      




 <div class="formpost_edition"> 
 <!--  <button id=""class="button_env "> <i class="icon-add" ></i></button>   -->
   <div class="formpost_edition_interieure"> 
  <div id=""class="button_en" > <span name="ff"  class="button_add_emoji button_add_emoji_position_1">&#128515</span><!-- &#128515 --></div>                    
            <form   id="" name="formulaire" class="fomulaire_message">                        
          <textarea class="design_form" name="message" placeholder="Ecrire un message" ></textarea>
              <!-- <input type="hidden" name="destinateur" value="" >
              <input type="hidden" name="expediteur" value="" > -->

      </form>
      <button id="bouton" class="button_envoyer"><i class="icon-chevron-right" ></i>envoyer</button> 
    </div> 
 
    
 </div> 
 <script>
  let mon_id = "<?=$_SESSION['identifiant']; ?>";
  let id_correspondant = "<?=$_GET['id']; ?>";
 </script>
 <script src="js/socket.io.min.js" integrity="sha384-toS6mmwu70G0fw54EGlWWeA4z3dyJ+dlXBtSURSKN4vyRFOcxd3Bzjj/AoOwY+Rg" crossorigin="anonymous"></script>
 <script src="js/app.js">
  
 </script>
    </body>
</html>
