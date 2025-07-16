<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet achat ?
            </div>
            <div class="modal-footer">
                <!-- Formulaire de suppression -->
                <form id="deleteForm" action="" method="POST" style="display:inline;">
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
// Remplir la modale de suppression
document.querySelectorAll('.delete-achat').forEach(button => {
    button.addEventListener('click', () => {
        const route = button.getAttribute('data-route');
        document.getElementById('deleteForm').action = route;
    });
});
</script>
