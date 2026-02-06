function testDB() {
    const btn = document.getElementById('test-btn');
    const resultDiv = document.getElementById('result');
    
    // Cambiar el botón a estado de carga
    const originalHTML = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Probando conexión...';
    btn.disabled = true;
    
    // Hacer una solicitud al script PHP
    fetch('php/test-db.php')
        .then(response => response.text())
        .then(data => {
            resultDiv.innerHTML = data;
            btn.innerHTML = originalHTML;
            btn.disabled = false;
        })
        .catch(error => {
            resultDiv.innerHTML = 'Error: ' + error;
            btn.innerHTML = originalHTML;
            btn.disabled = false;
        });
}

// Cambiar color de estado cada 5 segundos
setInterval(() => {
    const dots = document.querySelectorAll('.dot');
    dots.forEach(dot => {
        dot.style.backgroundColor = 
            dot.style.backgroundColor === 'rgb(76, 175, 80)' ? '#FF9800' : '#4CAF50';
    });
}, 5000);