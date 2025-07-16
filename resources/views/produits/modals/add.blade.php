<!-- Modal pour Ajouter un Produit -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog centered" style="margin-top: 7%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Ajouter un medicament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour ajouter un produit -->
                <form id="addProductForm" action="{{ route('produits.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="numMedoc">Numéro </label>
                        <input type="text" name="numMedoc" id="numMedoc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Design">Designation</label>
                        <input type="text" name="Design" id="Design" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prix_unitaire">Prix unitaire</label>
                        <input type="number" name="prix_unitaire" id="prix_unitaire" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="0" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Enregistrer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
