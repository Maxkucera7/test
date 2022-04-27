<div class="w3-container w3-padding-32">
	<ul id="produkty"></ul>
</div>
	<script>
        downloadData();
		function downloadData() {
			$.get("server/getProducts.php", function (data) {
				console.log(data);
				let json = JSON.parse(data);
				console.log(json);

				for(let i = 0; i < json.length; i++) {
					$("#produkty").append(`<li>${json[i].productName} (${json[i].buyPrice})</li>`);
				}
			});
		}

		// TODO: POST DATA! uložit produkt do DB

	</script>