<!-- Modal pour Ajouter un Achat -->
<div class="modal fade" id="addAchatModal" tabindex="-1" aria-labelledby="addAchatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAchatModalLabel">Ajouter un Achat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour ajouter un achat -->
                <form id="addAchatForm" action="{{ route('achats.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="numAchat">Numéro Achat</label>
                        <input type="text" name="numAchat" id="numAchat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="numMedoc">Numéro Medicament</label>
                        <select name="numMedoc" id="numMedoc" class="form-select" required>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->numMedoc }}">{{ $produit->numMedoc }} ({{ $produit->Design }})</option>
                            @endforeach
                        </select>
                        

                        <!-- <input type="text" name="numProd" id="numProd" class="form-control" required> -->
                    </div>
                    <div class="form-group">
                        <label for="nomClient">Nom Client</label>
                        <input type="text" name="nomClient" id="nomClient" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nbr">Quantité commandé</label>
                        <input type="number" name="nbr" id="nbr" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dateAchat">Date Achat</label>
                        <input type="date" name="dateAchat" id="dateAchat" class="form-control" required>
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
