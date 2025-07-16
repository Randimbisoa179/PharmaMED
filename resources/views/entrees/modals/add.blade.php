<!-- MODAL POUR AJOUTER UNE ENTREE -->
<div class="modal fade" id="addEntreeModal" tabindex="-1" aria-labelledby="addEntreeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog centered" style="margin-top: 7%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEntreeModalLabel">Ajouter une Entrée</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEntreeForm" action="{{ route('entrees.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="numEntree">Numéro Entrée</label>
                        <input type="text" name="numEntree" id="numEntree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stockEntree">Quantité</label>
                        <input type="number" name="stockEntree" id="stockEntree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dateEntree">Date</label>
                        <input type="date" name="dateEntree" id="dateEntree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="numMedoc">Medicament</label>
                        <select name="numMedoc" id="numMedoc" class="form-select" required>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->numMedoc }}">{{ $produit->Design }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
