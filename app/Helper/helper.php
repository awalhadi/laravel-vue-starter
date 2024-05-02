<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Utils\PriceFormatter;

if (!function_exists('formateDate')) {
  /**
   * formateDate
   *
   * @param mixed $date
   * @param bool $withTime
   *
   * @return string
   */

  function formateDate($date, $withTime = false)
  {
    if ($withTime) {
      return \Carbon\Carbon::parse($date)->format(config('system.datetime_format'));
    }
    return \Carbon\Carbon::parse($date)->format(config('system.date_format'));
  }
}



if (!function_exists('formateDateFromCarbon')) {
  /**
   * custom_datetime
   *
   * @param string $format
   * @param mixed $datetime
   *
   * @return mixed
   */
  function formateDateFromCarbon($format = "Y-m-d g:i a", $datetime = null)
  {
    return Carbon::parse($datetime ?? now())->format($format);
  }
}


if (!function_exists('getUrl')) {
  /**
   * getUrl
   *
   * @param mixed $url
   * @param string $type
   *
   * @return string
   */

  function getUrl($filePath = null)
  {
    $disk = config('filesystems.default', 'public');
    if ($filePath !== null && $filePath !== '' && Storage::disk($disk)->exists($filePath)) {
      return Storage::disk($disk)->url($filePath);
    } else {
      if (config('settings.default_logo') && Storage::disk($disk)->exists(config('settings.default_logo'))) {
        return Storage::disk($disk)->url(config('settings.default_logo'));
      }
      return getDefaultLogo();
    }
  }
}
if (!function_exists('isJson')) {
  /**
   * storageLink
   *
   * @param mixed $url
   * @param string $type
   *
   * @return string
   */

  function isJson($string)
  {
    // dd(gettype($string));
    if (gettype($string) == 'array' || gettype($string) == 'object') {
      return false;
    }
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
  }
}

if (!function_exists('downloadableLink')) {
  /**
   * downloadableLink
   */

  function downloadableLink($url, $disk = null)
  {
    $disk = $disk ?? config('filesystems.default', 'public');
    return Storage::disk($disk)->url($url);
  }
}


if (!function_exists('deleteFileFromStorage')) {
  /**
   * deleteFileFromStorage
   */

  function deleteFileFromStorage($url, $disk = null)
  {
    // If disk is not specified, use the default disk from the environment variable
    $disk = $disk ?? config('filesystems.default', 'public');

    if (Storage::disk($disk)->exists($url)) {
      Storage::disk($disk)->delete($url);
      return true;
    }

    return false;
  }
}

if (!function_exists('getStorageImage')) {

  function getStorageImage($name = '', $is_user = false, $type = 'default')
  {
    $disk = config('filesystems.default', 'public');
    if ($name && $name !== null && Storage::disk($disk)->exists($name)) {
      return Storage::disk($disk)->url($name);
    }

    if ($is_user) {
        return getUserDefaultImage();
    }

    switch ($type) {
        case 'logo':
            return getDefaultLogo();
        case 'favicon':
            return getDefaultFavicon();
        case 'wide_logo':
            return getDefaultWideLogo();
        default:
            return getDefaultImage();
    }
  }
}

if (!function_exists('getStorageFile')) {

  function getStorageFile($name = null)
  {
    $disk = config('filesystems.default', 'public');
    if ($name && Storage::disk($disk)->exists($name)) {
      return Storage::disk($disk)->url($name);
    }
    return null;
  }
}

if (!function_exists('getDefaultFavicon')) {
  function getDefaultFavicon()
  {
    return asset('images/default/favicon-180x180.png');
  }
}

function getDefaultWideLogo()
{
  return asset('images/default/default_logo.png');
}
function getDefaultLogo()
{
  return asset('images/default/logo-sm.png');
}
function getDefaultImage()
{
  return asset('images/default/default.png');
}
function getUserDefaultImage()
{
  return asset('images/default/user_default.png');
}

if (!function_exists('getRandomNumber')) {
  /**
   * getRandomNumber
   *
   * @param int $length
   *
   * @return string
   */

  function getRandomNumber($length = 8)
  {
    $characters = '0123456789';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
  }
}


if (!function_exists('checkPermission')) {
  /**
   * checkPermission
   *
   * @param mixed $permissions
   *
   * @return void
   */

  function checkPermission($permissions)
  {
    if (!auth()->user()->can($permissions)) {
      abort(403);
    }
  }
}


if (!function_exists('prefixGenerator')) {
  /**
   * prefixGenerator
   *
   * @param Model $model
   * @param string $prefix
   *
   * @return string
   */

  function prefixGenerator(Model $model, $prefix = 'IC-')
  {
    $countNumber = $model::count();
    return $prefix . sprintf('%06d', $countNumber + 1);
  }
}


if (!function_exists('getToday')) {
  /**
   * getToday
   *
   * @return mixed
   */

  function getToday()
  {
    return \Carbon\Carbon::parse(now())->format(config('system.date_format'));
  }
}

if (!function_exists('isActiveRoute')) {
  /**
   * isActiveRoute
   *
   * @return mixed
   */

  function isActiveRoute($parentRoute = false)
  {
    if (!$parentRoute) {
      return '';
    }

    if (is_array($parentRoute)) {
      foreach ($parentRoute as $route) {
        if (Route::is($route . '.index') || Route::is($route . '.create') || Route::is($route . '.edit')) {
          return 'mm-active';
        }
      }
      return '';
    } else {
      $status = Route::is($parentRoute . '.index') || Route::is($parentRoute . '.create') || Route::is($parentRoute . '.edit');
      if ($status) {
        return 'mm-active';
      }
      return '';
    }
  }
}


if (!function_exists('sendFlash')) {
  /**
   * sendFlash
   *
   * @param mixed $message
   * @param string $type
   *
   * @return void
   */

  function sendFlash($message, $type = 'success')
  {
    session()->flash($type, $message);
  }
}

if (!function_exists('systemSettings')) {
  /**
   * systemSettings
   *
   * @param string $columnName
   * @param string $configName
   *
   * @return string
   */
  function systemSettings($columnName = '', $configName = "settings")
  {
    if ($columnName == 'site_title') {
      return config($configName . '.' . $columnName, env('APP_NAME')) ?? '';
    }
    return config($configName . '.' . $columnName) ?? '';
  }
}

if (!function_exists('getPageMeta')) {
  /**
   * get_page_meta
   *
   * @param string $metaName
   *
   * @return mixed
   */
  function getPageMeta($metaName = "title", $default = "")
  {
    if (session()->has('page_meta_' . $metaName)) {
      $title = session()->get("page_meta_" . $metaName);
      //            session()->forget("page_meta_" . $metaName);
      return $title ?? $default;
    }
    return $default;
  }
}

if (!function_exists('backButtonURl')) {
  function backButtonURl()
  {
    if (session()->has('back_button_url')) {
      $url = session()->get("back_button_url");
      session()->forget("back_button_url");
      return $url;
    }
    //        return url()->previous();
    return null;
  }
}


if (!function_exists('setPageMeta')) {
  /**
   * set_page_meta
   *
   * @param null $content
   * @param string $metaName
   *
   * @return void
   */
  function setPageMeta($content = null, $metaName = "title")
  {
    if ($metaName == 'title') {
      session()->put('page_meta_header', $content);
    }
    session()->put('page_meta_' . $metaName, $content);
  }
}
if (!function_exists('generateSlug')) {
  function generateSlug($name, $slug = null)
  {
    try {
      if ($slug != null && $slug != '') :
        return str_replace(' ', '-', strtolower($slug));
      else :
        return preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($name))) . '-' . strtolower(Str::random(5));
      endif;
    } catch (\Exception $e) {
      logger($e);
      return '';
    }
  }
}

if (!function_exists('apiJsonResponse')) {
  /**
   * send api response
   *
   * @param string $status
   * @param array|null $data
   * @param string $message
   * @param integer $statusCode
   * @return response
   */
  function apiJsonResponse($status = 'success', $data = null, $message = '', $statusCode = 200)
  {
    return response()
      ->json([
        'status' => $status,
        'data' => $data ?? [],
        'message' => $message
      ], $statusCode);
  }
}


if (!function_exists('apiValidation')) {
  /**
   * validate api request
   *
   * @param Request $request
   * @param array $rule
   * @param array $attributes
   * @return void
   */
  function apiValidation(Request $request, $rule = [], $attributes = [])
  {
    $validator = Validator::make($request->all(), $rule, $attributes);
    if ($validator->fails()) {
      return apiJsonResponse('error', $validator->errors(), __('validation.default_message'), 422);
    } else {
      return null;
    }
  }
}


if (!function_exists('log_error')) {

  /**
   * Log error
   *
   * @param \Exception $e
   * @return void
   */
  function log_error(\Exception $e)
  {
    Log::error($e->getMessage());
  }
}

if (!function_exists('something_wrong_flash')) {

  /**
   * send flash message when error happened
   *
   * @param string|null $message
   * @return void
   */
  function something_wrong_flash($message = null)
  {
    Session::flash('error', $message ?? 'Something wrong!');
  }
}

if (!function_exists('all_timezones')) {
  function all_timezones()
  {
    if (Cache::has('all_timezones')) {
      $timezones = Cache::get('all_timezones');
    } else {
      Cache::put('all_timezones', config('system.timezone'), \Carbon\Carbon::now()->addMonth(1));
      $timezones = Cache::get('all_timezones');
    }
    return $timezones ?? [];
  }
}
if (!function_exists('all_currency')) {
  function all_currency()
  {
    if (Cache::has('all_currency')) {
      $timezones = Cache::get('all_currency');
    } else {
      Cache::put('all_currency', config('system.currency_list'), \Carbon\Carbon::now()->addMonth(1));
      $timezones = Cache::get('all_currency');
    }
    return $timezones ?? [];
  }
}

if (!function_exists('formatted_price')) {

  function formatted_price($price, $currency = 'USD', $precision = 2)
  {
    $formattedPrice = PriceFormatter::formatPrice($price, $currency, $precision);
  }
}


if (!function_exists('isAllChecked')) {
  function isAllChecked(array $parent, $childs)
  {
    $status = false;
    $childItems = $childs->pluck('id')->toArray();
    $result = array_intersect($parent, $childItems);
    if (count($result) == count($childItems)) {
      $status = true;
    }
    return $status;
  }
}

if (!function_exists('formatNumber')) {
  function formatNumber($number)
  {
    if ($number >= 1e12) {
      return sprintf("%.1fT", $number / 1e12);
    } elseif ($number >= 1e9) {
      return sprintf("%.1fB", $number / 1e9);
    } elseif ($number >= 1e6) {
      return sprintf("%.1fM", $number / 1e6);
    } elseif ($number >= 1e3) {
      return sprintf("%.1fk", $number / 1e3);
    }

    return $number;
  }
}

if (!function_exists('strLimit')) {
  function strLimit($string, $limit = 50)
  {
    return Str::limit($string, $limit);
  }
}


if (!function_exists('toggleClass')) {
  function toggleClass($disabled, $checked, $model, $column, $id, $route, $value, $altValue)
  {
    return '<input type="checkbox"' . $disabled . '
                 class="toggle-status-update"
                  id="' . $column . '_switch_' . $id . '"
                 switch="none"' . $checked . '
                 data-model="' . $model . '"
                 data-column="' . $column . '"
                 data-switch="success"
                 data-id="' . $id . '"
                 data-url="' . $route . '"
                 data-value="' . $value . '"
                 data-alt_value="' . $altValue . '
                 "/><label class="' . ($disabled == 'disabled' ? "not-allowed" : "") . '" for="' . $column . '_switch_' . $id . '" ></label>';
  }
}

if (!function_exists('getLocale')) {
  function getLocale()
  {
    return request()->header('locale') && array_key_exists(request()->header('locale'), config('app_custom_config.locales'))
      ? request()->header('locale')
      : config('app.locale');
  }
}

if (!function_exists('isDefaultLocale')) {
  function isDefaultLocale(): bool
  {
    $locale = getLocale();
    return $locale === null || $locale === 'en';
  }
}
