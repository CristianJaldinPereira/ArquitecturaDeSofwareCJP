const database = require('../db/database');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

const JWT_SECRET = 'unsecretoquesea';

const authenticateUser = async (email, password) => {
  const [rows] = await database.query('SELECT * FROM usuarios WHERE email = ?', [email]);
  if (rows.length === 0) return null;

  const user = rows[0];

  const validPassword = await bcrypt.compare(password, user.password);
  if (!validPassword) return null;


  const token = jwt.sign(
    { 
      id: user.id, 
      nombre: user.nombre, 
      email: user.email, 
      tipo_usuario: user.tipo_usuario 
    },
    JWT_SECRET,
    { expiresIn: '1h' }
  );

  return token;
};

module.exports = {
  authenticateUser,
};
