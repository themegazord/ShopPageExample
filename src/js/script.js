const formLogin = document.getElementById("form-login");
const formRegister = document.getElementById("form-register");

formRegister.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosRegister = new FormData(formRegister);

    const data = await fetch("processes/register-process.php", {
        method: "POST",
        body: dadosRegister,
    });

    const response = await data.json();
    window.location.href = "http://localhost:8080/shop_page/";
})

formLogin.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(formLogin);

    const dados = await fetch("processes/login-process.php", {
        method: "POST",
        body: dadosForm,
    });

    const response = await dados.json();
    console.log(response)
});
