const MIN_QUANTITY = 1;
const MAX_QUANTITY = 99;

// Menu hamburger: menutup sendiri setelah salah satu link diklik
function setupMenu() {
    const menu = document.getElementById("navbar-menu");

    menu.querySelectorAll(".nav-link").forEach((link) => {
        link.addEventListener("click", () => {
            if (menu.classList.contains("show")) {
                bootstrap.Collapse.getInstance(menu).hide();
            }
        });
    });
}

// Kartu produk: harga mengikuti ukuran terpilih, jumlah diatur tombol - dan +
function setupProductCard(card) {
    const priceText = card.querySelector("[data-price-text]");
    const quantityInput = card.querySelector('input[name="quantity"]');
    const minusButton = card.querySelector('[data-quantity-change="-1"]');
    const plusButton = card.querySelector('[data-quantity-change="1"]');

    // Tampilkan harga sesuai ukuran yang sedang dipilih
    function showSelectedPrice() {
        const selectedSize = card.querySelector(
            'input[name="size_id"]:checked',
        );

        if (selectedSize) {
            priceText.textContent = selectedSize.dataset.price;
        }
    }

    // Tombol - mati di jumlah minimum, tombol + mati di jumlah maksimum
    function updateQuantityButtons() {
        const quantity = Number(quantityInput.value);

        minusButton.disabled = quantity <= MIN_QUANTITY;
        plusButton.disabled = quantity >= MAX_QUANTITY;
    }

    // Ganti ukuran: ubah harga
    card.querySelectorAll('input[name="size_id"]').forEach((radio) => {
        radio.addEventListener("change", showSelectedPrice);
    });

    // Klik - atau +: ubah jumlah
    [minusButton, plusButton].forEach((button) => {
        button.addEventListener("click", () => {
            let quantity =
                Number(quantityInput.value) +
                Number(button.dataset.quantityChange);

            if (quantity < MIN_QUANTITY) {
                quantity = MIN_QUANTITY;
            }

            if (quantity > MAX_QUANTITY) {
                quantity = MAX_QUANTITY;
            }

            quantityInput.value = quantity;
            updateQuantityButtons();
        });
    });

    showSelectedPrice();
    updateQuantityButtons();
}

setupMenu();
document.querySelectorAll("[data-product-card]").forEach(setupProductCard);