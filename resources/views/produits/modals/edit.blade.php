<!-- Modal pour Modifier un Produit -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -3%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Modifier un Medicament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour modifier un produit -->
                <form id="editProductForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editNumMedoc">Numéro </label>
                        <input type="text" name="numMedoc" id="editNumMedoc" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editDesign">Designation</label>
                        <input type="text" name="Design" id="editDesign" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editprix_unitaire">Prix unitaire</label>
                        <input type="number" name="prix_unitaire" id="editprix_unitaire" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editStock">Stock</label>
                        <input type="number" name="stock" id="editStock" class="form-control" readonly>
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
        // Remplir la modale "Modifier un Produit"
        document.querySelectorAll('.edit-product').forEach(button => {
        button.addEventListener('click', () => {
            const numMedoc = button.getAttribute('data-nummedoc');
            const design = button.getAttribute('data-design');
            const prix_unitaire = button.getAttribute('data-prix_unitaire')
            const stock = button.getAttribute('data-stock');
            const route = button.getAttribute('data-route');


            document.getElementById('editNumMedoc').value = numMedoc;
            document.getElementById('editDesign').value = design;
            document.getElementById('editprix_unitaire').value = prix_unitaire;
            document.getElementById('editStock').value = stock;

            // Mettre à jour l'action du formulaire
            document.getElementById('editProductForm').action = route;
        });
    });

</script>