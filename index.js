'use strict';
const path = require('path');
const express = require('express');
const app = express();
const bodyParser = require('body-parser');

const serviceAppPort = 8080;
const mainPath = path.join(__dirname, '/baugusli_brain');

// support encoded bodies
app.use(bodyParser.json({ limit: '50mb' }));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(mainPath));

app.get('/', function(req, res) {
  res.sendFile(`${mainPath}/index.html`);
});

app.post('/send_email', function(req, res) {
  console.log(req.body);

  var api_key = '';
  var domain = 'mg.bryanaugusli.com';
  var mailgun = require('mailgun-js')({apiKey: api_key, domain: domain});
 	
  var data = {
    from: req.body.emailFrom,
    to: 'bryan_augusli@hotmail.com',
    subject: req.body.emailSubject,
    text: req.body.emailMessage
  };
 
  mailgun.messages().send(data, function (error, body) {
    console.log(body);
    console.log(error);
  });
});

// Error handling middleware
// 500
app.use(function(err, req, res, next) {
  console.error(err.stack);
  res.status(500).send('The application has encountered an unknown error.');
});

app.listen(serviceAppPort);
