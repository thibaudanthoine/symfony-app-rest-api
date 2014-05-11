requirejs.config({
    paths: {
        domReady: '../vendor/requirejs-domready/domReady',
        jquery: '../vendor/jquery/dist/jquery.min',
        bootstrap: '../vendor/bootstrap/dist/js/bootstrap.min',
        alertify: '../vendor/alertify/alertify.min',
        json2: '../vendor/json2/json2',
        underscore: '../vendor/underscore/underscore',
        backbone: '../vendor/backbone/backbone',
        marionette: '../vendor/backbone.marionette/lib/backbone.marionette.min',
        socketio: 'http://localhost:3000/socket.io/socket.io'
    },
    shim: {
        bootstrap: ['jquery'],
        alertify: ['jquery'],
        jquery : {
          exports : '$'
        },
        underscore : {
          exports : '_'
        },
        backbone : {
          deps : ['jquery', 'underscore'],
          exports : 'Backbone'
        },
        marionette : {
          deps : ['jquery', 'underscore', 'backbone'],
          exports : 'Marionette'
        }
    }
});