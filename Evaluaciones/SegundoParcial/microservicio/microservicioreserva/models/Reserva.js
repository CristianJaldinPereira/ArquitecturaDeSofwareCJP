const mongoose = require('mongoose');

const reservaSchema = new mongoose.Schema({
  usuario_id: { type: String, required: true },
  fecha_reserva: { type: Date, default: Date.now },
  fecha_entrada: { type: Date, required: true },
  fecha_salida: { type: Date, required: true },
  estado_reserva: { type: String, default: 'pendiente' }, 
  total_a_pagar: { type: Number, required: true }
});

module.exports = mongoose.model('Reserva', reservaSchema);
