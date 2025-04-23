
document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault(); // Evita que se recargue la página

  const formData = new FormData(this);

  fetch('/php/modulos/login.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    if (data.includes('dashboard.php')) {
      window.location.href = '/php/vistas/inicio.php'; // Redirige si login fue exitoso
    } else {
      document.getElementById('respuesta').innerHTML = data; // Muestra error
    }
  })
  .catch(err => {
    document.getElementById('respuesta').innerHTML = "Error al conectar con el servidor.";
  });
});

