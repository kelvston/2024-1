<?php
/**
 * Contain all reusable functions used throughout the application.
 * Enable centralisation of common functions
 * @author Erick Chrysostom <e.chrysostom@nextbyte.co.tz>, ...
 */

use App\Models\Operation\Claim\HcpHspFacility;
use App\Repositories\Backend\Operation\Claim\PensionAccrualRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;


if (!function_exists('get_uri')) {
    /**
     * Determine the requested url path name
     *
     * @return string
     */
    function get_uri() {
        return urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
    }
}

if (!function_exists('test_uri')) {
    function test_uri() {
        $uri = get_uri();
        //return (substr($uri, 0, 7) === '/public' Or strtolower(substr($_SERVER['SERVER_SOFTWARE'], 0, 5)) == 'nginx');
        return (strpos($uri, 'public') Or strtolower(substr($_SERVER['SERVER_SOFTWARE'], 0, 5)) == 'nginx' Or strtolower($_SERVER['SERVER_NAME']) == 'mac.wcf.go.tz' Or strtolower($_SERVER['SERVER_NAME']) == '127.0.0.1');
    }
}

if (!function_exists('asset_url')) {

    /**
     * Return the assets folder url of this application
     *
     * @return string
     */
    function asset_url() {
        if (test_uri()) {
            // http://mac/public/index.php
            return url("/") . '/template/assets';
            //return 'http://mac/public/template/assets';
        } else {
            return url("/") . '/public/template/assets';
            //return  'http://mac/public/template/assets';
        }
    }

}

if (!function_exists('public_url')) {

    /**
     * Return the public url of the application
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function public_url() {
        if (test_uri()) {
            return url("/");
        } else {
            return url("/") . '/public';
        }
    }

}

if (!function_exists('public_dir')) {
    /**
     * Return the public dir of the application
     * @original public_path() , replace for any disaster
     *
     */
    function public_dir() {
        if (test_uri()) {
            return base_path();
        } else {
            return base_path() . '/public';
        }
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('getFallbackLocale')) {

    /**
     * Get the fallback locale
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    function getFallbackLocale() {
        return config('app.fallback_locale');
    }

}

if (!function_exists('getLanguageBlock')) {

    /**
     * Get the language block with a fallback
     *
     * @param $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getLanguageBlock($view, $data = []) {
        $components = explode("lang", $view);
        $current = $components[0] . "lang." . app()->getLocale() . "." . $components[1];
        $fallback = $components[0] . "lang." . getFallbackLocale() . "." . $components[1];

        if (view()->exists($current)) {
            return view($current, $data);
        } else {
            return view($fallback, $data);
        }
    }

}

if (!function_exists('explode_parameter')) {
    /**
     * Return an array of the inputs string parameter
     * separated by commas e.g 1,2,3,4
     *
     * @param $parameter
     * @return array
     */
    function explode_parameter($parameter) {
        if (! isset($parameter)) {
            $output = [];
        } else {
            $output = explode(",", $parameter);
        }
        return $output;
    }

}

if (!function_exists('contribution_dir')) {
    function contribution_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'contribution';
    }
}

if (!function_exists('contribution_path')) {

    function contribution_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/contribution');
        } else {
            return asset('/public/storage/contribution');
        }
    }
}



if (!function_exists('contribution_legacy_dir')) {
    function contribution_legacy_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'contribution_legacy';
    }
}

if (!function_exists('contribution_legacy_path')) {

    function contribution_legacy_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/contribution_legacy');
        } else {
            return asset('/public/storage/contribution_legacy');
        }
    }
}

if (!function_exists('inspection_contribution_analysis_dir')) {
    function inspection_contribution_analysis_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'inspection' . DIRECTORY_SEPARATOR . 'employer_task' . DIRECTORY_SEPARATOR . 'contribution_analysis';
    }
}

if (!function_exists('inspection_contribution_analysis_path')) {

    function inspection_contribution_analysis_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/inspection/employer_task/contribution_analysis');
        } else {
            return asset('/public/storage/inspection/employer_task/contribution_analysis');
        }
    }
}

if (!function_exists('documentation_dir')) {
    function documentation_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'documentation';
    }
}

if (!function_exists('document_resource_dir')) {
    function document_resource_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'document_resource';
    }
}

if (!function_exists('document_resource_path')) {
    function document_resource_path() {
        if (test_uri()) {
            return asset('/storage/document_resource');
        } else {
            return asset('/public/storage/document_resource');
        }
    }
}

if (!function_exists('inspection_task_dir')) {
    function inspection_task_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'inspection' . DIRECTORY_SEPARATOR . 'task';
    }
}

if (!function_exists('inspection_task_path')) {
    function inspection_task_path() {
        if (test_uri()) {
            return asset('/storage/inspection/task');
        } else {
            return asset('/public/storage/inspection/task');
        }
    }
}

if (!function_exists('inspection_employer_task_dir')) {
    function inspection_employer_task_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'inspection' . DIRECTORY_SEPARATOR . 'employer_task';
    }
}

if (!function_exists('inspection_employer_task_path')) {

    function inspection_employer_task_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/inspection/employer_task');
        } else {
            return asset('/public/storage/inspection/employer_task');
        }
    }
}

if (!function_exists('bulk_dir')) {
    function bulk_dir() {
        return public_path() . DIRECTORY_SEPARATOR. 'storage' . DIRECTORY_SEPARATOR . 'bulk';
    }
}

if (!function_exists('bulk_path')) {

    function bulk_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/bulk');
        } else {
            return asset('/public/storage/bulk');
        }
    }
}

if (!function_exists('profile_dir')) {
    function profile_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage' . DIRECTORY_SEPARATOR . 'profile';
    }
}

if (!function_exists('profile_path')) {

    function profile_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/bulk');
        } else {
            return asset('/public/storage/profile');
        }
    }
}

if (!function_exists('receipt_dir')) {
    function receipt_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage'. DIRECTORY_SEPARATOR . 'receipt';
    }
}

if (!function_exists('receipt_path')) {

    function receipt_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/receipt');
        } else {
            return asset('/public/storage/receipt');
        }
    }
}

if (!function_exists('notification_dir')) {
    function notification_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'notification';
    }
}

if (!function_exists('formal_hearing_dir')) {
    function formal_hearing_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'formal_hearing';
    }
}

if (!function_exists('notification_path')) {

    function notification_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/notification');
        } else {
            return asset('/public/storage/notification');
        }
    }
}




if (!function_exists('investigation_dir')) {
    function investigation_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'notification' . DIRECTORY_SEPARATOR . 'investigation';
        //return public_url() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'notification' . DIRECTORY_SEPARATOR . 'investigation';
    }
}

if (!function_exists('investigation_path')) {
    /**
     * @return string
     */
    function investigation_path() {
        /**
         * @return string
         */
        if (test_uri()) {
            return asset('/storage/notification/investigation');
        } else {
            return asset('/public/storage/notification/investigation');
        }
    }
}

if (!function_exists('dependant_photo_dir')) {
    function dependant_photo_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'dependant' .DIRECTORY_SEPARATOR . 'photo';
    }
}

if (!function_exists('dependant_photo_path')) {

    function dependant_photo_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/dependant/photo');
        } else {
            return asset('/public/storage/dependant/photo');
        }
    }
}


if (!function_exists('payroll_dir')) {
    function payroll_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'payroll';
    }
}

if (!function_exists('payroll_url')) {
    function payroll_url() {
        if (test_uri()) {
            return asset('/storage/payroll/');
        } else {
            return asset('/public/storage/payroll/');
        }
    }
}



if (!function_exists('employment_history_dir')) {
    function employment_history_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'employment_history';
    }
}

if (!function_exists('employment_history_path')) {

    function employment_history_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/member/employment_history');
        } else {
            return asset('/public/storage/member/employment_history');
        }
    }
}

if (!function_exists('employer_closure_dir')) {

    function employer_closure_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'closure';
    }

}

if (!function_exists('dishonour_receipt_dir')) {

    function dishonour_receipt_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'receipt' . DIRECTORY_SEPARATOR . 'dishonour';
    }

}

if (!function_exists('employer_closure_path')) {

    function employer_closure_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/member/closure');
        } else {
            return asset('/public/storage/member/closure');
        }
    }

}

if (!function_exists('employer_registration_dir')) {
    function employer_registration_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'employer_registration';
    }
}


if (!function_exists('employer_verification_dir')) {
    function employer_verification_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'employer_verification';
    }
}

if (!function_exists('incident_dir')) {
    function incident_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'incident';
    }
}

if (!function_exists('notification_report_dir')) {
    function notification_report_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'notification_report';
    }
}

if (!function_exists('claim_dir')) {
    function claim_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'claim';
    }
}

if (!function_exists('employer_advance_payment_dir')) {
    function employer_advance_payment_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'employer_advance_payment';
    }
}

if (!function_exists('public_letters')) {
    function public_letters() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'public_letters';
    }
}

if (!function_exists('public_forms')) {
    function public_forms() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'public_forms';
    }
}

if (!function_exists('letters_dir')) {
    function letters_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'letters';
    }
}

if (!function_exists('medical_docs_dir')) {
    function medical_docs_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'medical_docs';
    }
}

if (!function_exists('letters_path')) {
    function letters_path() {
        //return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'letters';
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/letters');
        } else {
            return asset('/public/storage/letters');
        }
    }
}

if (!function_exists('medical_doc_path')) {
    function medical_doc_path() {
        if (test_uri()) {
            return asset('/storage/medical_docs');
        } else {
            return asset('/public/storage/medical_docs');
        }
    }
}

if (!function_exists('employer_registration_path')) {

    function employer_registration_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/employer_registration');
        } else {
            return asset('/public/storage/employer_registration');
        }
    }
}


if (!function_exists('unregistered_employer_bulk_dir')) {
    function unregistered_employer_bulk_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'unregistered_employer' . DIRECTORY_SEPARATOR . 'bulk';
    }
}

if (!function_exists('unregistered_employer_bulk_path')) {

    function unregistered_employer_bulk_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/unregistered_employer/bulk');
        } else {
            return asset('/public/storage/unregistered_employer/bulk');
        }
    }
}



if (!function_exists('health_provider_bulk_dir')) {
    function health_provider_bulk_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'health_provider' . DIRECTORY_SEPARATOR . 'bulk';
    }
}

if (!function_exists('health_provider_bulk_path')) {

    function health_provider_bulk_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/health_provider/bulk');
        } else {
            return asset('/public/storage/health_provider/bulk');
        }
    }
}

if (!function_exists('missing_contribution_dir')) {
    function missing_contribution_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'missing_contribution';
    }
}

if (!function_exists('missing_contribution_path')) {

    function missing_contribution_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/missing_contribution');
        } else {
            return asset('/public/storage/missing_contribution');
        }
    }
}

if (!function_exists('eoffice_dir')) {
    function eoffice_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'eoffice';
    }
}

if (!function_exists('eoffice_path')) {
    function eoffice_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/eoffice');
        } else {
            return asset('/public/storage/eoffice');
        }
    }
}


if (!function_exists('manual_files_dir')) {
    function manual_files_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'manual_files';
    }
}

if (!function_exists('manual_files_url')) {
    function manual_files_url() {
        if (test_uri()) {
            return asset('/storage/manual_files/');
        } else {
            return asset('/public/storage/manual_files/');
        }
    }
}


if (!function_exists('employer_debt_collection_dir')) {

    function employer_debt_collection_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'debt_collection';
    }

}



if (!function_exists('employer_debt_collection_path')) {

    function employer_debt_collection_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/member/debt_collection');
        } else {
            return asset('/public/storage/member/debt_collection');
        }
    }

}


if (!function_exists('employer_particular_change_dir')) {

    function employer_particular_change_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'employer_change';
    }

}


if (!function_exists('employer_particular_change_path')) {

    function employer_particular_change_path() {
        /**
         *
         */
        if (test_uri()) {
            return asset('/storage/member/employer_change');
        } else {
            return asset('/public/storage/member/employer_change');
        }
    }

}


if (!function_exists('temporary_dir')) {
    function temporary_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'temporary';
    }
}

/*Base storage dir*/
if (!function_exists('base_storage_dir')) {
    function base_storage_dir() {
        return public_path() . DIRECTORY_SEPARATOR .'storage';
    }
}

/*Base storage path*/
if (!function_exists('base_storage_path')) {
    function base_storage_path() {
        if (test_uri()) {
            return asset('/storage');
        } else {
            return asset('/public/storage');
        }
    }
}

if (!function_exists('external_assessor_report_dir')) {
    function external_assessor_report_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'external_assessor_report';
    }
}

if (!function_exists('employer_employee_names_update_path')) {

    function employer_employee_names_update_path() {
        if (test_uri()) {
            return asset('/storage/employer_employee_names_update');
        } else {
            return asset('/public/storage/employer_employee_names_update');
        }
    }

}

if (!function_exists('employer_employee_names_update_dir')) {
    function employer_employee_names_update_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'employer_employee_names_update';
    }
}

if (!function_exists('claim_missing_contribution_path')) {

    function claim_missing_contribution_path() {
        if (test_uri()) {
            return asset('/storage/claim_missing_contribution');
        } else {
            return asset('/public/storage/claim_missing_contribution');
        }
    }

}

if (!function_exists('claim_missing_contribution_dir')) {
    function claim_missing_contribution_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'claim_missing_contribution';
    }
}

if (!function_exists('numeric_to_month')) {
     function numeric_to_month($month)
    {
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        return $months[$month] ?? null;
    }
}



if (!function_exists('convert_number_to_words_sw')) {
    function convert_number_to_words_sw($number) {
        $hyphen      = ' na ';
        $conjunction = ' na ';
        $separator   = ', ';
        $negative    = 'hasi ';
        $decimal     = ' na ';
        $dictionary  = array (
            0                   => 'sifuri',
            1                   => 'moja',
            2                   => 'mbili',
            3                   => 'tatu',
            4                   => 'nne',
            5                   => 'tano',
            6                   => 'sita',
            7                   => 'saba',
            8                   => 'nane',
            9                   => 'tisa',
            10                  => 'kumi',
            11                  => 'kumi na moja',
            12                  => 'kumi na mbili',
            13                  => 'kumi na tatu',
            14                  => 'kumi na nne',
            15                  => 'kumi na tano',
            16                  => 'kumi na sita',
            17                  => 'kumi na saba',
            18                  => 'kumi na nane',
            19                  => 'kumi na tisa',
            20                  => 'ishirini',
            30                  => 'thelathini',
            40                  => 'arobaini',
            50                  => 'hamsini',
            60                  => 'sitini',
            70                  => 'sabini',
            80                  => 'themanini',
            90                  => 'tisini',
            100                 => 'mia',
            1000                => 'elfu',
            1000000             => 'milioni',
            1000000000          => 'bilioni',
            1000000000000       => 'trilioni',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words_sw(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[(int) $number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[100] . ' ' . $dictionary[$hundreds];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words_sw($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $dictionary[$baseUnit] . ' ' . convert_number_to_words_sw($numBaseUnits);
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words_sw($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $string .= ' senti ' . convert_number_to_words_sw($fraction);
        }

        return $string;

    }
}

if (!function_exists('convert_number_to_words')) {
    /**
     * Convert input number to its corresponding
     * words
     *
     * @param $number
     * @return bool|mixed|null|string
     */
    function convert_number_to_words($number) {
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' and ';
        $dictionary  = array (
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[(int) $number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $string .= convert_number_to_words($fraction) . ' cents only';
        }

        return $string;
    }

}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}


if (! function_exists('alert')) {
    /**
     * Access (lol) the Alert:: facade as a simple function.
     */
    function alert()
    {
        return app('alert');
    }
}

if (! function_exists('audit')) {
    /**
     * Access (lol) the Audit:: facade as a simple function.
     */
    function audit()
    {
        return app('audit');
    }
}

if (! function_exists('workflow')) {
    /**
     * Access (lol) the Workflow:: facade as a simple function.
     *
     * @param array $params
     * @return \Illuminate\Foundation\Application|mixed
     */
    function workflow(array $params = [])
    {
        return app('workflow', $params);
    }
}

if (! function_exists('sysdefs')) {
    /**
     * Access (lol) the Audit:: facade as a simple function.
     */
    function sysdefs()
    {
        return app('system');
    }
}



if (! function_exists('months_diff')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function months_diff($from_date, $end_date)
    {
        // logger($from_date);
        // logger($end_date);
        // logger('imefika ndani ya months_diff ');
        /*end parts*/
        $end_day = Carbon::parse($end_date)->format('d');
        $end_month = Carbon::parse($end_date)->format('m');
        $end_year = Carbon::parse($end_date)->format('Y');
        /*from parts*/
        $from_day = Carbon::parse($from_date)->format('d');
        $from_month = Carbon::parse($from_date)->format('m');
        $from_year = Carbon::parse($from_date)->format('Y');

        // $end_day = $end_date->day;
        // $end_month = $end_date->month;
        // $end_year = $end_date->year;

        // $from_day = $from_date->day;
        // $from_month = $from_date->month;
        // $from_year = $from_date->year;


        // logger(' imetoka  ndani ya months_diff ');



        $diff_months = 0;
        if ($end_year == $from_year ){
            $diff_months = $end_month - $from_month;
        };

        if ($end_year <> $from_year ){
            $diff_year = $end_year - $from_year;
            $get_months = $diff_year * 12;
            $end_month  = $end_month + $get_months;
            $diff_months = $end_month - $from_month;
        };
        // logger($diff_months);
        return $diff_months;

    }

}



/*Compute age */
if (! function_exists('age')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function age($from_date, $end_date)
    {

        return Carbon::parse($from_date)->diff(Carbon::parse($end_date))->y;

    }

}


if (! function_exists('blend_hex')) {
    /**
     * Blend two hexadecimal colours
     * specifying the fractional position.
     *
     * Example:
     *     // 10% along the gradient between #66cc00 and #cc2200
     *     blend_hex('66cc00', 'cc2200', 0.1); // "70bb00"
     *     e.g red color : 'b80000', 'ff0000', 0.9
     */
    function blend_hex($from, $to, $pos = 0.5)
    {
        // 1. Grab RGB from each colour
        list($fr, $fg, $fb) = sscanf($from, '%2x%2x%2x');
        list($tr, $tg, $tb) = sscanf($to, '%2x%2x%2x');

        // 2. Calculate colour based on frational position
        $r = (int)($fr - (($fr - $tr) * $pos));
        $g = (int)($fg - (($fg - $tg) * $pos));
        $b = (int)($fb - (($fb - $tb) * $pos));

        // 3. Format to 6-char HEX colour string
        return sprintf('%02x%02x%02x', $r, $g, $b);
    }
}

/**
 * Depreciated
 */
if (! function_exists('checkIfDateExceedToday')) {

    function checkIfDateExceedToday($date)
    {
        if ((Carbon::parse($date)->format('Y-m-d')) > Carbon::parse('now')->format('Y-m-d')) {
            return 1;
        }else{
            return 0;
        }

    }
}

/**
 * check the date format match YYYY-MM-DD
 */
if (! function_exists('check_date_format')) {
    function check_date_format($date)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date) And trim($date) != "")
        {
            return 1;
        } else {
            return 0;
        }
    }
}

if (! function_exists('word_check')) {
    function word_check($string)
    {
        if (!preg_match('/[^A-Za-z\']/', $string)) {
            return 1;
        } else {
            return 0;
        }
    }
}


if (! function_exists('gender_check')) {
    function gender_check($string)
    {
        $male_gender = male_gender();
        $female_gender =female_gender();
        $gender = array_merge($male_gender, $female_gender);
        $string = strtoupper($string);
        if (in_array($string, $gender)){
            return 1;
        }else{
            return 0;
        }
    }
}

if (! function_exists('male_gender')) {
    function male_gender()
    {
        $male_gender = ['MALE', 'M', 'ME', 'MWANAUME', 'MVULANA', 'MME' ];
        return $male_gender;

    }
}



if (! function_exists('female_gender')) {
    function female_gender()
    {
        $female_gender = ['FEMALE', 'F', 'KE', 'MWANAMKE', 'MSICHANA', 'MKE' ];
        return $female_gender;

    }
}

if (! function_exists('people_name_validation')) {
    function people_name_validation($string)
    {
        $name = preg_replace('/[^A-Za-z\']/', '', $string);
        return $name;

    }
}


if (! function_exists('remove_thousands_separator')) {
    function remove_thousands_separator($value)
    {
        $value = str_replace(",", "",   $value);
        return $value;

    }
}

if (! function_exists("single_space")) {
    function single_space($input) {
        $input = preg_replace('!\s+!', ' ', trim($input));
        return $input;
    }
}

if (! function_exists("no_space")) {
    function no_space($input) {
        $input = preg_replace('!\s+!', '', trim($input));
        return $input;
    }
}

if (! function_exists('checksum')) {
    /**
     * @author Mathayo Mihayo
     * upgraded by Erick Chrysostom (To restrict the checksum repeated sequence)
     * Add a checksum and padding for a given ID
     * @param $id
     * @param $pad_length
     * @return string
     */
    function checksum($id, $pad_length)
    {
        $number = $id;
        $list = "542316798";
        $sum = 0;
        do {
            $sum += $number % 10;
        }
        while ($number = (int) $number / 10);
        $check = $sum % 10;
        $check = $check + 3;
        $check = $check % 10;
        if($check == 0)
        {
            //$check = 1;
        }
        if ($id % 2 == 0) {
            /* It is even */
            if($check == 0)
            {
                $check = 7;
            }
            $check = substr($list, $check - 1, 1);
        } else {
            /* It is odd */
            if($check == 0)
            {
                $check = -2;
            }
            $check = substr($list, $check * -1, 1);
        }
        $padding = str_pad($id, $pad_length, '00', STR_PAD_LEFT);
        return $check.$padding;
    }
}

if (! function_exists('checksumNotificationNo')) {

    function checksumNotificationNo($id, $pad_length)
    {
        $number = $id;
        $list = "542316798";
        $sum = 0;
        do {
            $sum += $number % 10;
        }
        while ($number = (int) $number / 10);
        $check = $sum % 10;
        $check = $check + 3;
        $check = $check % 10;
        if($check == 0)
        {
            //$check = 1;
        }
        if ($id % 2 == 0) {
            /* It is even */
            if($check == 0)
            {
                $check = 7;
            }
            $check = substr($list, $check - 1, 1);
        } else {
            /* It is odd */
            if($check == 0)
            {
                $check = -2;
            }
            $check = substr($list, $check * -1, 1);
        }
        $padding = str_pad($id, $pad_length, '00', STR_PAD_LEFT);
        return $check.$padding;
    }
}

/**
 * Depreciated
 */

if (! function_exists('checkIfDateExceedWCFStart')) {

    function checkIfDateExceedWCFStart($date)
    {
        $wcf_start = Carbon::create(2016,07,01);
        if ((Carbon::parse($date)->format('Y-n-j')) >= Carbon::parse($wcf_start)->format('Y-n-j')) {
            return 1;
        }else{
            return 0;
        }

    }
}

if (! function_exists('getWCFStartDate')) {

    function getWCFStartDate()
    {
        //WCF Statutory Period
        return Carbon::create(2016,07,01)->format('Y-n-j');

    }
}

if (! function_exists('getWCFLaunchDate')) {

    function getWCFLaunchDate()
    {
        return Carbon::create(2015,07,01)->format('Y-n-j');

    }
}

if (! function_exists('getTodayDate')) {

    function getTodayDate()
    {
        return Carbon::now()->format('Y-n-j');

    }
}




if (! function_exists('fix_form_date')) {
    function fix_form_date($date)
    {
        try {
            $myDateTime = DateTime::createFromFormat('Y-n-j', $date);
            $return = $myDateTime->format('Y-m-d');
        } catch (Exception $e) {
            $return = $date;
        } finally {

        }
        return $return;
    }
}


/* Electronic Electronic receipt start Start Date  */

if (! function_exists('getElectronicReceiptStartDate')) {

    function getElectronicReceiptStartDate()
    {
        return Carbon::create(2017,07,01)->format('Y-n-j');

    }
}


/* Electronic Claim Start Date  */

if (! function_exists('getClaimStartDate')) {

    function getClaimStartDate()
    {
        return Carbon::create(2017,07,01)->format('Y-n-j');

    }
}

if (! function_exists('fin_year')) {
    /**
     * Access (lol) the Audit:: facade as a simple function.
     *
     * @param int $id
     * @return \Illuminate\Foundation\Application|mixed
     */
    function fin_year($id = -1)
    {
        $arg = [$id];
        return app('fin_year', $arg);
    }
}

if (! function_exists('financial_year')) {
    function financial_year($id = -1)
    {
        $return = fin_year($id)->year();
        return $return;
    }
}

if (! function_exists('financial_year_start')) {
    function financial_year_start($id = -1)
    {
        $return = fin_year($id)->startDate();
        return $return;
    }
}

if (! function_exists('financial_year_end')) {
    function financial_year_end($id = -1)
    {
        $return = fin_year($id)->endDate();
        return $return;
    }
}

if (! function_exists('prev_financial_year_end')) {
    function prev_financial_year_end()
    {
        $financial_year_start = financial_year_start();
        $financial_year_start = Carbon::parse($financial_year_start);
        $prev_financial_year_end =  $financial_year_start->subMonth(1);
        return $prev_financial_year_end;
    }
}

if (! function_exists('summary_period')) {
    function summary_period()
    {
        //Last 12 months (Including current employer)
        return 11;
    }
}

if (! function_exists('summary_period_description')) {
    function summary_period_description()
    {
        //Last 12 months (Including current employer)
        return trans('labels.general.last') . ' ' . (summary_period() + 1) . ' ' . trans('labels.general.months') ;
    }
}

if (! function_exists('summary_date_start')) {
    function summary_date_start()
    {
        $date_now = Carbon::now();
        $summary_date_start =  $date_now->subMonth(summary_period());
        $summary_date_start = $summary_date_start->firstOfMonth();
        $summary_date_start = Carbon::parse($summary_date_start)->format('Y-n-j');
        return $summary_date_start;
    }
}

if (! function_exists('summary_date_end')) {
    function summary_date_end()
    {
        $date_now = Carbon::now();
        $summary_date_end =      $date_now->lastOfMonth();
        $summary_date_end = Carbon::parse($summary_date_end)->format('Y-n-j');
        return $summary_date_end;
    }
}

if (! function_exists('excel_to_unix_date')) {
    function excel_to_unix_date($excel_date)
    {
        //$unix_date = ($excel_date - 25569) * 86400;
        //$return = gmdate("Y-m-d", $excel_date);
        $return = \PHPExcel_Style_NumberFormat::toFormattedString($excel_date, 'YYYY-MM-DD');
        return $return;
    }
}

if (! function_exists('unix_to_excel_date')) {
    function unix_to_excel_date($unix_date)
    {
        $excel_date = 25569 + ($unix_date / 86400);
        return $excel_date;
    }
}

if (! function_exists('check_foreign_key_constraint_fails')) {
    function check_foreign_key_constraint_fails($error_code)
    {
        if ($error_code  = '23000'){
            throw new \App\Exceptions\GeneralException(trans('exceptions.general.can_not_delete_foreign_key'));
        }
    }
}



if (! function_exists('phone_255')) {
    function phone_255($phone)
    {
        return phone($phone, ['TZ'])->formatE164();
//        return \Propaganistas\LaravelPhone\PhoneNumber::phone($phone, 'TZ')->formatE164();
    }
}

/* Number format with 2 decimal places with thousands separator 10,000.00*/

// if (! function_exists('number_2_format')) {
//     function number_2_format($value)
//     {
//         return  number_format( $value , 2, '.' , ',' );
//     }
// }

if (!function_exists('number_2_format')) {
    function number_2_format($value)
    {
        $floatValue = floatval($value);
        return number_format($floatValue, 2, '.', ',');
    }
}



/* Number format with no decimal places with thousands separator 10,000 */

if (! function_exists('number_0_format')) {
    function number_0_format($value)
    {
        return  number_format( $value , 0, '.' , ',' );
    }
}

/**
 * Format number if not having decimal number just floor it and vice versa
 */
if (!function_exists('number_format_with_decimal_place')) {
    function number_format_with_decimal_place($number) {
        $number = $number + 0;
        $diff = ceil($number) - floor($number);
        if($diff == 0){
            return number_0_format($number);
        }else{
            return $number;
        }
    }
}
/**
 * Format number without round off to specified decimal places
 */
if (!function_exists('number_format_without_round_off')) {
    function number_format_without_round_off($number, $decimal_places =2) {
        $formattedValue = bcdiv($number, '1', $decimal_places);
        return $formattedValue;
    }
}


if (! function_exists('pg_mac_main')) {
    function pg_mac_main()
    {
        return env('DB_PGMAIN_SCHEMA');
    }
}

if (! function_exists('pg_mac_portal')) {
    function pg_mac_portal()
    {
        return env('DB_PGPORTAL_SCHEMA');
    }
}

if (! function_exists('pg_hcp_portal')) {
    function pg_hcp_portal()
    {
        return env('DB_PGHCP_SCHEMA');
    }
}




/* Age limit for Dependent types On DOB*/

if (! function_exists('get_wife_age_limit')) {
    function get_wife_age_limit()
    {
        return 12;
    }
}

if (! function_exists('get_husband_age_limit')) {
    function get_husband_age_limit()
    {
        return 18;
    }
}

if (! function_exists('get_mother_age_limit')) {
    function get_mother_age_limit()
    {
        return 26;
    }
}


if (! function_exists('get_father_age_limit')) {
    function get_father_age_limit()
    {
        return 36;
    }
}


if (! function_exists('get_grand_parent_age_limit')) {
    function get_grand_parent_age_limit()
    {
        return 41;
    }
}



if (! function_exists('get_constant_care_age_limit')) {
    function get_constant_care_age_limit()
    {
        return 15;
    }
}

if (! function_exists('get_employee_age_limit')) {
    function get_employee_age_limit()
    {
        return 15;
    }
}

/*end of age limit for dependent types*/

/*Standard format date format Y-m-j for storing in the database*/
if (! function_exists('standard_date_format')) {
    function standard_date_format($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-n-j');
    }
}

/*short date format D-M-Y*/
if (! function_exists('short_date_format')) {
    function short_date_format($date)
    {
        if($date){
            return Carbon::parse($date)->format('d-M-Y');
        }else{
            return null;
        }

    }
}

/*Month Year date format D-M-Y*/
if (! function_exists('month_year_date_format')) {
    function month_year_date_format($date)
    {
        if($date){
            return \Carbon\Carbon::parse($date)->format('M-Y');
        }else{
            return '';
        }
    }
}

/*comparable date format D-M-Y*/
if (! function_exists('comparable_date_format')) {
    function comparable_date_format($date)
    {
        $standard_format = standard_date_format($date);
        return strtotime($standard_format);
    }
}

/**
 * Numeric format for comparison to two decimal places
 */
if (! function_exists('comparable_numeric_format')) {
    function comparable_numeric_format($value)
    {
        return remove_thousands_separator(number_2_format($value));
    }
}

if (! function_exists('now_date')) {
    function now_date()
    {
        return Carbon::now()->format("d-M-Y g:i:s A");
    }
}

/*start date format D-M-Y*/
if (! function_exists('start_of_the_current_month')) {
    function start_of_the_current_month()
    {
        return \Carbon\Carbon::parse(getTodayDate())->startOfMonth();

    }
}

/*end month date format D-M-Y*/
if (! function_exists('end_of_the_current_month')) {
    function end_of_the_current_month()
    {
        return \Carbon\Carbon::parse(getTodayDate())->endOfMonth();

    }
}

/*Cu off date for Start using MAC - ERP integration*/
if (! function_exists('erp_start_date')) {
    function erp_start_date()
    {
        $date = '2019-Apr-23';
        return standard_date_format($date);
    }
}


/*Get private percent contribution*/
if (! function_exists('private_contrib_percent')) {
    function private_contrib_percent()
    {
        $percent = sysdefs()->data()->private_contribution_percent;
        return $percent;
    }
}

/*Get public percent contribution*/
if (! function_exists('public_contrib_percent')) {
    function public_contrib_percent()
    {
        $percent =sysdefs()->data()->public_contribution_percent;
        return $percent;
    }
}


/**
 * Check user's full designation i.e. unit and designation
 */
if (! function_exists('checkUserDesignation')) {
    function checkUserDesignation($unit, $designation)
    {
        $user = access()->user();
        if(($user->unit_id == $unit) && ($user->designation_id == $designation))
        {
            return true;
        }else{
            return false;
        }
    }
}

function renderVariable($text) {
    return preg_replace_callback('/@\(\"([^"]+)\"\)/', function($matches) {
        return $matches[1];
    }, $text);
}

function renderDescription($text) {
    //Evaluate all trans functions as PHP
    //We don't want to use eval() for security reasons so we're explicitly converting trans cases
    return preg_replace_callback('/trans\(\"([^"]+)\"\)/', function($matches) {
        return trans($matches[1]);
    }, $text);
}

/**
 * Exception $e
 */
if (! function_exists('log_error')) {
    function log_error(Exception $e)
    {
        \Illuminate\Support\Facades\Log::error('[' . $e->getCode() . '] ' . $e->getMessage() . ' on line ' . @$e->getTrace()[0]['line'] . ' of file ' . @$e->getTrace()[0]['file']);
    }
}



/*
 * truncate to n characters of string
 */
if(! function_exists('truncateString')) {
    function truncateString($string, $stringLimit = 300){
        return str_limit($string, $stringLimit, $end = "...");
    }
}

/**
 *
 */
if (! function_exists('sw_month')) {
    function sw_month()
    {
        return [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Machi',
            4 => 'Aprili',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Julai',
            8 => 'Agosti',
            9 => 'Septemba',
            10 => 'Oktoba',
            11 => 'Novemba',
            12 => 'Desemba',
        ];
    }
}

if (! function_exists('en_month')) {
    function en_month()
    {
        return [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];
    }
}

if (! function_exists('sw_date')) {
    function sw_date($date = NULL)
    {
        if (!$date) {
            $carbonInstance = Carbon::now();
        } else {
            $carbonInstance = Carbon::parse($date);
        }
        return $carbonInstance->format("d ") . sw_month()[$carbonInstance->format("n")] . $carbonInstance->format(" Y");
    }
}

if (! function_exists('sw_date_month')) {
    function sw_date_month($date = NULL)
    {
        if (!$date) {
            $carbonInstance = Carbon::now();
        } else {
            $carbonInstance = Carbon::parse($date);
        }
        return sw_month()[$carbonInstance->format("n")] . $carbonInstance->format(" Y");
    }
}

/*Months to alert payroll beneficiary need verification*/
if (! function_exists('payroll_verification_alert_months')) {
    function payroll_verification_alert_months()
    {
        return 2;
    }
}

/*Total months for next verification - Period for beneficiary to re-verify*/
if (! function_exists('payroll_verification_limit_months')) {
    function payroll_verification_limit_months()
    {
        return 12;
    }
}


/*Months to alert pensioner need pd-reassessment*/
if (! function_exists('pensioner_reassessment_alert_months')) {
    function pensioner_reassessment_alert_months()
    {
        return 3;
    }
}

/*Total months for next re-assessment - Period for pensioner to be reassessed*/
if (! function_exists('pensioner_reassessment_limit_months')) {
    function pensioner_reassessment_limit_months()
    {
        return 24;
    }
}


/*Get month name from integer*/
if (! function_exists('month_name_from_int')) {
    function month_name_from_int($month_num)
    {
        $dateObj   = DateTime::createFromFormat('!m', $month_num);
        $monthName = $dateObj->format('F');
        return $monthName;
    }
}


if (! function_exists("remove_all_white_spaces")) {
    function remove_all_white_spaces($value) {
        $value =  preg_replace('/\s+/', '', $value );
        return $value;
    }
}


if (! function_exists("remove_extra_white_spaces")) {
    function remove_extra_white_spaces($value) {
        $value =  preg_replace('/\s+/', ' ', $value );
        return $value;
    }
}





if (!function_exists('proper_case_word')) {
    function proper_case_word($string) {
        $string = strtolower(remove_extra_white_spaces($string));
        return  ucwords($string);
    }
}


if (!function_exists('append_zero_before_num')) {
    function append_zero_before_num($num, $digit) {
        $num_added_zero= sprintf("%0" .$digit . "d", $num);
        return  $num_added_zero;
    }
}


/*
 * truncate to n characters of string
 */
if(! function_exists('truncateString')) {
    function truncateString($string, $stringLimit = 300){
        return str_limit($string, $stringLimit, $end = "...");
    }
}

if(! function_exists('camelToWord')) {
    function camelToWord($string){
        return ucwords(str_replace(['-', '_'], ' ', $string));
    }
}

/**
 * Remove everything after last occurrence of this character
 */
if(! function_exists('')) {
    function remove_after_last_this_character($character, $string){
        return preg_replace('#\/[^'. $character. ']*$#', '', $string);
    }
}

/*Get string after last occurence of this char*/
if (!function_exists('get_string_after_last_char')) {
    function get_string_after_last_char($string, $char) {

        return substr(strrchr($string, $char), 1);
    }
}


/*Small helper to put description or instruction on form inputs*/
if (!function_exists('small_helper')) {
    function small_helper($helper)
    {
        return '<small style="color:grey;">' . $helper . '</small>';
    }
}


if (!function_exists('compliance_start_end_month_date')) {
    function compliance_start_end_month_date($date, $isreverse = 0)
    {
        $date_parse = Carbon::parse($date);
        $date_day = $date_parse->format('j');
        if ($isreverse == 0) {
            if ($date_day >= 1 && $date_day <= 15) {
                $date = $date_parse->startOfMonth();
            } else {
                $date = $date_parse->endOfMonth();
            }
        } else {
            /*If reverse - default is ground to floor*/
            if ($date_day >= 1 && $date_day <= 15) {
                $date = $date_parse->endOfMonth();
            } else {
                $date = $date_parse->startOfMonth();
            }
        }

        return $date;
    }
}


if (!function_exists('member_type_name')) {
    function member_type_name($member_type_id)
    {
        $member_type = \App\Models\Operation\Claim\MemberType::query()->find($member_type_id);
        return isset($member_type) ? $member_type->name : '';
    }
}

if (!function_exists('implode_collection_name')) {
    /**
     * Return an strings separated by commas
     * separated by commas e.g Dsm, Morogoro, Arusha
     *
     * @param $parameter
     * @return array
     */
    function implode_collection_name($collection) {
//        dd($collection);
        $output = [];
        foreach ($collection as $parameter) {

            array_push($output, $parameter->name);
        }
        return implode(", ", $output);
    }

}



if (!function_exists('log_info')) {
    function log_info($output) {
        \Illuminate\Support\Facades\Log::info(print_r($output,true));

    }
}


/*Remove last this char*/
if (!function_exists('remove_last_this_char')) {
    function remove_last_this_char($string, $char) {
        $last_char = substr($string, -1, 1);
        if($last_char == $char){
            $string = substr($string, 0, -1);
        }
        return $string;
    }
}


/*Remove first this char*/
if (!function_exists('remove_first_this_char')) {
    function remove_first_this_char($string, $char) {
        $first_char = substr($string, 0, 1);
        if($first_char == $char){
            $string = substr($string, 1);
        }
        return $string;
    }
}

if (!function_exists('sanitize_string')) {
    function sanitize_string($string): array|string|null
    {
        // Remove special characters except for those necessary for SQL
        $string = preg_replace('/[\'";(){}<>=%]/', '', $string);

        // Convert to lowercase to handle case insensitivity
        $string = strtolower($string);

        // List of forbidden SQL keywords
        $forbidden = [
            'select', 'insert', 'update', 'delete', 'drop', 'alter', 'create', 'truncate',
            'and', 'or', 'not', 'union', 'where', 'like', 'regexp', 'into', 'load_file', 'outfile'
        ];

        // Remove forbidden SQL keywords
        foreach ($forbidden as $keyword) {
            $pattern = '/\b' . preg_quote($keyword, '/') . '\b/';
            $string = preg_replace($pattern, '', $string);
        }

        return $string;
    }
}

if (!function_exists('check_if_is_non_number_column')) {
    function check_if_is_non_number_column($column_name) {
        $column_name = remove_extra_white_spaces($column_name);
        $column_name = remove_first_this_char($column_name, ' ');
        $column_name = remove_last_this_char($column_name, ' ');
        $column_name = strtolower($column_name);
        $non_number_headers =[ 'tin', 'employee\'s tin','national','national_id','wcf_no', 'wcf no', 'accountno', 'bank accountno', 'bank account no.'];
        $check = in_array($column_name, $non_number_headers);

//        dd($check);
        if($check == true)
        {
            return true;
        }else{
            return false;
        }
    }
}



if (!function_exists('commitment_path')) {

    function commitment_path() {
        /**
         *
         */
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR .'commitment_bank_attachments';

    }
}

if (!function_exists('commitment_mou_path')) {

    function commitment_mou_path() {
        /**
         *
         */
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR .'commitment_mou_attachments';

    }
}


/*Optional Required Request*/
if (! function_exists('optionalRequiredRequest')) {

    function optionalRequiredRequest($key, $input)
    {
        if(array_key_exists($key, $input)) {
            $array = [
                $key => 'required'
            ];
        }else{
            $array = [];
        }
        return $array;

    }
}


/*Optional Required Request*/
if (! function_exists('format_date_salary_eligible')) {

    function format_date_salary_eligible($date)
    {
        $date_parse = Carbon::parse($date);
        if($date_parse->format('j') < 15){
            $date_parse = $date_parse->startOfMonth();
        }else{
            $date_parse = $date_parse->endOfMonth();
        }
        return standard_date_format($date_parse);

    }
}
/*inspection url portal*/
if (! function_exists('portal_inspection_url_index')) {

    function portal_inspection_url_index($employer_id)
    {
        return env('PORTAL_APP_URL')."/manage/organization/index/".$employer_id;

    }
}
if (! function_exists('array_sort')) {
    function array_sort($array, $on, $order=SORT_DESC){

        $new_array = array();
        $sortable_array = array();

        if (!empty($array)) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }
}

if (!function_exists('numToOrdinalWord')) {
    /**
     * Determines if number needs to be converted to words
     */
    function numToOrdinalWord($num)
    {
        $first_word = array('eth','First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Ninth','Tenth','Eleventh','Twelfth','Thirteenth','Fourteenth','Fifteenth','Sixteenth','Seventeenth','Eighteenth','Nineteenth','Twentieth');
        $second_word =array('','','Twenty','Thirty','Forty','Fifty');

        if($num <= 20)
            return $first_word[$num];

        $first_num = substr($num,-1,1);
        $second_num = substr($num,-2,1);

        return $string = str_replace('y-eth','ieth',$second_word[$second_num].'-'.$first_word[$first_num]);
    }
}



if (!function_exists('employer_payroll_merge_path')) {

    function employer_payroll_merge_path() {
        if (test_uri()) {
            return asset('/storage/employer_registration/payroll_merging');
        } else {
            return asset('/public/storage/employer_registration/payroll_merging');
        }
    }

}

if (!function_exists('percent_helper')) {

    function percent_helper($number, $total) {
        $percent = 0;
        if($number > 0 and $total > 0){
            $percent = ($number / $total) * 100;
            $percent = round($percent, 2);
        }

        return $percent;
    }

}

if (!function_exists('payroll_deduction_cap_percent')) {

    function payroll_deduction_cap_percent() {

        return 30;
    }

}


if (!function_exists('is_decimal')) {

    function is_decimal($value) {

        return is_numeric( $value ) && floor( $value ) != $value;
    }

}



/**
 * Autoselect first option if there is only one option
 */
if (!function_exists('autoselect_first_option')){
    function autoselect_first_option($select_options){

        return  (!empty($select_options) && (count($select_options) == 1)) ? array_keys($select_options->toArray())[0] : null;
    }
}


/*Mb to kb*/
if (!function_exists('mb_to_kb')) {
    function mb_to_kb() {
        return  1024;
    }
}

/*General maximum file size upload i.e. max_size in MB*/
if (!function_exists('max_file_size_upload_kb')) {
    function max_file_size_upload_kb($max_size = 1) {
        return  mb_to_kb() * $max_size;
    }
}


/* current status of claim reviews, need to redesign, put it in seeder*/
if (!function_exists('current_status')) {
    function current_status($status) {
        $review = "";
        switch ($status) {
            case 1:
                $review = "Pending Independent assessment";
                break;
            case 2:
                $review = "Pending GME verification";
                break;
            case 3:
                $review = "Pending Review MAP report";
                break;
            case 4:
               // $review = "Submitted for decision to be communicated to the Applicant";
                $review = "Pending Hearing Report";
                break;
            case 5:
                $review = "Applicant not attended";
                break;
            case 6:
                $review = "Pending Review Report";
                break;
            case 7:
                $review = "Need remedial treatment";
                break;
            case 8:
                $review = "Report submitted pending DG approval";
                break;
            case 9:
                $review = "Pending review hearing";
                break;

            default:
                # code...
                break;
        }

        return $review;
    }


}




/*Code value - Repo*/

if (!function_exists('code_value')) {
    function code_value() {
        return (new \App\Repositories\Backend\Sysdef\CodeValueRepository());
    }
}

/*Start date for closure by payroll*/
if (!function_exists('closure_by_payroll_start_date')) {
    function closure_by_payroll_start_date() {
        return '2022-07-01';
    }
}

/*Start date for closure by payroll*/
if (!function_exists('booking_payroll_start_date')) {
    function booking_payroll_start_date() {
        return '2023-07-01';
    }
}


/*Today's date*/
if (! function_exists('boolean_label')) {

    function boolean_label($val)
    {
        return ($val == 1) ? __('label.yes') : __('label.no');

    }
}

if (! function_exists('boolean_badge')) {

    function boolean_badge($val)
    {
        return ($val == 1) ?  "<span class='tag tag-success'>" .  'Yes' .  "</span>" : "<span class='tag tag-warning'>" .  'No' .  "</span>";

    }
}


if (! function_exists('badge_label')) {

    function badge_label($label, $color = 'success')
    {
        $color = 'tag-' . $color;
        return "<span class='tag " . $color. "'>" .  $label .  "</span>";

    }
}

if (! function_exists('string_bold')) {

    function string_bold($value)
    {
        return '<b>' . $value . '</b>';

    }
}


if (! function_exists('convert_number_to_roman')) {

    function convert_number_to_roman($number)
    {
        $number_converter = [
            '1' => 'i',    '2' => 'ii',    '3' => 'iii',    '4' => 'iv',    '5' => 'v',    '6' => 'vi',    '7' => 'vii',    '8' => 'viii',    '9' => 'ix',    '10' => 'x'
        ];
        $roman = $number_converter[$number] ?? $number;

        return $roman;

    }
}

if (! function_exists('stringify_with_quote')) {
    function stringify_with_quote($string){
        return '\'' . $string. '\'';
    }
}

if (! function_exists('check_if_db_table_exists')) {
    function check_if_db_table_exists($table){
        $cols =  \Illuminate\Support\Facades\DB::getSchemaBuilder()->getColumnListing($table);
        if($cols){
      return true;
        }else{
            return false;
        }
    }
}


if (!function_exists('get_table_columns_array')) {
    function get_table_columns_array($table_name) {
        $col_arr = [];
        $cols =  \Illuminate\Support\Facades\DB::getSchemaBuilder()->getColumnListing($table_name);
        return $cols;
    }
}

if (!function_exists('medical_bill_dir')) {
    function medical_bill_dir() {
        // return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'medical_bills';
        return public_path('storage/medical_bills');
    }
}

if (!function_exists('verification_plan_dir')) {
    function verification_plan_dir() {
        return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'verification_plan';
    }
}

/**Financial Year Quarter methods */
if (! function_exists('activeQuarter')) {

    function activeQuarter()
    {
        $month = (int)Carbon::parse(Carbon::now())->format('m');
        switch (true){
            case in_array($month, [7,8,9]):
                return 1;
                break;

            case in_array($month, [10,11,12]):
                return 2;
                break;

            case in_array($month, [1,2,3]):
                return 3;
                break;

            case in_array($month, [4,5,6]):
                return 4;
                break;
        };

    }
}


/**
 * return total accrued amount
 */
if (! function_exists('getTotalAccruedAmount')) {
    function getTotalAccruedAmount($member_type_id, $type)
    {
        return number_2_format((new PensionAccrualRepository())->getTotalAccruedAmount($member_type_id, $type));
    }
}


if (!function_exists('get_number_from_string')) {
    function get_number_from_string($string)
    {
        if (preg_match('/\d+(\.\d+)?/', $string, $matches)) {
            $number = $matches[0];
            return $number;
        } else {
            return null;
        }
    }
}


if (!function_exists('allow_to_edit_time_general')) {
    function allow_to_edit_time_general($target_date, $allowed_days)
    {
$cut_off_date = Carbon::parse($target_date)->addDays($allowed_days);
        if(comparable_date_format(getTodayDate()) <= comparable_date_format($cut_off_date)){
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('generateFacilityId')) {
    function generateFacilityId()
    {
        $facility = HcpHspFacility::orderBy('id', 'DESC')->first();
        $last_id = $facility ? $facility->id : 0;
        do {
            $new_id = $last_id + 1;
            $exists = HcpHspFacility::where('id', $new_id)->exists();
            if (!$exists) {
                break;
            } else {
                $last_id++;
            }
        } while ($exists);
        return $new_id;

    }

    if (!function_exists('review_dir')) {
        function review_dir() {
            return public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'reviews';
        }
    }
}


if (!function_exists('get_model_name')) {
    function get_model_name($resource_type)
    {
        $model_name = get_string_after_last_char($resource_type,"\'");
        return $model_name;
    }
}


/*Return maximum date among the two dates*/
if (! function_exists('return_max_date')) {
    function return_max_date($date1, $date2)
    {
        if($date1 and !$date2) return $date1;
        if($date2 and !$date1) return $date2;

        return comparable_date_format($date1) > comparable_date_format($date2) ? $date1 : $date2;
    }
}
