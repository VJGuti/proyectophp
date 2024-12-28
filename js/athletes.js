// Funcionalidad para la gestión de atletas
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchAthlete');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            filterAthletes(this.value);
        });
    }
});

function filterAthletes(searchTerm) {
    // Implementar búsqueda de atletas
    console.log('Buscando:', searchTerm);
}

function showAddAthleteForm() {
    // Implementar mostrar formulario de nuevo atleta
    console.log('Mostrando formulario de nuevo atleta');
}