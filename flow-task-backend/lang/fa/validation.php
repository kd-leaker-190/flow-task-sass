<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'فیلد :attribute باید پذیرفته شود.',
    'accepted_if' => 'فیلد :attribute زمانی که :other برابر با :value است، باید پذیرفته شود.',
    'active_url' => 'فیلد :attribute باید یک آدرس URL معتبر باشد.',
    'after' => 'فیلد :attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => 'فیلد :attribute باید تاریخی بعد یا مساوی با :date باشد.',
    'alpha' => 'فیلد :attribute فقط باید شامل حروف باشد.',
    'alpha_dash' => 'فیلد :attribute فقط باید شامل حروف، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num' => 'فیلد :attribute فقط باید شامل حروف و اعداد باشد.',
    'any_of' => 'فیلد :attribute نامعتبر است.',
    'array' => 'فیلد :attribute باید آرایه باشد.',
    'array_keys' => 'فیلد :attribute فقط باید شامل کلیدهای زیر باشد: :values.',
    'ascii' => 'فیلد :attribute فقط باید شامل کاراکترها و نمادهای الفبایی تک‌بایتی باشد.',
    'base64' => 'فیلد :attribute باید یک رشته Base64 معتبر باشد.',
    'before' => 'فیلد :attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => 'فیلد :attribute باید تاریخی قبل یا مساوی با :date باشد.',
    'between' => [
        'array' => 'فیلد :attribute باید بین :min تا :max مورد داشته باشد.',
        'file' => 'فیلد :attribute باید بین :min تا :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بین :min تا :max باشد.',
        'string' => 'فیلد :attribute باید بین :min تا :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد :attribute باید درست یا نادرست باشد.',
    'can' => 'فیلد :attribute شامل یک مقدار غیرمجاز است.',
    'confirmed' => 'تأیید فیلد :attribute با مقدار آن مطابقت ندارد.',
    'contains' => 'فیلد :attribute فاقد مقدار مورد نیاز است.',
    'current_password' => 'رمز عبور صحیح نیست.',
    'date' => 'فیلد :attribute باید یک تاریخ معتبر باشد.',
    'date_equals' => 'فیلد :attribute باید تاریخی برابر با :date باشد.',
    'date_format' => 'فیلد :attribute باید با فرمت :format مطابقت داشته باشد.',
    'decimal' => 'فیلد :attribute باید دارای :decimal رقم اعشار باشد.',
    'declined' => 'فیلد :attribute باید رد شود.',
    'declined_if' => 'فیلد :attribute زمانی که :other برابر با :value است، باید رد شود.',
    'different' => 'فیلد :attribute و :other باید متفاوت باشند.',
    'digits' => 'فیلد :attribute باید :digits رقم باشد.',
    'digits_between' => 'فیلد :attribute باید بین :min تا :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر فیلد :attribute نامعتبر است.',
    'distinct' => 'فیلد :attribute دارای مقدار تکراری است.',
    'doesnt_contain' => 'فیلد :attribute نباید شامل هیچ‌یک از موارد زیر باشد: :values.',
    'doesnt_end_with' => 'فیلد :attribute نباید با یکی از موارد زیر پایان یابد: :values.',
    'doesnt_start_with' => 'فیلد :attribute نباید با یکی از موارد زیر شروع شود: :values.',
    'email' => 'فیلد :attribute باید یک آدرس ایمیل معتبر باشد.',
    'encoding' => 'فیلد :attribute باید با :encoding رمزگذاری شده باشد.',
    'ends_with' => 'فیلد :attribute باید با یکی از موارد زیر پایان یابد: :values.',
    'enum' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'exists' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'extensions' => 'فیلد :attribute باید یکی از پسوندهای زیر را داشته باشد: :values.',
    'file' => 'فیلد :attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید دارای مقدار باشد.',
    'gt' => [
        'array' => 'فیلد :attribute باید بیش از :value مورد داشته باشد.',
        'file' => 'فیلد :attribute باید بیشتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بیشتر از :value باشد.',
        'string' => 'فیلد :attribute باید بیشتر از :value کاراکتر داشته باشد.',
    ],
    'gte' => [
        'array' => 'فیلد :attribute باید حداقل :value مورد داشته باشد.',
        'file' => 'فیلد :attribute باید بیشتر یا مساوی با :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بزرگ‌تر یا مساوی با :value باشد.',
        'string' => 'فیلد :attribute باید حداقل :value کاراکتر داشته باشد.',
    ],
    'hex_color' => 'فیلد :attribute باید یک کد رنگ هگزادسیمال معتبر باشد.',
    'image' => 'فیلد :attribute باید یک تصویر باشد.',
    'in' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'in_array' => 'فیلد :attribute باید در :other وجود داشته باشد.',
    'in_array_keys' => 'فیلد :attribute باید حداقل یکی از کلیدهای زیر را داشته باشد: :values.',
    'integer' => 'فیلد :attribute باید یک عدد صحیح باشد.',
    'ip' => 'فیلد :attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => 'فیلد :attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد :attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد :attribute باید یک رشته JSON معتبر باشد.',
    'list' => 'فیلد :attribute باید یک لیست باشد.',
    'lowercase' => 'فیلد :attribute باید با حروف کوچک باشد.',
    'lt' => [
        'array' => 'فیلد :attribute باید کمتر از :value مورد داشته باشد.',
        'file' => 'فیلد :attribute باید کمتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کمتر از :value باشد.',
        'string' => 'فیلد :attribute باید کمتر از :value کاراکتر داشته باشد.',
    ],
    'lte' => [
        'array' => 'فیلد :attribute نباید بیشتر از :value مورد داشته باشد.',
        'file' => 'فیلد :attribute باید کمتر یا مساوی با :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کمتر یا مساوی با :value باشد.',
        'string' => 'فیلد :attribute باید کمتر یا مساوی با :value کاراکتر داشته باشد.',
    ],
    'mac_address' => 'فیلد :attribute باید یک آدرس MAC معتبر باشد.',
    'max' => [
        'array' => 'فیلد :attribute نباید بیشتر از :max مورد داشته باشد.',
        'file' => 'فیلد :attribute نباید بیشتر از :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute نباید بیشتر از :max باشد.',
        'string' => 'فیلد :attribute نباید بیشتر از :max کاراکتر داشته باشد.',
    ],
    'max_digits' => 'فیلد :attribute نباید بیشتر از :max رقم داشته باشد.',
    'mimes' => 'فیلد :attribute باید فایلی با یکی از انواع زیر باشد: :values.',
    'mimetypes' => 'فیلد :attribute باید فایلی با یکی از انواع زیر باشد: :values.',
    'min' => [
        'array' => 'فیلد :attribute باید حداقل :min مورد داشته باشد.',
        'file' => 'فیلد :attribute باید حداقل :min کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید حداقل :min باشد.',
        'string' => 'فیلد :attribute باید حداقل :min کاراکتر داشته باشد.',
    ],
    'min_digits' => 'فیلد :attribute باید حداقل :min رقم داشته باشد.',
    'missing' => 'فیلد :attribute نباید وجود داشته باشد.',
    'missing_if' => 'فیلد :attribute زمانی که :other برابر با :value است، نباید وجود داشته باشد.',
    'missing_unless' => 'فیلد :attribute نباید وجود داشته باشد، مگر اینکه :other برابر با :value باشد.',
    'missing_with' => 'فیلد :attribute زمانی که :values وجود دارد، نباید وجود داشته باشد.',
    'missing_with_all' => 'فیلد :attribute زمانی که :values وجود دارند، نباید وجود داشته باشد.',
    'multiple_of' => 'فیلد :attribute باید مضربی از :value باشد.',
    'not_in' => 'مقدار انتخاب‌شده برای :attribute نامعتبر است.',
    'not_regex' => 'فرمت فیلد :attribute نامعتبر است.',
    'numeric' => 'فیلد :attribute باید یک عدد باشد.',
    'password' => [
        'letters' => 'فیلد :attribute باید حداقل شامل یک حرف باشد.',
        'mixed' => 'فیلد :attribute باید حداقل شامل یک حرف بزرگ و یک حرف کوچک باشد.',
        'numbers' => 'فیلد :attribute باید حداقل شامل یک عدد باشد.',
        'symbols' => 'فیلد :attribute باید حداقل شامل یک نماد باشد.',
        'uncompromised' => ':attribute واردشده در یک نشت اطلاعاتی مشاهده شده است. لطفاً :attribute دیگری انتخاب کنید.',
    ],
    'present' => 'فیلد :attribute باید وجود داشته باشد.',
    'present_if' => 'فیلد :attribute زمانی که :other برابر با :value است، باید وجود داشته باشد.',
    'present_unless' => 'فیلد :attribute باید وجود داشته باشد، مگر اینکه :other برابر با :value باشد.',
    'present_with' => 'فیلد :attribute زمانی که :values وجود دارد، باید وجود داشته باشد.',
    'present_with_all' => 'فیلد :attribute زمانی که :values وجود دارند، باید وجود داشته باشد.',
    'prohibited' => 'فیلد :attribute مجاز نیست.',
    'prohibited_if' => 'فیلد :attribute زمانی که :other برابر با :value است، مجاز نیست.',
    'prohibited_if_accepted' => 'فیلد :attribute زمانی که :other پذیرفته شده است، مجاز نیست.',
    'prohibited_if_declined' => 'فیلد :attribute زمانی که :other رد شده است، مجاز نیست.',
    'prohibited_unless' => 'فیلد :attribute مجاز نیست، مگر اینکه :other در :values باشد.',
    'prohibits' => 'وجود فیلد :other توسط فیلد :attribute مجاز نیست.',
    'regex' => 'فرمت فیلد :attribute نامعتبر است.',
    'required' => 'وارد کردن فیلد :attribute الزامی است.',
    'required_array_keys' => 'فیلد :attribute باید شامل موارد مربوط به این کلیدها باشد: :values.',
    'required_if' => 'فیلد :attribute زمانی که :other برابر با :value است، الزامی است.',
    'required_if_accepted' => 'فیلد :attribute زمانی که :other پذیرفته شده است، الزامی است.',
    'required_if_declined' => 'فیلد :attribute زمانی که :other رد شده است، الزامی است.',
    'required_unless' => 'فیلد :attribute الزامی است، مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute زمانی که :values وجود دارد، الزامی است.',
    'required_with_all' => 'فیلد :attribute زمانی که :values وجود دارند، الزامی است.',
    'required_without' => 'فیلد :attribute زمانی که :values وجود ندارد، الزامی است.',
    'required_without_all' => 'فیلد :attribute زمانی که هیچ‌یک از :values وجود ندارند، الزامی است.',
    'same' => 'فیلد :attribute باید با :other مطابقت داشته باشد.',
    'size' => [
        'array' => 'فیلد :attribute باید شامل :size مورد باشد.',
        'file' => 'فیلد :attribute باید :size کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید برابر با :size باشد.',
        'string' => 'فیلد :attribute باید :size کاراکتر باشد.',
    ],
    'starts_with' => 'فیلد :attribute باید با یکی از موارد زیر شروع شود: :values.',
    'string' => 'فیلد :attribute باید یک رشته باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => ':attribute قبلاً انتخاب شده است.',
    'uploaded' => 'آپلود :attribute با خطا مواجه شد.',
    'uppercase' => 'فیلد :attribute باید با حروف بزرگ باشد.',
    'url' => 'فیلد :attribute باید یک آدرس URL معتبر باشد.',
    'ulid' => 'فیلد :attribute باید یک ULID معتبر باشد.',
    'uuid' => 'فیلد :attribute باید یک UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
