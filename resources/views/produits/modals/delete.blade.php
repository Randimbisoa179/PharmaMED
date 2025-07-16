<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -3%">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce medicament ?
            </div>
            <div class="modal-footer">
                <!-- Formulaire de suppression -->
                <form id="deleteForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> Oui, supprimer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>

            </div>
        </div>
    </div>
</div>


<script>
document.querySelectorAll('.delete-product').forEach(button => {
    button.addEventListener('click', () => {
        // Récupérer l'URL de suppression
        const route = button.getAttribute('data-route');

        // Mettre à jour l'attribut `action` du formulaire de suppression
        document.getElementById('deleteForm').action = route;
    });
});

</script>