
window.addEventListener('pokedex-success', (event) => {
    let data = event.detail;

    swal({
        position: "center",
        icon: "success",
        title: "Success seeding Pokedex",
        showConfirmationButton: true,
    })
    }
);