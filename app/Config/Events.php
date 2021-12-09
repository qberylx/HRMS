<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use App\Models\audit_log;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', static function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static function ($buffer) {
            return $buffer;
        });
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();
    }
});


Events::on("DBQuery", function($val){
    $audit = new audit_log;

    if (strcasecmp(substr($val,0,6),"insert") == 0) {
        if (!str_contains($val,'audit_log')) {
            $data = array(
                'user_id' => $_SESSION['userid'],
                'query' => $val
            );
            echo $audit->InsertData($data);
        }
    }elseif (strcasecmp(substr($val,0,6),"delete") == 0) {
        $data = array(
            'user_id' => $_SESSION['userid'],
            'query' => $val
        );
        echo $audit->InsertData($data);
    }elseif (strcasecmp(substr($val,0,6),"update") == 0) {
        $data = array(
            'user_id' => $_SESSION['userid'],
            'query' => $val
        );
        echo $audit->InsertData($data);
    }
});
