 <!DOCTYPE html>
 <html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>correspondant</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main_styles.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <!-- Styles -->
     

    </head>
 <body>
 
 

 


<form name="formulaire"     enctype="multipart/form-data">

  

  <div class="post_text">

   <div class="sous_container">

    <div class="ecris_hors_input" style="font-weight: bolder;"> choisir un correspondant </div>
<?php  foreach ($users as $key => $value) {

if($value['identifiant_speciale']!=$me){ ?>
  <div class="ecris_hors_input"><a href="http://127.0.0.1:8000?id=<?=$value['identifiant_speciale']; ?>"> {{ $value['pseudo']; }} </a></div> 
<?php } } ?>
    
 
 </div>
</div>




 





<div class="post_text">
  <div class="sous_container">








   <div class="positionement_boutton_mag">
     <button id="pri" type="submit" class="button_3">
      Enregistrer</button>
    </div>  
   










   </div>
 </div>
</form>
                            <script type="text/javascript" src="js/inscription.js">
                                         
                            </script>

                             
</div>


</body>
 </html>