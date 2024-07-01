<?php

// password 
const PASS_MIN_LENGTH = 3;
const PASS_MAX_LENGTH = 255;

// photo




// file 
// - error messages

const MESSAGES = [
    UPLOAD_ERR_OK => 'File uploaded successfully',
    UPLOAD_ERR_INI_SIZE => 'File is too big to upload',
    UPLOAD_ERR_FORM_SIZE => 'File is too big to upload',
    UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder on the server',
    UPLOAD_ERR_CANT_WRITE => 'File is failed to save to disk.',
    UPLOAD_ERR_EXTENSION => 'File is not allowed to upload to this server',
];

const MAX_SIZE = 20 * 1024 * 1024; //  20MB
const ALLOWED_FILES = ['png', 'jpg', 'jpeg'];

