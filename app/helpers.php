<?php

use App\Models\Movie;
use Detection\MobileDetect;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

if (! function_exists('is_mobile')) {
    /**
     * @return bool returns true when device is mobile or tablet.
     */
    function is_mobile(): bool
    {
        $mobileDetect = new MobileDetect();

        if ($mobileDetect->isMobile() || $mobileDetect->isTablet()) {
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('is_desktop')) {
    /**
     * @return bool returns true when device is desktop
     */
    function is_desktop(): bool
    {
        $mobileDetect = new MobileDetect();

        if ($mobileDetect->isMobile() || $mobileDetect->isTablet()) {
            return false;
        } else {
            return true;
        }
    }
}

if (! function_exists('get_unique_id')) {
    /**
     * @param  string  $modelPath
     * @return string random string.
     */
    function get_unique_id(string $modelPath): string
    {
        do {
            $uniqueId = Str::random();

            $data = DB::table(table_name($modelPath))
                ->where('unique_id', $uniqueId)
                ->first();
        } while ($data);

        return $uniqueId;
    }
}

if (! function_exists('table_name')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function table_name(string $modelPath): string
    {
        return app($modelPath)->getTable();
    }
}

if (! function_exists('table_name_singular')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function table_name_singular(string $modelPath): string
    {
        return Str::singular(table_name($modelPath));
    }
}

if (! function_exists('find_many')) {
    /**
     * @param  string  $modelPath
     * @param  array  $uniqueIds
     * @return Collection
     */
    function find_many(string $modelPath, array $uniqueIds): Collection
    {
        return DB::table(table_name($modelPath))
            ->whereIn('unique_id', $uniqueIds)
            ->get();
    }
}

if (! function_exists('find_or_fail')) {
    /**
     * @param  string  $modelPath
     * @param  string  $uniqueId
     * @return object
     */
    function find_or_fail(string $modelPath, string $uniqueId): object
    {
        $model = DB::table(table_name($modelPath))
            ->where('unique_id', $uniqueId)
            ->first();

        if (! $model) {
            abort(404);
        }

        return $model;
    }
}

if (! function_exists('get_ids_from_unique_ids')) {
    /**
     * @param  string  $modelPath
     * @param  array  $uniqueIds
     * @return array
     */
    function get_ids_from_unique_ids(string $modelPath, array $uniqueIds): array
    {
        return find_many($modelPath, $uniqueIds)
            ->pluck('id')
            ->toArray();
    }
}

if (! function_exists('get_id_from_unique_id')) {
    /**
     * @param  string  $modelPath
     * @param  string  $uniqueId
     * @return string
     */
    function get_id_from_unique_id(string $modelPath, string $uniqueId): string
    {
        return find_or_fail($modelPath, $uniqueId)->id;
    }
}

if (! function_exists('view_any_permission')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function view_any_permission(string $modelPath): string
    {
        return 'view_any_'.table_name($modelPath);
    }
}

if (! function_exists('view_permission')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function view_permission(string $modelPath): string
    {
        return 'view_'.table_name_singular($modelPath);
    }
}

if (! function_exists('create_permission')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function create_permission(string $modelPath): string
    {
        return 'create_'.table_name_singular($modelPath);
    }
}

if (! function_exists('update_permission')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function update_permission(string $modelPath): string
    {
        return 'update_'.table_name_singular($modelPath);
    }
}

if (! function_exists('delete_permission')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function delete_permission(string $modelPath): string
    {
        return 'delete_'.table_name_singular($modelPath);
    }
}

if (! function_exists('view_any_permission_label')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function view_any_permission_label(string $modelPath): string
    {
        return 'view any '.snake_case_to_normal(table_name($modelPath));
    }
}

if (! function_exists('view_permission_label')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function view_permission_label(string $modelPath): string
    {
        return 'view '.snake_case_to_normal(table_name_singular($modelPath));
    }
}

if (! function_exists('create_permission_label')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function create_permission_label(string $modelPath): string
    {
        return 'create '.
            snake_case_to_normal(table_name_singular($modelPath));
    }
}

if (! function_exists('update_permission_label')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function update_permission_label(string $modelPath): string
    {
        return 'update '.
            snake_case_to_normal(table_name_singular($modelPath));
    }
}

if (! function_exists('delete_permission_label')) {
    /**
     * @param  string  $modelPath
     * @return string
     */
    function delete_permission_label(string $modelPath): string
    {
        return 'delete '.
            snake_case_to_normal(table_name_singular($modelPath));
    }
}

if (! function_exists('get_all_unique_ids')) {
    /**
     * @param  string  $modelPath
     * @return array
     */
    function get_all_unique_ids(string $modelPath): array
    {
        return DB::table(table_name($modelPath))
            ->pluck('unique_id')
            ->toArray();
    }
}

if (! function_exists('get_status_form_rule')) {
    /**
     * @return string[]
     */
    function get_status_form_rule(): array
    {
        return ['required', 'boolean'];
    }
}

if (! function_exists('kebab_case_to_normal')) {
    /**
     * @param  string|null  $string $string
     * @return string
     */
    function kebab_case_to_normal(?string $string): string
    {
        return str_replace('-', ' ', $string);
    }
}

if (! function_exists('snake_case_to_normal')) {
    /**
     * @param  string|null  $string $string
     * @return string
     */
    function snake_case_to_normal(?string $string): string
    {
        return str_replace('_', ' ', $string);
    }
}

if (! function_exists('snake_case_to_kebab')) {
    /**
     * @param  string|null  $string $string
     * @return string
     */
    function snake_case_to_kebab(?string $string): string
    {
        return str_replace('_', '-', $string);
    }
}

if (! function_exists('generate_route')) {
    /**
     * @param  string  $httpMethod
     * @param  string  $controllerPath
     * @param  string  $modelPath
     * @param  string  $permission
     * @param  string|null  $method
     */
    function generate_route(
        string $httpMethod,
        string $controllerPath,
        string $modelPath,
        string $permission,
        string $method = null
    ): void {
        $method = $method ?: $permission;

        if ($httpMethod === config('constants.method.get')) {
            $route = Route::get(
                generate_route_url($modelPath, $permission),
                get_controller_method($controllerPath, $method)
            );
        } elseif ($httpMethod === config('constants.method.post')) {
            $route = Route::post(
                generate_route_url($modelPath, $permission),
                get_controller_method($controllerPath, $method)
            );
        } elseif ($httpMethod === config('constants.method.put')) {
            $route = Route::put(
                generate_route_url($modelPath, $permission),
                get_controller_method($controllerPath, $method)
            );
        } elseif ($httpMethod === config('constants.method.delete')) {
            $route = Route::delete(
                generate_route_url($modelPath, $permission),
                get_controller_method($controllerPath, $method)
            );
        } else {
            $route = Route::patch(
                generate_route_url($modelPath, $permission),
                get_controller_method($controllerPath, $method)
            );
        }

        $route
            ->middleware('can:'.$permission)
            ->name(
                'admin.'.table_name($modelPath).'.'.Str::snake($method)
            );
    }
}

if (! function_exists('generate_route_url')) {
    /**
     * @param $modelPath
     * @param $permission
     * @return string
     */
    function generate_route_url($modelPath, $permission): string
    {
        return '/'.
            table_name($modelPath).
            '/{'.
            table_name_singular($modelPath).
            '}/'.
            snake_case_to_kebab($permission);
    }
}

if (! function_exists('get_controller_method')) {
    /**
     * @param  string  $controllerPath
     * @param  string  $permission
     * @return array
     */
    function get_controller_method(
        string $controllerPath,
        string $permission
    ): array {
        return [$controllerPath, Str::camel($permission)];
    }
}

if (! function_exists('get_unique_id_validation_rule')) {
    /**
     * @param  string  $modelPath
     * @return string[]
     */
    function get_unique_id_validation_rule(string $modelPath): array
    {
        return [
            'exists:'.$modelPath.',unique_id',
            'alpha_num',
            'size:16',
            'required',
            'distinct:strict',
        ];
    }
}

if (! function_exists('get_username_validation_rule')) {
    /**
     * @return string[]
     */
    function get_username_validation_rule(): array
    {
        return ['nullable', 'string', 'max:20'];
    }
}

if (! function_exists('get_unique_ids_validation_rule')) {
    /**
     * @param $modelPath
     * @return string[]
     */
    function get_unique_ids_validation_rule(): array
    {
        return ['required', 'array'];
    }
}

if (! function_exists('status')) {
    /**
     * @param  bool  $status
     * @return string
     */
    function status(bool $status): string
    {
        return $status ? 'Active' : 'Inactive';
    }
}

if (! function_exists('get_wp_image_url')) {
    /**
     * @param  string  $imageUrl
     * @param  int|null  $width
     * @param  int|null  $height
     * @return string
     */
    function get_wp_image_url(
        string $imageUrl,
        int $width = null,
        int $height = null
    ): string {
        if (config('app.env') === config('constants.env.local')) {
            return $imageUrl;
        } elseif ($width === null && $height === null) {
            return 'https://i0.wp.com/'.request()->getHost().$imageUrl;
        } else {
            return 'https://i0.wp.com/'.
                request()->getHost().
                "$imageUrl?w=$width&h=$height";
        }
    }
}

if (! function_exists('get_cropped_image_url')) {
    /**
     * @param  string  $imagePath
     * @param  int  $width
     * @param  int  $height
     * @return string
     */
    function get_cropped_image_url(
        string $imagePath,
        int $width,
        int $height
    ): string {
        if (config('app.env') === config('constants.env.local')) {
            return $imagePath;
        } else {
            return 'https://i0.wp.com/'.
                request()->getHost().
                "$imagePath?resize=$width%2C$height";
        }
    }
}

if (! function_exists('common_columns')) {
    /**
     * @param  Blueprint  $table
     */
    function common_columns(Blueprint $table): void
    {
        $table->string('unique_id')->unique();
        $table->boolean('status');
    }
}

if (! function_exists('paragraphs_to_string')) {
    /**
     * @param  array  $paragraphs
     * @return string
     */
    function paragraphs_to_string(array $paragraphs): string
    {
        $string = null;

        foreach ($paragraphs as $paragraph) {
            $string .= "<p>$paragraph</p>";
        }

        return $string;
    }
}

if (! function_exists('get_active')) {
    /**
     * @param  string  $modelPath
     * @return Collection
     */
    function get_active(string $modelPath): Collection
    {
        return DB::table(table_name($modelPath))
            ->where('status', '=', true)
            ->get();
    }
}

if (! function_exists('update_url')) {
    /**
     * @param  object  $model
     * @return string
     */
    function update_url(object $model): string
    {
        return route(
            'admin.'.snake_case_to_kebab($model->getTable()).'.update',
            [
                Str::singular($model->getTable()) => $model,
            ]
        );
    }
}

if (! function_exists('edit_url')) {
    /**
     * @param  object  $model
     * @return string
     */
    function edit_url(object $model): string
    {
        return route(
            'admin.'.snake_case_to_kebab($model->getTable()).'.edit',
            [
                Str::singular($model->getTable()) => $model,
            ]
        );
    }
}

if (! function_exists('destroy_url')) {
    /**
     * @param  object  $model
     * @return string
     */
    function destroy_url(object $model): string
    {
        return route(
            'admin.'.snake_case_to_kebab($model->getTable()).'.destroy',
            [
                Str::singular($model->getTable()) => $model,
            ]
        );
    }
}

if (! function_exists('get_show_url')) {
    /**
     * @param  object  $model
     * @return string
     */
    function get_show_url(object $model): string
    {
        return route($model->getTable().'.show', [
            Str::singular($model->getTable()) => $model,
        ]);
    }
}

if (! function_exists('get_normal_text_validation_rule')) {
    /**
     * @return string[]
     */
    function get_normal_text_validation_rule(): array
    {
        return ['required', 'string', 'max:255'];
    }
}

if (! function_exists('get_contact_number_validation_rule_nullable')) {
    /**
     * @return string[]
     */
    function get_contact_number_validation_rule_nullable(): array
    {
        return ['nullable', 'digits_between:6,10'];
    }
}

if (! function_exists('limit_string')) {
    /**
     * @param $string
     * @param  int  $length
     * @return \Illuminate\Support\Stringable
     */
    function limit_string($string, int $length): Illuminate\Support\Stringable
    {
        return Str::of(strip_tags($string))->limit($length);
    }
}

if (! function_exists('strip_tags_tinymce')) {
    /**
     * @param  string  $string
     * @return string
     */
    function strip_tags_tinymce(string $string): string
    {
        return strip_tags($string, '<p><strong>');
    }
}

if (! function_exists('purify_string')) {
    /**
     * @param $string
     * @return string
     */
    function purify_string($string): string
    {
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

        return $purifier->purify($string);
    }
}

if (! function_exists('filter_string')) {
    /**
     * @param $string
     * @return string
     */
    function filter_string($string): string
    {
        return strip_tags_tinymce(purify_string($string));
    }
}

if (! function_exists('get_upload_folder_path')) {
    /**
     * @param  string  $mainFolderName
     * @return string
     */
    function get_upload_folder_path(string $mainFolderName): string
    {
        return $mainFolderName.'/'.now()->year.'/'.now()->month;
    }
}

if (! function_exists('resize_image')) {
    /**
     * @param  string  $imagePath
     * @param  int  $width
     */
    function resize_image(string $imagePath, int $width): void
    {
        Image::make($imagePath)
            ->widen($width)
            ->save();
    }
}

if (! function_exists('get_share_text')) {
    /**
     * @param  Movie  $movie
     * @return string
     */
    function get_share_text(Movie $movie): string
    {
        return "Watch Movie: $movie->name ";
    }
}

if (! function_exists('get_messenger_share_url')) {
    /**
     * @param  string  $url
     * @return string
     */
    function get_messenger_share_url(string $url): string
    {
        return 'fb-messenger://share/?link='.urlencode($url);
    }
}

if (! function_exists('get_viber_share_url')) {
    /**
     * @param  string  $url
     * @param  string  $text
     * @return string
     */
    function get_viber_share_url(string $url, string $text): string
    {
        return 'https://3p3x.adj.st/?adjust_t=u783g1_kw9yml&adjust_fallback=https%3A%2F%2Fwww.viber.com%2F%3Futm_source%3DPartner%26utm_medium%3DSharebutton%26utm_campaign%3DDefualt&adjust_campaign=Sharebutton&adjust_deeplink=viber://forward?text='.
            $text.
            urlencode($url);
    }
}

if (! function_exists('get_whatsapp_share_url')) {
    /**
     * @param  string  $url
     * @param  string  $text
     * @return string
     */
    function get_whatsapp_share_url(string $url, string $text): string
    {
        return 'whatsapp://send?text='.$text.urlencode($url);
    }
}

if (! function_exists('get_facebook_share_url')) {
    /**
     * @param  string  $url
     * @return string
     */
    function get_facebook_share_url(string $url): string
    {
        return 'https://www.facebook.com/sharer/sharer.php?u='.
            urlencode($url);
    }
}

if (! function_exists('get_twitter_share_url')) {
    /**
     * @param  string  $url
     * @return string
     */
    function get_twitter_share_url(string $url): string
    {
        return 'https://twitter.com/intent/tweet?url='.urlencode($url);
    }
}

if (! function_exists('get_linkedin_share_url')) {
    /**
     * @param  string  $url
     * @return string
     */
    function get_linkedin_share_url(string $url): string
    {
        return 'https://www.linkedin.com/shareArticle?mini=true&url='.
            urlencode($url);
    }
}

if (! function_exists('get_sms_share_url')) {
    /**
     * @param  string  $url
     * @param  string  $text
     * @return string
     */
    function get_sms_share_url(string $url, string $text): string
    {
        return 'sms:;?&body='.$text.urlencode($url);
    }
}

if (! function_exists('get_email_share_url')) {
    /**
     * @param  string  $url
     * @param  string  $text
     * @return string
     */
    function get_email_share_url(string $url, string $text): string
    {
        return 'mailto:?subject='.$text.'&body='.$text.urlencode($url);
    }
}

if (! function_exists('string_to_array')) {
    /**
     * @param  string|null  $string
     * @return array
     */
    function string_to_array(?string $string): array
    {
        return preg_split('/\s+/', $string);
    }
}

if (! function_exists('get_facebook_page_url')) {
    /**
     * @return string
     */
    function get_facebook_page_url(): string
    {
        return 'https://m.me/nepmoviesofficial';
    }
}

if (! function_exists('is_local_env')) {
    /**
     * @return bool
     */
    function is_local_env(): bool
    {
        return config('app.env') === config('constants.env.local');
    }
}

if (! function_exists('is_testing_env')) {
    /**
     * @return bool
     */
    function is_testing_env(): bool
    {
        return config('app.env') === config('constants.env.testing');
    }
}

if (! function_exists('get_protected_method')) {
    /**
     * @param  object  $object
     * @param  string  $methodName
     * @return ReflectionMethod
     *
     * @throws ReflectionException
     */
    function get_protected_method(
        object $object,
        string $methodName
    ): ReflectionMethod {
        return new ReflectionMethod($object, $methodName);
    }
}

if (! function_exists('sql_with_bindings')) {
    /**
     * @param  string  $sql
     * @param  array  $bindings
     * @return string
     */
    function sql_with_bindings(string $sql, array $bindings): string
    {
        $bindingsWithQuotes = Arr::map($bindings, function ($value) {
            return "'".$value."'";
        });

        return Str::replaceArray('?', $bindingsWithQuotes, $sql);
    }
}

if (! function_exists('get_sql')) {
    /**
     * @param  array  $queryLog
     * @return array
     */
    function get_sql(array $queryLog): array
    {
        $sqlArray = [];

        foreach ($queryLog as $key => $queryDetail) {
            $sqlArray[$key] = sql_with_bindings(
                $queryDetail['query'],
                $queryDetail['bindings']
            );
        }

        return $sqlArray;
    }
}

if (! function_exists('dump_sql')) {
    /**
     * @param  array  $sqlArray
     * @return void
     */
    function dump_sql(array $sqlArray): void
    {
        foreach ($sqlArray as $sql) {
            echo $sql.'<br/><br/>';
        }
        exit();
    }
}
