<?php

if (empty($_POST) || empty($_POST['text'])) {
    header('HTTP/1.0 400 Bad Request');
    echo '400 Bad Request';
    exit;
}

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', false);

require_once('lib/EMT.php');
$typograf = new EMTypograph();

if (!empty($_POST['options']) && is_array($_POST['options'])) {
    $setup = array();

    $defaults = $typograf->get_options_list();
    $defaults = $defaults['all'];

    $options = $_POST['options'];
    foreach ($options as $option=>$value) {
        if (array_key_exists($option, $defaults)) {
            $setup[$option] = $value;
        }
    }
} else {
    $setup = array(
        'Dash.ka_de_kas' => 'on',
        // 'Nobr.nowrap' => 'on',
        'Nobr.hyphen_nowrap' => 'on',
        'Nobr.hyphen_nowrap_in_small_words' => 'on',
        // 'Punctmark.dot_on_end' => 'on',
        'Date.mdash_month_interval' => 'on',
        'Date.nbsp_and_dash_month_interval' => 'on',
        'Text.paragraphs' => 'off',
        'Text.auto_links' => 'off',
        'Text.email' => 'off',
        'Text.breakline' => 'off',
        'Etc.unicode_convert' => 'on',
    );
}

try {
    if (!empty($setup)) {
        $typograf->setup($setup);
    }

    $typograf->set_text($_POST['text']);

    $result = $typograf->apply();

    $data = array('result' => $result);
} catch (Exception $e) {
    $data = array('status' => $e->getMessage());
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);