<h2>Inscription courseur</h2>

<form method="post" >
Club de voile : <br>
    <input type="hidden" name="new_courseur" value="true"/>
<input name="club" /><br>

Classe d'embarcation : <br>
<select name="embarcation">
    <option value="quillard">Quillard</option>
    <option value="420">Dériveur 420</option>
    <option value="F18">F18</option>
    <option value="optimiste">Optimiste</option>
</select><br>

Numero de voile : <br>
<input name="numVoile" /> <br>

Provenance : <br>
<textarea name="provenance"></textarea><br>

Équipage : <br>

Role:
<select name="equipier_1_role"  type="role" >
    <option value="capitaine">Capitaine</option>
    <option value="barreur">barreur</option>
    <option value="equipier">équipier</option>
    <option value="bow_men">bow men</option>
</select>

Nom: <input name="equipier_1_nom" type="nom" /><br>

Role:
<select name="equipier_2_role"  type="role" >
    <option value="capitaine">Capitaine</option>
    <option value="barreur">barreur</option>
    <option value="equipier">équipier</option>
    <option value="bow_men">bow men</option>
</select>

Nom: <input name="equipier_2_nom" type="nom" /><br>

Role:
<select name="equipier_3_role"  type="role" >
    <option value="capitaine">Capitaine</option>
    <option value="barreur">barreur</option>
    <option value="equipier">équipier</option>
    <option value="bow_men">bow men</option>
</select>

Nom: <input name="equipier_3_nom" type="nom" /><br>

Role:
<select name="equipier_4_role"  type="role" >
    <option value="capitaine">Capitaine</option>
    <option value="barreur">barreur</option>
    <option value="equipier">équipier</option>
    <option value="bow_men">bow men</option>
</select>

Nom: <input name="equipier_4_nom" type="nom" /><br>
<hr>

<input type="submit" name="submit" value="Démarer le traceur">
</form>