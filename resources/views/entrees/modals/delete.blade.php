<!-- MODAL POUR SUPPRIMER UNE ENTREE -->
<div class="modal fade" id="deleteEntreeModal" tabindex="-1" aria-labelledby="deleteEntreeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -3%">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEntreeModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette entrée ?
            </div>
            <div class="modal-footer">
                <form id="deleteEntreeForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" ><i class="fas fa-check"></i> Oui, supprimer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.delete-entree').forEach(button => {
        button.addEventListener('click', () => {
            const numEntree = button.getAttribute('data-numentree');
            // const route = button.getAttribute('data-route');
            // const route = "{{ route('entrees.destroy', ':numEntree') }}" . replace(':numEntree', numEntree);

            // Mettre à jour l'action du formulaire
            // document.getElementById('deleteEntreeForm').action = `/entrees/${numEntree}/delete`;
            document.getElementById('deleteEntreeForm').action = "{{ route('entrees.destroy', ':numEntree') }}" . replace(':numEntree', numEntree);

        });
    });
</script>
