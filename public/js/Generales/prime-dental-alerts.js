;(function () {
    if (typeof window === "undefined" || typeof window.swal === "undefined") {
        return;
    }

    const BRAND_NAVY = "#0f4c75";
    const BRAND_CYAN = "#48c8dc";
    const BRAND_DANGER = "#d50a0a";

    const baseOptions = {
        buttonsStyling: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        customClass: "prime-dental-swal",
        confirmButtonColor: BRAND_CYAN,
        cancelButtonColor: BRAND_DANGER,
    };

    // ALERT NORMAL
    function openAlert(options) {
        return window.swal(
            Object.assign({}, baseOptions, {
                showCancelButton: false,
                icon: "info",
            }, options || {})
        );
    }

    // CONFIRM
    function openConfirm(options) {
        const merged = Object.assign(
            {},
            baseOptions,
            {
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sí",
                cancelButtonText: "Cancelar",
            },
            options || {}
        );

        return window.swal(merged).then(function (result) {
            return result.isConfirmed; // true = sí, false = cancelar
        });
    }

    // FUNCIONES GLOBALES
    window.primeAlert = function (mensaje, titulo, tipo) {
        return openAlert({
            title: titulo || "Aviso",
            html: mensaje,
            icon: tipo || "info",
        });
    };

    window.primeConfirm = function (mensaje, titulo) {
        return openConfirm({
            title: titulo || "Confirmar acción",
            html: mensaje,
            icon: "question",
            imageUrl: "/img/icons/prime-confirm.svg",
            imageWidth: 86,
            imageHeight: 86,
            imageClass: "prime-dental-swal-svg",
        });
    };

    // OVERRIDE DE ALERT NATIVO
    window._nativeAlert = window._nativeAlert || window.alert;

    window.alert = function (mensaje) {
        return openAlert({
            title: "Aviso",
            html: String(mensaje),
            icon: "info",
        });
    };
})();