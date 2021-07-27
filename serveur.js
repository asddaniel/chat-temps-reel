const express = require("express");
const app = express();

const server = require("http").createServer(app);
const websocket = require("socket.io")(server, {
	cors : {origin : "*"}
});

websocket.on('connection', (socket)=>{
  console.log("connection établie");
   socket.on("sms", (message)=>{
   	console.log(message);
   	//websocket.sockets.emit('envoi', message)
   	socket.broadcast.emit('envoi', message);
   });

  socket.on('disconnect', (socket)=>{
    console.log("connection interompu");
  })
})

server.listen(8080, ()=>{
	console.log("le serveur est en marche");
});