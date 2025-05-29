const authService = require('../services/authService');

const login = async (req, res) => {
     console.log('Body recibido:', req.body);2
  const { email, password } = req.body;

  if (!email || !password) {
    return res.status(400).json({ message: 'Faltan credenciales' });
  }

  try {
    const token = await authService.authenticateUser(email, password);
    if (!token) {
      return res.status(401).json({ message: 'Email o contraseña incorrectos' });
    }
    res.json({ token });
  } catch (error) {
    console.error(error);
    res.status(500).json({ message: 'Error del servidor' });
  }
};

module.exports = {
  login,
};
