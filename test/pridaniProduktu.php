<div id="content" class="w3-container w3-padding-32">
<h1>Přidání produktu</h1>

<form class="w3-container w3-light-grey">
  <label>Název produktu</label>
  <input class="w3-input w3-border-0" type="text" name="nazev" placeholder="Název...">

  <label>Cena</label>
  <input class="w3-input w3-border-0" type="number" id="cena" max="50">

  <button class="w3-button w3-green" type="button" onclick="pridatProdukt()">Přidat produkt</button>
</form>
</div>
<script>
    function pridatProdukt() {
        let data = {
            nazev: $("input[name=nazev]").val(),
            cena: $("#cena").val()
        };

        $.post("server/newProduct.php", data, function(response){
            console.log(response);
            if(response == "ok") {
                $("#content").append("Vše OK, přidáno do DB");
            } else {
                $("#content").append(response);
            }

        });

        console.log(data);
    }
</script>

