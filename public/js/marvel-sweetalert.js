window.marvelSwalDefaults = {
    iconColor: '#ffd700',
    background: '#141414',
    color: '#f1f1f1',
    confirmButtonColor: '#e62429',
    cancelButtonColor: '#6c757d',
    showCloseButton: true,
    showCancelButton: false,
    customClass: {
        title: 'marvel-swal-title',
        popup: 'marvel-swal-popup'
    },
    width: '32rem',
    showClass: {
        popup: 'swal2-show',
        icon: 'swal2-icon-show'
    },
    hideClass: {
        popup: 'swal2-hide',
        icon: 'swal2-icon-hide'
    }
};

window.marvelSwal = function(options = {}) {
    const base = JSON.parse(JSON.stringify(window.marvelSwalDefaults));
    const merged = Object.assign({}, base, options);
    merged.customClass = Object.assign({}, base.customClass, options.customClass || {});
    return Swal.fire(merged);
};

window.marvelConfirm = function(options = {}) {
    return window.marvelSwal(Object.assign({
        showCancelButton: true,
        cancelButtonText: options.cancelButtonText || 'Cancelar',
        confirmButtonText: options.confirmButtonText || 'Confirmar',
        reverseButtons: true
    }, options));
};

window.marvelToast = function(options = {}) {
    return Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        background: '#1a1a1a',
        color: '#f1f1f1',
        iconColor: '#ffd700',
        customClass: {
            popup: 'marvel-swal-toast'
        }
    }).fire(options);
};

(function() {
    if (document.getElementById('marvel-swal-styles')) {
        return;
    }
    const style = document.createElement('style');
    style.id = 'marvel-swal-styles';
    style.innerHTML = `
        .marvel-swal-popup.swal2-popup {
            border-radius: 18px !important;
            border: 1px solid rgba(230, 36, 41, 0.85) !important;
            background: #111 !important;
            color: #f1f1f1 !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.55) !important;
        }
        .swal2-title, .marvel-swal-title {
            font-family: 'Roboto', sans-serif !important;
            color: #ffd700 !important;
            letter-spacing: 0.12em !important;
            text-transform: uppercase !important;
            font-size: 1.75rem !important;
        }
        .swal2-html-container, .swal2-content {
            color: #d7d7d7 !important;
            font-size: 1rem !important;
            line-height: 1.6 !important;
        }
        .swal2-styled.swal2-confirm {
            background: #e62429 !important;
            color: #fff !important;
            border: none !important;
            box-shadow: 0 10px 30px rgba(230, 36, 41, 0.35) !important;
        }
        .swal2-styled.swal2-cancel {
            background: #222 !important;
            color: #fff !important;
            border: 1px solid #555 !important;
        }
        .swal2-close {
            color: #f1f1f1 !important;
            opacity: 0.85 !important;
        }
        .swal2-icon.swal2-success {
            border-color: #ffd700 !important;
            color: #ffd700 !important;
        }
        .swal2-icon.swal2-warning {
            border-color: #ffd700 !important;
            color: #ffd700 !important;
        }
        .swal2-icon.swal2-error {
            border-color: #e62429 !important;
            color: #e62429 !important;
        }
        .swal2-loader div {
            background: #e62429 !important;
        }
        .marvel-swal-toast.swal2-popup {
            padding: 0.9rem 1.1rem !important;
            border-radius: 14px !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
        }
    `;
    document.head.appendChild(style);
})();
