const Reserva = require('../models/Reserva');

exports.getAll = async (req, res) => {
  try {
    const reservas = await Reserva.find();
    res.json(reservas);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

exports.getById = async (req, res) => {
  try {
    const reserva = await Reserva.findById(req.params.id);
    if (!reserva) return res.status(404).json({ message: 'Reserva no encontrada' });
    res.json(reserva);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

exports.create = async (req, res) => {
    console.log('req.body:', req.body);
    
  try {
    const { usuario_id, fecha_entrada, fecha_salida, total_a_pagar, estado_reserva } = req.body;

    if (!usuario_id || !fecha_entrada || !fecha_salida || total_a_pagar === undefined) {
      return res.status(400).json({ message: 'Faltan campos obligatorios' });
    }

    const reserva = new Reserva({
      usuario_id,
      fecha_entrada,
      fecha_salida,
      total_a_pagar,
      estado_reserva: estado_reserva || 'pendiente',
    });

    await reserva.save();

    res.status(201).json(reserva);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

exports.update = async (req, res) => {
  try {
    const reserva = await Reserva.findByIdAndUpdate(req.params.id, req.body, { new: true, runValidators: true });
    if (!reserva) return res.status(404).json({ message: 'Reserva no encontrada' });
    res.json(reserva);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

exports.remove = async (req, res) => {
  try {
    const reserva = await Reserva.findByIdAndDelete(req.params.id);
    if (!reserva) return res.status(404).json({ message: 'Reserva no encontrada' });
    res.json({ message: 'Reserva eliminada' });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};
