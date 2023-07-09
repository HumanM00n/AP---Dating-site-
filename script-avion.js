document.addEventListener('DOMContentLoaded', function() {
    var avion = document.getElementById('avion');
    var containerWidth = avion.parentNode.offsetWidth;
    var containerHeight = avion.parentNode.offsetHeight;
    
    // Déplacer l'avion en diagonale
    function moveAvion() {
        avion.style.transform = 'translate(' + containerWidth + 'px, -' + containerHeight + 'px)';
    }
    
    // Démarrer le mouvement de l'avion
    moveAvion();
    
    // Réinitialiser la position de l'avion une fois arrivé
    avion.addEventListener('transitionend', function() {
        avion.style.transform = 'translate(0%, 100%)';
        moveAvion();
    });
});

