<!-- Modal pour Voir un Achat -->
<div class="modal fade" id="viewAchatModal" tabindex="-1" aria-labelledby="viewAchatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAchatModalLabel">Détails de l'Achat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu dynamique pour afficher les détails de l'achat -->
                <p><strong>Numéro Achat :</strong> <span id="viewNumAchat"></span></p>
                <p><strong>Numéro Medicament :</strong> <span id="viewNumProd"></span></p>
                <p><strong>Nom Client :</strong> <span id="viewNomClient"></span></p>
                <p><strong>Quantité commandé :</strong> <span id="viewNbrLitre"></span></p>
                <p><strong>Date Achat :</strong> <span id="viewDateAchat"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-check"></i> OK</button>
            </div>
        </div>
    </div>
</div>

<script>
// Remplir la modale "Voir un Achat"
document.querySelectorAll('.view-achat').forEach(button => {
    button.addEventListener('click', () => {
        const numAchat = button.getAttribute('data-numachat');
        const numMedoc = button.getAttribute('data-nummedoc');
        const nomClient = button.getAttribute('data-nomclient');
        const nbr = button.getAttribute('data-nbr');
        const dateAchat = button.getAttribute('data-dateachat');

        document.getElementById('viewNumAchat').textContent = numAchat;
        document.getElementById('viewNumProd').textContent = numMedoc;
        document.getElementById('viewNomClient').textContent = nomClient;
        document.getElementById('viewNbrLitre').textContent = nbr;
        document.getElementById('viewDateAchat').textContent = dateAchat;
    });
});
</script>
