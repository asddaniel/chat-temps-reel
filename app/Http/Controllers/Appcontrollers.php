<?php 

namespace App\Http\Controllers;
use App\Models\Utilisateurs;
use App\Models\messages;

//session_start();
class Appcontrollers extends Controller
{

	public function vue(){
		if(isset($_SESSION['identifiant'])){
         $messages = messages::get()->where("expediteur", "=", $_SESSION['identifiant']);
         $messages1 = messages::all()->where("destinateur", $_SESSION['identifiant']);

         $donnees = array_merge($this->tri($messages), $this->tri($messages1));
         var_dump(array(array(array(0, 1, array()))));
        // var_dump($donnees);
        return view("index", ['donnees'=>$donnees], ['correspondant'=>$this->get_username($_GET['id'])]);
    }else{ return redirect(route("connexion"));}
	}
   private function tri($data){
      $donnees = array();
      foreach ($data as $key => $value) {
         if($value->expediteur==$_GET['id'] or $value->destinateur==$_GET['id']){
            $donnees[count($donnees)]= $value;
         }
      }
    return $donnees;
   }
   private function get_username($id){
      $nom="";
      $name =  Utilisateurs::get()->where("identifiant_speciale", "=", $id);
      foreach ($name as $key => $value) {
         $nom = $value->pseudo;
      }
      return $nom;
   }
	public function view_connection(){
		return view("vue_connection");
	}
	public function inscription(){
		return view("inscription");
	}
    public function liste_users(){
    	if(isset($_SESSION['identifiant'])){
       $users = new Utilisateurs();
    	 $users = $users->get();
    	 $me = $_SESSION['identifiant'];
    	// var_dump($users->get()[0]['pseudo']);
		return view("users", ["users"=>$users, "me"=>$me]);
    }else{ 
      var_dump($_SESSION);
      //return("courage");
      return redirect(route("connexion"));
 }
    	 
	}

	public function traitement(){
        $users = new Utilisateurs();
        if(isset($_GET['pseudo'])){
       $pseudo = $_GET['pseudo'];
       $pass = password_hash($_GET['pseudo'], PASSWORD_DEFAULT);
       $users->password = $pass;
       $users->pseudo = $pseudo;
       $identifiant =  str_shuffle("abcdefghijklmnopqrstuvwxyz");
       $users->identifiant_speciale = $identifiant;
       $users->save();
       $_SESSION['identifiant'] = $identifiant;
       $_SESSION['identifiant_number'] = $identifiant;
		return var_dump($_GET); //("bonjour");
	}else if(isset($_GET['user'])){
  $pseudo = $_GET['user'];
       //$pass = password_hash($_GET['pseudo'], PASSWORD_DEFAULT);
     //  $users->password = $pass;
      // $users->pseudo = $pseudo;
    $data = Utilisateurs::where('pseudo', $pseudo)->get();
    if(!empty($data)){
      //var_dump($data);
       $_SESSION['identifiant'] = $data[0]->identifiant_speciale;
      $_SESSION['identifiant_number'] = $data[0]->id; 
   }

	}else{
		$table_messages = new messages();
		$message = $_GET['message'];
		$expediteur = $_GET['identifiant'];
		$destinateur = $_GET['correspondant'];

//insertion dans la base de données
       $table_messages->destinateur = $destinateur;
       $table_messages->expediteur = $expediteur;
       $table_messages->contenu = $message;
     
       $table_messages->save();
		//$message = $_GET['message'];

	} }
}

?>