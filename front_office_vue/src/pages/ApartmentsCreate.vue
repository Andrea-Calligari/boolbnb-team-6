<template>
    <div class="container">
        <form action="http://localhost:8000/api/apartments" method="POST">

            <div class="mb-3">
                <label for="title" class="form-label">titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci titolo">

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="textarea" class="form-control" id="description" name="description"
                    placeholder="Inserisci Descrizione">

            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci Prezzo">

            </div>

            <div class="mb-3">
                <label for="rooms_number" class="form-label">N° Stanze</label>
                <input type="number" class="form-control" id="rooms_number" name="rooms_number"
                    placeholder="Inserisci N° Stanze">

            </div>

            <div class="mb-3">
                <label for="beds_number" class="form-label">N° letti</label>
                <input type="number" class="form-control" id="beds_number" name="beds_number"
                    placeholder="Inserisci N° letti">

            </div>

            <div class="mb-3">
                <label for="baths_number" class="form-label">N˚ bagni</label>
                <input type="number" class="form-control" id="baths_number" name="baths_number"
                    placeholder="Inserisci N˚ bagni">

            </div>

            <div class="mb-3">
                <label for="mtq" class="form-label">Metri quadri</label>
                <input type="number" class="form-control" id="mtq" name="mtq" placeholder="Inserisci Metri quadri">

            </div>

            <div class="mb-3">
                <label for="address" class="form-label">indirizzo</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci indirizzo">

            </div>

            <div class="mb-3">
                <label for="latitude" class="form-label">latitudine</label>
                <input type="number" class="form-control" id="latitude" name="latitude"
                    placeholder="Inserisci latitudine">

            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">longitudine</label>
                <input type="number" class="form-control" id="longitude" name="longitude"
                    placeholder="Inserisci longitudine">

            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagini</label>
                <input class="form-control" type="file" name="image" id="image" multiple>
            </div>


            <div class="mb-3">
                <label for="visible" class="form-label">Visibile</label>
                <select name="visible" id="visible">
                    <option value="">Scegli se rendere visibile il tuo annuncio</option>
                    <option value="0">si</option>
                    <option value="1">no</option>
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped></style>