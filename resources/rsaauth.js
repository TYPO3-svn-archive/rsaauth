function tx_rsaauth_encrypt() {
	var rsa = new RSAKey();
	rsa.setPublic(document.loginform.n.value, document.loginform.e.value);

	var username = document.loginform.username.value;
	var password = document.loginform.p_field.value;

	var res = rsa.encrypt(password);

	// Remove all plaintext-data
	document.loginform.p_field.value = "";
	document.loginform.e.value = "";
	document.loginform.n.value = "";

	if (res) {
		document.loginform.userident.value = 'rsa:' + hex2b64(res);
	}
}