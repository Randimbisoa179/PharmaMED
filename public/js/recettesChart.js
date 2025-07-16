document.addEventListener('DOMContentLoaded', function () {

    //Récupérer les données de l'élément HTML
    const chartData = document.getElementById('chart-data');
    const labels = JSON.parse(chartData.dataset.labels);
    const recettes = JSON.parse(chartData.dataset.recettes);

    //Créer le graphique
    const ctx = document.getElementById('recettesChart').getContext('2d');
    const recettesChart = new Chart(ctx, {
        type: 'bar',
        data: {     
            labels: labels,
            datasets: [{
                label: 'Recettes par Mois',
                data: recettes ,
                backgroundColor: 'rgba(0, 166, 0, 0.3)',
                borderColor: 'rgba(0, 166, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            //Options d'animation
            animation: {
                duration: 2000, //Durée de l'animation (2sec)
                easing: 'linear' //Type d'animation (linéaire)
            }
        }
    });
});

