<div id="content" class="w3-container w3-padding-32">

	<div class="w3-container">
		<div class="w3-row">
			<div class="w3-col l6 m6" id="registerContainer">

    		<h1>Registrace</h1>
				<form class="w3-container">

					<label>Email</label>
					<input class="w3-input" type="email" name="email">

					<label>Heslo</label>
					<input class="w3-input" type="password" name="password">

					<label>Potvrzení hesla</label>
					<input class="w3-input" type="password" name="passConf">

					<button type="button" class="w3-button w3-green w3-margin" onclick="registrace()">Registrovat</button>

					</form>
				<div class="messages"></div> 
			</div>
		<div class="w3-col l6 m6" id="loginContainer">
    	<h1>Přihlášení</h1>
			<form class="w3-container">

					<label>Email</label>
					<input class="w3-input" type="email" name="email">

					<label>Heslo</label>
					<input class="w3-input" type="password" name="password">

					<button type="button" class="w3-button w3-green w3-margin" onclick="prihlasit()">Přihlásit se</button>

					</form>
				<div class="messages"></div> 
		</div>
	</div>
</div>

<script>

	function prihlasit() {
		let data = {
				email: $("#loginContainer input[name=email]").val(),
				password: $("#loginContainer input[name=password]").val()
			}

			$.post("server/login.php", data, function (response) {
				console.log(response);

				if(response == "ok") {
					location.href = "index.php?page=vypisProduktu";
					//$("#loginContainer messages").html(`<div class="w3-green w3-panel">Přihlášen</div>`);
				} else {
					$("#loginContainer messages").html(`<div class="w3-red w3-panel">${response}</div>`);
				}
			});
	}

	function registrace() {
		let pass = $("#registerContainer input[name=password]").val();
		let passConf = $("#registerContainer input[name=passConf]").val();
		if(pass == passConf) {
			let data = {
				email: $("#registerContainer input[name=email]").val(),
				password: pass
			}

			$.post("server/register.php", data, function (response) {
				console.log(response);

				if(response == "ok") {
					$("#registerContainer messages").html(`<div class="w3-green w3-panel">Registrace provedena!</div>`);
				} else {
					$("#registerContainer messages").html(`<div class="w3-red w3-panel">${response}</div>`);
					
				}
			});
		}
	}
</script>