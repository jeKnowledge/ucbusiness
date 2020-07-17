$(document).ready(function(){
    main();
});

function main() {
    checkbox = document.getElementById("passwordCheckbox");
    password_input = document.getElementById("passwordInput");
    password_label = document.getElementById("passwordLabel");

    if (checkbox) {
        checkbox.addEventListener('change', function () {
                if (this.checked) {
                    password_label.hidden = false;
                    password_input.setAttribute('type', 'password');
                    password_input.required = true;
                } else {
                    password_label.hidden = true;
                    password_input.setAttribute('type', 'hidden');
                    password_input.required = false;
                }
            }
        );
    }
}