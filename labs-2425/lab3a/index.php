<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <!-- Add the Bulma CSS here -->

    <!-- script use to disable button -->
    <script>
        function validateForm() {
            const name = document.querySelector('input[name="complete_name"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const nextButton = document.querySelector('button[type="submit"]');
            
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (name === '' || !emailPattern.test(email)) {
                nextButton.disabled = true;
            } else {
                nextButton.disabled = false;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const nameField = document.querySelector('input[name="complete_name"]');
            const emailField = document.querySelector('input[name="email"]');
            
            nameField.addEventListener('input', validateForm);
            emailField.addEventListener('input', validateForm);
            
            // Initial check
            validateForm();
        });
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="POST" action="instructions.php">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="complete_name" placeholder="Complete Name">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" name="email" type="email" />
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date" />
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="number" />
            </div>
        </div>

        <!-- Next button -->
        <button type="submit" class="button is-link">Proceed Next</button>
    </form>
</section>

</body>
</html>