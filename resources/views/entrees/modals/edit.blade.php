<!-- MODAL POUR MODIFIER UNE ENTREE -->
<div class="modal fade" id="editEntreeModal" tabindex="-1" aria-labelledby="editEntreeModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="margin-top: 0%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEntreeModalLabel">Modifier l'Entrée</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--Formulaire pour modifier une entrée-->
                <form id="editEntreeForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editNumEntree">Numéro Entrée</label>
                        <input type="text" name="numEntree" id="editNumEntree" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editStockEntree">Quantité</label>
                        <input type="number" name="stockEntree" id="editStockEntree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDateEntree">Date</label>
                        <input type="date" name="dateEntree" id="editDateEntree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editNumMedoc">Medicament</label>
                        <select name="numMedoc" id="editNumMedoc" class="form-control" required>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->numMedoc }}" readonly>{{ $produit->Design }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" ><i class="fas fa-sync-alt"></i>  Mettre à jour</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-entree').forEach(button => {
        button.addEventListener('click', () => {
            const numEntree = button.getAttribute('data-numentree');
            const stockEntree = button.getAttribute('data-stockentree');
            const dataEntree = button.getAttribute('data-dateentree');
            const numMedoc = button.getAttribute('data-nummedoc'); 
            // const route = button.getAttribute('data-route');
            // const route = "{{ route('entrees.update', ':numEntree') }}" . replace(':numEntree', numEntree);
            // const entree = JSON.parse(button.getAttribute('data-entree'));

            //Remplir les champs de la modale
            document.getElementById('editNumEntree').value = numEntree;
            document.getElementById('editStockEntree').value = stockEntree;
            document.getElementById('editDateEntree').value = dateEntree;
            document.getElementById('editNumMedoc').value = numMedoc;

            // Mettre à jour l'action du formulaire
            // document.getElementById('editEntreeForm').action = `/entrees/${numEntree}/update`;
            document.getElementById('editEntreeForm').action = "{{ route('entrees.update', ':numEntree') }}" . replace(':numEntree', numEntree);
            // document.getElementById('editEntreeForm').action = route;
            //Réinitialiser les champs du formulaire
            // document.getElementById('editNumEntree').value = '';
            // document.getElementById('editStockEntree').value = '';
            // document.getElementById('editDateEntree').value = '';
            // document.getElementById('editNumProd').value = '';

            // //Réinitilaiser l'action du formulaire
            // document.getElementById('editEntreeForm').action = '';
        });
    });
});
</script>
