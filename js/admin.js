// Funcionalidad para el panel administrativo
document.addEventListener('DOMContentLoaded', function() {
    // Menú móvil
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
});

// Funciones para el formulario de competencias
function showCreateCompetitionForm() {
    const form = document.getElementById('competitionForm');
    if (form) {
        form.classList.remove('hidden');
    }
}

function hideCreateCompetitionForm() {
    const form = document.getElementById('competitionForm');
    if (form) {
        form.classList.add('hidden');
    }
}

// Función para cargar la tabla de competencias
function loadCompetitions() {
    // Esta función se implementará con PHP para cargar datos desde la base de datos
    console.log('Cargando competencias...');
}