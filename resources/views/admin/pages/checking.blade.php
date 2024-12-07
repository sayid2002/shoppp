<script type="text/javascript">document.getElementById(btn).onclick = function(){
	var login = document.getElementById('login').value;
	var password = document.getElementById('password').value;
	if (login.value == 'admin') && (password.value == '12345') window.location.replace("shoppp/admin/pages/site");;
	else alert ('Вход запрещен!');	
}
</script>