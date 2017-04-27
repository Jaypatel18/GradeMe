var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
//var io = require('socket.io')(http, {path: 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js'});

/*
app.get('/', function(req, res){
  res.send('<h1>Hello world</h1>');
}); hello world page
*/

app.get('/', function(req, res){
  res.sendFile(__dirname + '/sindex.html');
});
    
io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
  socket.on('chat message', function(msg){
	io.emit('chat message', msg);
    console.log('message: ' + msg);
  });
});
	
http.listen(3000, function(){
  console.log('listening on *:3000');
});