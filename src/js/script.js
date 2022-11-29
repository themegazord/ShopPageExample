const formLogin = document.getElementById("form-login");
const formRegister = document.getElementById("form-register");
const logoff = document.getElementById("logoff");

if(formRegister !== null) {
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
}


if(formLogin !== null) {
    formLogin.addEventListener("submit", async (e) => {
        e.preventDefault();

        const dadosForm = new FormData(formLogin);

        const data = await fetch("processes/login-process.php", {
            method: "POST",
            body: dadosForm,
        });

        const response = await data.json();
        window.location.href = "http://localhost:8080/shop_page/";
    });
}

if(logoff !== null) {
    logoff.addEventListener("click", async(e) => {
        e.preventDefault();

        const dadosLogoff = new FormData();

        dadosLogoff.append("type", "logoff");

        const data = await fetch("processes/login-process.php", {
            method: "POST",
            body: dadosLogoff,
        })

        window.location.href = "http://localhost:8080/shop_page/";
    })
}

