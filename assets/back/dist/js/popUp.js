/* eslint-env browser */
/* jslint-env browser */
/* global window */
/* global document */
/* global console */

function roar(title, message, options) {
    'use strict';

    if (typeof options !== 'object') {
        options = {};
    }

    if (!window.roarAlert) {
        var RoarObject = {
            element: null,
            cancelElement: null,
            confirmElement: null
        };
        RoarObject.element = document.querySelector('.roar-alert');
    } else {
        // Clear style
        if (window.roarAlert.cancel) {
            window.roarAlert.cancelElement.style = '';
        }
        if (window.roarAlert.confirm) {
            window.roarAlert.confirmElement.style = '';
        }
        // Show alert
        document.body.classList.add('roar-open');
        window.roarAlert.element.style.display = 'block';

        RoarObject = window.roarAlert;
    }

    // Define default options
    RoarObject.cancel = options.cancel !== undefined ? options.cancel : false;
    RoarObject.cancelText = options.cancelText !== undefined ? options.cancelText : 'Cancel';
    RoarObject.cancelCallBack = function (event) {
        document.body.classList.remove('roar-open');
        window.roarAlert.element.style.display = 'none';
        // Cancel callback
        if (typeof options.cancelCallBack === 'function') {
            options.cancelCallBack(event);
        }
        return true;

        // console.log("cancel");
    };

    if (document.querySelector('.roar-alert-mask')) {
        document.querySelector('.roar-alert-mask').addEventListener('click', function (event) {
            document.body.classList.remove('roar-open');
            window.roarAlert.element.style.display = 'none';
            // Cancel callback
            if (typeof options.cancelCallBack === 'function') {
                options.cancelCallBack(event);
            }
            return true;

            // console.log("cancel");
        });
    }
    RoarObject.message = message;
    RoarObject.title = title;
    RoarObject.confirm = options.confirm !== undefined ? options.confirm : true;
    RoarObject.confirmText = options.confirmText !== undefined ? options.confirmText : 'Confirm';
    RoarObject.confirmCallBack = function (event) {
        document.body.classList.remove('roar-open');
        window.roarAlert.element.style.display = 'none';
        // Confirm callback
        if (typeof options.confirmCallBack === 'function') {
            options.confirmCallBack(event);
        }
        return true;
        // console.log("confirm");
    };

    if (!RoarObject.element) {
        RoarObject.html =
            '<div class="roar-alert" id="roar-alert">' +
            '<div class="roar-alert-mask"></div>' +
            '<div class="roar-alert-message-body">' +
            '<div class="roar-alert-message-tbf roar-alert-message-title">' +
            RoarObject.title +
            '</div>' +
            '<div class="roar-alert-message-tbf roar-alert-message-content">' +
            RoarObject.message +
            '</div>' +
            '<div class="roar-alert-message-tbf roar-alert-message-button">';

        if (RoarObject.cancel || true) {
            RoarObject.html += '<a href="javascript:;" class="roar-alert-message-tbf roar-alert-message-button-cancel">' + RoarObject.cancelText + '</a>';
        }

        if (RoarObject.confirm || true) {
            RoarObject.html += '<a href="javascript:;" class="roar-alert-message-tbf roar-alert-message-button-confirm">' + RoarObject.confirmText + '</a>';
        }

        RoarObject.html += '</div></div></div>';

        var element = document.createElement('div');
        element.id = 'roar-alert-wrap';
        element.innerHTML = RoarObject.html;
        document.body.appendChild(element);

        RoarObject.element = document.querySelector('.roar-alert');
        RoarObject.cancelElement = document.querySelector('.roar-alert-message-button-cancel');

        // Enabled cancel button callback
        if (RoarObject.cancel) {
            document.querySelector('.roar-alert-message-button-cancel').style.display = 'block';
        } else {
            document.querySelector('.roar-alert-message-button-cancel').style.display = 'none';
        }

        // Enabled cancel button callback
        RoarObject.confirmElement = document.querySelector('.roar-alert-message-button-confirm');
        if (RoarObject.confirm) {
            document.querySelector('.roar-alert-message-button-confirm').style.display = 'block';
        } else {
            document.querySelector('.roar-alert-message-button-confirm').style.display = 'none';
        }

        RoarObject.cancelElement.onclick = RoarObject.cancelCallBack;
        RoarObject.confirmElement.onclick = RoarObject.confirmCallBack;

        window.roarAlert = RoarObject;
    }

    document.querySelector('.roar-alert-message-title').innerHTML = '';
    document.querySelector('.roar-alert-message-content').innerHTML = '';
    document.querySelector('.roar-alert-message-button-cancel').innerHTML = RoarObject.cancelText;
    document.querySelector('.roar-alert-message-button-confirm').innerHTML = RoarObject.confirmText;

    RoarObject.cancelElement = document.querySelector('.roar-alert-message-button-cancel');

    // Enabled cancel button callback
    if (RoarObject.cancel) {
        document.querySelector('.roar-alert-message-button-cancel').style.display = 'block';
    } else {
        document.querySelector('.roar-alert-message-button-cancel').style.display = 'none';
    }

    // Enabled cancel button callback
    RoarObject.confirmElement = document.querySelector('.roar-alert-message-button-confirm');
    if (RoarObject.confirm) {
        document.querySelector('.roar-alert-message-button-confirm').style.display = 'block';
    } else {
        document.querySelector('.roar-alert-message-button-confirm').style.display = 'none';
    }
    RoarObject.cancelElement.onclick = RoarObject.cancelCallBack;
    RoarObject.confirmElement.onclick = RoarObject.confirmCallBack;

    // Set title and message
    RoarObject.title = RoarObject.title || '';
    RoarObject.message = RoarObject.message || '';

    document.querySelector('.roar-alert-message-title').innerHTML = RoarObject.title;
    document.querySelector('.roar-alert-message-content').innerHTML = RoarObject.message;

    window.roarAlert = RoarObject;
}

/*
 * Custom demos
 */
function demo3() {
    var options = {
        cancel: true,
        cancelText: "cancel",
        cancelCallBack: function (event) {
            console.log("options.cancelCallBack");
        },
        confirm: true,
        confirmText: "confirm",
        confirmCallBack: function (event) {
            console.log("options.confirmCallBack");
        }
    };
    roar(
        "demo 3",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a purus non turpis scelerisque molestie. Pellentesque id interdum nulla. Etiam nec ex porta, blandit felis eget, pulvinar turpis. Nam efficitur placerat nisl, ut tempor leo finibus eget. Praesent non dolor id purus scelerisque elementum ac eu enim. Cras euismod ipsum id mi malesuada, nec porttitor velit pulvinar. Proin hendrerit libero fringilla augue euismod, sit amet molestie dui dapibus. Mauris libero quam, bibendum et quam at, condimentum eleifend libero.",
        options
    );
}
function updateProfile() {
    var options = {
        cancel: false,
        cancelText: "cancel",
        cancelCallBack: function (event) {
            console.log("options.cancelCallBack");
        },
        confirm: true,
        confirmText: "confirm",
        confirmCallBack: function (event) {
            console.log("options.confirmCallBack");
        }
    };
    roar("Message", "Update Berhasil", options);
}
function updatePass() {
    var options = {
        cancel: false,
        cancelText: "cancel",
        cancelCallBack: function (event) {
            console.log("options.cancelCallBack");
        },
        confirm: true,
        confirmText: "confirm",
        confirmCallBack: function (event) {
            console.log("options.confirmCallBack");
        }
    };
    roar("Message", "Update Password Berhasil", options);
}
function updatePhoto() {
    var options = {
        cancel: false,
        cancelText: "cancel",
        cancelCallBack: function (event) {
            console.log("options.cancelCallBack");
        },
        confirm: true,
        confirmText: "confirm",
        confirmCallBack: function (event) {
            console.log("options.confirmCallBack");
        }
    };
    roar("Message", "Update Photo Berhasil", options);
}
function demo5() {
    var options = {
        cancel: true,
        cancelText: "cancel button",
        cancelCallBack: function (event) {
            console.log("options.cancelCallBack");
        },
        confirm: true,
        confirmText: "confirm button",
        confirmCallBack: function (event) {
            console.log("options.confirmCallBack");
        }
    };
    roar("demo 5", "demo 5 show message", options);
}
function del(url) {
    var options = {
        cancel: true,
        cancelText: "cancel button",
        cancelCallBack: function (event) {
            console.log("options.cancelCallBack");
        },
        confirm: true,
        confirmText: "confirm button",
        confirmCallBack: function (event) {
            console.log("options.confirmCallBack");
            return window.location = url;
        }
    };
    roar("Warning!", "Are You Sure?", options);
}
