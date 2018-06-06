'use strict';
const path = require('path');
const express = require('express');
const app = express();

const serviceAppPort = 80;
const mainPath = path.join(__dirname, '/baugusli_brain');

app.get('/', function(req, res) {
  res.sendFile(`${mainPath}/index.html`);
});

app.post('/send_email', function(req, res) {
  console.log(req);
});

// Error handling middleware
// 500
app.use(function(err, req, res, next) {
  console.error(err.stack);
  res.status(500).send('The application has encountered an unknown error.');
});

app.use(express.static(mainPath));
app.listen(serviceAppPort);
