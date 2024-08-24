<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Create the 'uploads' directory if it doesn't exist
if (!is_dir($upload_directory)) {
    mkdir($upload_directory, 0755, true);
}

// Handle Text File
if (isset($_FILES['text_file']) && $_FILES['text_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_text_file = $upload_directory . basename($_FILES['text_file']['name']);
    $temporary_file = $_FILES['text_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_text_file)) {
        $text_file_content = file_get_contents($uploaded_text_file);
        ?>
        <textarea cols="70" rows="30"><?php echo htmlspecialchars($text_file_content); ?></textarea>
        <?php
    } else {
        echo 'Failed to upload text file';
    }
}

// Handle PDF File
if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
    $temporary_file = $_FILES['pdf_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_pdf_file)) {
        ?>
        <h3>Uploaded PDF File:</h3>
        <embed src="<?php echo $relative_path . basename($_FILES['pdf_file']['name']); ?>" width="600" height="400" type="application/pdf">
        <?php
    } else {
        echo 'Failed to upload PDF file';
    }
}

echo '<pre>';
var_dump($_FILES);
echo '</pre>';

exit;
