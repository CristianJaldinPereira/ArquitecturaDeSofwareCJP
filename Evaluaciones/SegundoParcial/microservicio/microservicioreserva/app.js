const express = require('express');
const mongoose = require('mongoose');
const reservaRoutes = require('./routes/reservaRoutes');

const app = express();
app.use(express.json());


const PORT = 3003;
const MONGO_URI = 'mongodb://127.0.0.1:27017/reservasDB';


mongoose.connect(MONGO_URI)
  .then(() => console.log('MongoDB conectado'))
  .catch(err => console.error('Error al conectar MongoDB:', err));


app.use('/reservas', reservaRoutes);


app.listen(PORT, () => {
  console.log(`microservicioreserva ejecutándose en http://localhost:${PORT}`);
});
