// Tela de login
const formLogin = document.getElementById("form-login");
//Tela de registrar
const formRegister = document.getElementById("form-register");
// nav
const logoff = document.getElementById("logoff");
const admin = document.getElementById("admin");
// tela administrativa
const menu_cadpro = document.getElementById("menu-cadpro");
const menu_listpro = document.getElementById("menu-listpro");
const menu_listven = document.getElementById("menu-listven");
const cadpro = document.getElementById("cadpro");
const listpro = document.getElementById("listpro");
const listven = document.getElementById("listven");
const formCadpro = document.getElementById("form-cadpro");
// index
const print = document.getElementById("product-print");
const img = document.getElementById("product-img");



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

if(admin !== null) {
    admin.addEventListener("click", e => {
        e.preventDefault();

        window.location.href = "http://localhost:8080/shop_page/admin.php"

    })
}

if(menu_listven !== null && menu_listpro !== null && menu_cadpro !== null && listven !== null && listpro !== null && cadpro !== null) {
    menu_listven.addEventListener("click", e => {
        e.preventDefault();

        listven.classList.remove("hidden");
        listpro.classList.add("hidden");
        cadpro.classList.add("hidden");
    })

    menu_listpro.addEventListener("click", e => {
        e.preventDefault();

        listpro.classList.remove("hidden");
        listven.classList.add("hidden");
        cadpro.classList.add("hidden");
    })

    menu_cadpro.addEventListener("click", e => {
        e.preventDefault();

        cadpro.classList.remove("hidden");
        listpro.classList.add("hidden");
        listven.classList.add("hidden");
    })
}

if(formCadpro !== null) {
    formCadpro.addEventListener("submit", async (e) => {
        e.preventDefault();
        const active = document.getElementById("active");
        const best_seller = document.getElementById("best_seller");

        const dataCadpro = new FormData(formCadpro);

        if(active.checked) {
            dataCadpro.append("active", "N")
        } else {
            dataCadpro.append("active", "S")
        }

        if(best_seller.checked) {
            dataCadpro.append("best_seller", "S")
        } else {
            dataCadpro.append("best_seller", "N")
        }

        const data = await fetch("processes/product-process.php", {
            method: "POST",
            body: dataCadpro,
        });

        const response = await data.json();
        console.log(response);
    })
}

if(img !== null) {
    img.addEventListener("mouseover", e => {
        img.classList.add("hidden");
        print.classList.remove("hidden");

    })
}

if(print !== null) {
    print.addEventListener("mouseout", e => {
        print.classList.add("hidden");
        img.classList.remove("hidden");
    })
}