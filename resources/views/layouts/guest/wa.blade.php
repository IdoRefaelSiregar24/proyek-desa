<!-- 🔹 Tombol WhatsApp Mengambang -->
<div id="wa-button" class="wa-button">
    <i data-feather="message-circle"></i>
</div>

<!-- 🔹 Pop-up WhatsApp -->
<div id="wa-popup" class="wa-popup">
    <div class="wa-header">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WA" class="wa-logo">
        <div>
            <h6 class="mb-0 fw-bold">Hubungi Kami</h6>
            <small class="text-muted">Balas dalam beberapa menit</small>
        </div>
        <button id="close-popup" class="btn-close btn-sm"></button>
    </div>
    <div class="wa-body">
        <p>Halo! 👋<br>Kami siap membantu Anda terkait progress proyek desa.</p>
        <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20proyek%20desa."
           target="_blank" class="btn btn-success d-flex align-items-center justify-content-center gap-2 mt-3">
            <i data-feather="send"></i> Chat Sekarang
        </a>
    </div>
</div>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>

<!-- 🔹 Script Pop-up -->
<script>
    const waButton = document.getElementById('wa-button');
    const waPopup = document.getElementById('wa-popup');
    const closePopup = document.getElementById('close-popup');

    waButton.addEventListener('click', () => {
        waPopup.classList.toggle('show');
    });

    closePopup.addEventListener('click', () => {
        waPopup.classList.remove('show');
    });
</script>

<!-- 🔹 Style -->
<style>
    /* Tombol WA Mengambang */
    .wa-button {
        position: fixed;
        bottom: 25px;
        right: 25px;
        background-color: #d32b25;
        color: #fff;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        z-index: 999;
    }

    .wa-button:hover {
        transform: scale(1.1);
        background-color: #20ba5a;
    }

    /* Pop-up WA */
    .wa-popup {
        position: fixed;
        bottom: 90px;
        right: 25px;
        background: #fff;
        width: 320px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        display: none;
        z-index: 1000;
        animation: fadeIn 0.3s ease;
    }

    .wa-popup.show {
        display: block;
    }

    .wa-header {
        background: #25D366;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 15px;
    }

    .wa-header .wa-logo {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .wa-body {
        padding: 15px;
        font-size: 15px;
        color: #333;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
