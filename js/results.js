// Funcionalidad para la gestión de resultados
document.addEventListener('DOMContentLoaded', function() {
    const competitionSelect = document.getElementById('competitionSelect');
    if (competitionSelect) {
        competitionSelect.addEventListener('change', function() {
            loadResults(this.value);
        });
    }
});

function loadResults(competitionId) {
    // Implementar carga de resultados por competencia
    console.log('Cargando resultados para competencia:', competitionId);
}

function updateResult(resultId, time) {
    // Implementar actualización de tiempo
    console.log('Actualizando resultado:', resultId, time);
}