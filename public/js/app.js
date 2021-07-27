   let ip_adress = "127.0.0.1";
     let socket_port = "8080";
     let socket = io(ip_adress + ':' + socket_port);
     socket.on('connection');
     let form = document.formulaire;
     
     document.getElementById('bouton').addEventListener("click", function(e){
        e.preventDefault();
        let message = form.message.value;

         let donee = document.createElement("p");
    
    donee.className ="me"
    donee.textContent = message;
    
 document.getElementById("afficheur").appendChild(donee);
        
        socket.emit("sms", message)
        form.message.value = ""
     })
   socket.on("envoi", (msg)=>{
    let data = document.createElement("p");
    let conteneur = document.createElement("div");
    conteneur.className ="position_fixee_me"
    data.className ="expediteur"
    data.textContent = msg;
    conteneur.appendChild(data);
 document.getElementById("afficheur").appendChild(conteneur);
   });
     
