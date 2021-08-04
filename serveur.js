const express = require("express");
const app = express();
const http = require('http');

const server = require("http").createServer(app);
const websocket = require("socket.io")(server, {
	cors : {origin : "*"}
});

websocket.on('connection', (socket)=>{
  console.log("connection établie");
   socket.on("sms", (message, identifiant, correspondant)=>{
   	console.log(correspondant);
   	//websocket.sockets.emit('envoi', message)

   socket.broadcast.emit('envoi', message, identifiant, correspondant);






let requette = http;
requette.get("http://127.0.0.1:8000/traitement?identifiant="+identifiant+"&correspondant="+correspondant+"&message="+message, (resp) => {
  let data = '';

  // A chunk of data has been received.
  resp.on('data', (chunk) => {
    data += chunk;
  });

  // The whole response has been received. Print out the result.
  resp.on('end', () => {
    console.log(this);
  });

}).on("error", (err) => {
  console.log("Error: " + err.message); });

 


 
  



   });

  socket.on('disconnect', (socket)=>{
    console.log("connection interompu");
  })
})

server.listen(8080, ()=>{
	console.log("le serveur est en marche");
});