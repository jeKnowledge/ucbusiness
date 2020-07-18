$(document).ready(function(){
    main();
});

function main() {
    checkbox = document.getElementById("passwordCheckbox");
    password_input = document.getElementById("passwordInput");
    password_label = document.getElementById("passwordLabel");

    if (checkbox) {
        password_label.style.display = 'none';
        checkbox.addEventListener('change', function () {
                if (this.checked) {
                    password_label.style.display = 'block';
                    password_input.setAttribute('type', 'password');
                    password_input.required = true;
                } else {
                    password_label.style.display = 'none';
                    password_input.setAttribute('type', 'hidden');
                    password_input.required = false;
                }
            }
        );
    }
}