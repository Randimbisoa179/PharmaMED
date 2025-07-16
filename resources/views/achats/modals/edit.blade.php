<!-- Modal pour Modifier un Achat -->
<div class="modal fade" id="editAchatModal" tabindex="-1" aria-labelledby="editAchatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAchatModalLabel">Modifier un Achat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour modifier un achat -->
                <form id="editAchatForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editNumAchat">Numéro Achat</label>
                        <input type="text" name="numAchat" id="editNumAchat" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editNumMedoc">Numéro Medicament</label>
                        <input type="text" name="numMedoc" id="editNumMedoc" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editNomClient">Nom Client</label>
                        <input type="text" name="nomClient" id="editNomClient" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editNbr">Quantité commandé</label>
                        <input type="number" name="nbr" id="editNbr" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDateAchat">Date Achat</label>
                        <input type="date" name="dateAchat" id="editDateAchat" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-sync-alt"></i> Mettre à jour</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Remplir la modale "Modifier un Achat"
document.querySelectorAll('.edit-achat').forEach(button => {
    button.addEventListener('click', () => {
        //Récupérer les données de l'achat
        const numAchat = button.getAttribute('data-numachat');
        const numMedoc = button.getAttribute('data-nummedoc');
        const nomClient = button.getAttribute('data-nomclient');
        const nbr = button.getAttribute('data-nbr');
        const dateAchat = button.getAttribute('data-dateachat');
        const route = button.getAttribute('data-route');

        //Remplir les champs du formulaire
        document.getElementById('editNumAchat').value = numAchat;
        document.getElementById('editNumMedoc').value = numMedoc;
        document.getElementById('editNomClient').value = nomClient;
        document.getElementById('editNbr').value = nbr;
        document.getElementById('editDateAchat').value = dateAchat;

        // Mettre à jour l'action du formulaire
        document.getElementById('editAchatForm').action = route;
    });
});
</script>
