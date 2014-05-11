var socket = require('socket.io');
var express = require('express');
var http = require('http');

var app = express();
var server = http.createServer(app);
var io = socket.listen(server);

io.sockets.on('connection', function(client) {
	client.on('message', function(data) {
		io.sockets.emit('message', { name: data.name, message: data.message });
	});
});

server.listen(3000);