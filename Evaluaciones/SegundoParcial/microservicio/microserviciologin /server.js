const app = require('./src/app');

const PORT = 3000;

app.listen(PORT, () => {
  console.log(`Microservicio login escuchando en puerto ${PORT}`);
});
