const mysql = require('mysql2/promise');

const database = mysql.createPool({
  host: '127.0.0.1',
  user: 'root',
  password: '',
  database: 'hotel',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});

module.exports = database;
