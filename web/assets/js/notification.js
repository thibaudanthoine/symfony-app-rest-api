define(['jquery', 'alertify', 'socketio', 'domReady!'], function($, alertify, io, doc) {

	console.log('notification.js called');

	var socket = io.connect('http://localhost:3000');

    $('.click-me-button').on('click', function() {
        socket.emit('message', { name: 'Bobby', message: ' has clicked on the button !' });
    });

    socket.on( 'message', function(data) {
        alertify.success('<strong>' + data.name + '</strong>' + data.message);
    });

});